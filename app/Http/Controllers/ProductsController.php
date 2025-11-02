<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    // Hiển thị danh sách dòng sản phẩm với bộ lọc và phân trang
    public function index(Request $request)
    {
        $query = $this->baseQuery();

        // Bộ lọc
        $query = $this->filterByBrand($query, $request);
        $query = $this->filterByDong($query, $request);
        $query = $this->filterByChatLieu($query, $request);
        $query = $this->filterByMau($query, $request);

        //search
        $query = $this->search($query, $request);

        $products = $query->paginate(8);

        $filters = $this->getAvailableFilters();

        return view('products.index', [
            'products' => $products,
            'brands' => $filters['brands'],
            'dongs' => $filters['dongs'],
            'chatlieus' => $filters['chatlieus'],
            'maus' => $filters['maus'],
            'search' => $request->search,
        ]);
    }

    /**
     * Câu truy vấn cơ bản — hiển thị mỗi dòng sản phẩm 1 sản phẩm đại diện
     */
    private function baseQuery()
    {
        return DB::table('SanPham as sp')
            ->join('DongSanPham as dsp', 'sp.dspid', '=', 'dsp.dspid')
            ->join('Hang as h', 'dsp.hid', '=', 'h.hid')
            ->leftJoin(DB::raw('(
                SELECT spid, MIN(vitri) AS image
                FROM HinhAnh_SanPham
                JOIN HinhAnh USING(hinhid)
                GROUP BY spid
            ) AS ha'), 'sp.spid', '=', 'ha.spid')
            // chỉ lấy 1 sản phẩm đại diện cho mỗi dòng
            ->whereRaw('sp.spid = (SELECT MIN(sp2.spid) FROM SanPham sp2 WHERE sp2.dspid = sp.dspid)')
            ->select('sp.spid', 'sp.Ten_SP', 'sp.gia', 'dsp.dspid', 'dsp.dspname', 'h.hname as brand',  'ha.image', DB::raw('(SELECT MIN(sp2.spid) FROM SanPham sp2 WHERE sp2.dspid = sp.dspid) AS first_spid')
            );
    }

    /**
     * Bộ lọc theo Hãng
     */
    private function filterByBrand($query, Request $request)
    {
        if ($request->filled('brand')) {
            $query->where('h.hname', $request->brand);
        }
        return $query;
    }

    /**
     * Bộ lọc theo Dòng sản phẩm
     */
    private function filterByDong($query, Request $request)
    {
        if ($request->filled('dong')) {
            $query->where('dsp.dspname', $request->dong);
        }
        return $query;
    }

    /**
     * Bộ lọc theo Chất liệu (lọc đúng theo toàn bộ sản phẩm)
     */
    private function filterByChatLieu($query, Request $request)
    {
        if ($request->filled('chatlieu')) {
            $query->whereIn('dsp.dspid', function ($sub) use ($request) {
                $sub->select('dspid')
                    ->from('SanPham')
                    ->where('clid', $request->chatlieu);
            });
        }
        return $query;
    }

    /**
     * Bộ lọc theo Màu (lọc đúng theo toàn bộ sản phẩm)
     */
    private function filterByMau($query, Request $request)
    {
        if ($request->filled('mau')) {
            $query->whereIn('dsp.dspid', function ($sub) use ($request) {
                $sub->select('dspid')
                    ->from('SanPham')
                    ->where('mid', $request->mau);
            });
        }
        return $query;
    }

    /**
     * Lấy danh sách filter có sẵn để render vào form
     */
    private function getAvailableFilters()
    {
        return [
            'brands' => DB::table('Hang')->pluck('hname', 'hid'),
            'dongs' => DB::table('DongSanPham')->pluck('dspname', 'dspid'),
            'chatlieus' => DB::table('ChatLieu')->pluck('clname', 'clid'),
            'maus' => DB::table('Mau')->pluck('mname', 'mid'),
        ];
    }

    private function search($query, Request $request)
    {
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('sp.Ten_SP', 'like', "%{$keyword}%")
                ->orWhere('dsp.dspname', 'like', "%{$keyword}%")
                ->orWhere('h.hname', 'like', "%{$keyword}%");
            });
            Log::info('🔎 [ProductsController@search] Searching for:', ['keyword' => $keyword]);
        }else
            Log::info('ℹ️ [ProductsController@search] No search keyword provided.');
        return $query;
    }

    public function searchSuggest(Request $request)
    {
        $keyword = $request->input('q'); // dùng "q" cho gọn

        if (!$keyword) {
            return response()->json([]);
        }

        $products = DB::table('SanPham as sp')
            ->join('DongSanPham as dsp', 'sp.dspid', '=', 'dsp.dspid')
            ->join('Hang as h', 'dsp.hid', '=', 'h.hid')
            ->join('HinhAnh_SanPham as hasp', 'sp.spid', '=', 'hasp.spid')
            ->join('HinhAnh as ha', 'hasp.hinhid', '=', 'ha.hinhid')
            ->select(
                'sp.spid',
                'sp.Ten_SP',
                'sp.gia',
                'h.hname as brand',
                'dsp.dspname as dsp',
                'sp.dspid',
                'ha.vitri as image'
            )
            ->where(function ($q) use ($keyword) {
                $q->where('sp.Ten_SP', 'like', "%{$keyword}%")
                ->orWhere('dsp.dspname', 'like', "%{$keyword}%");
            })
            ->orderBy('hasp.hinhid', 'asc') // lấy hình đầu tiên
            ->limit(3)
            ->get();
            
        $products->transform(function ($p) {
            $p->image_url = $this->makeImageUrls($p->image)[0] ?? null;
            return $p;
        });

        return response()->json($products);
    }


    //  public function favorite($id)
    // {
    //     $userId = auth()->id(); // Nếu có đăng nhập
    //     DB::table('YeuThich')->updateOrInsert(
    //         ['user_id' => $userId, 'spid' => $id],
    //         ['created_at' => now()]
    //     );
    //     return response()->json(['success' => true]);
    // }

    // Hiển thị trang chi tiết sản phẩm
    public function show($dspid, $spid)
    {
        // Lấy danh sách sản phẩm cùng dòng
        $products = DB::table('SanPham as sp')
            ->join('DongSanPham as dsp', 'sp.dspid', '=', 'dsp.dspid')
            ->join('Hang as h', 'dsp.hid', '=', 'h.hid')
            ->leftJoin(DB::raw('(
                SELECT spid, GROUP_CONCAT(vitri ORDER BY hinhid) AS images
                FROM HinhAnh_SanPham
                JOIN HinhAnh USING(hinhid)
                GROUP BY spid
            ) AS ha'), 'sp.spid', '=', 'ha.spid')
            ->where('sp.dspid', $dspid)
            ->select(
                'sp.spid', 'sp.Ten_SP', 'sp.gia', 'sp.mota',
                'dsp.dspid', 'dsp.dspname', 'h.hname as brand',
                'ha.images'
            )
            ->get();

        // dd($products);
        if ($products->isEmpty()) {
            abort(404, 'Dòng sản phẩm không tồn tại');
        }

        // Sản phẩm chính đang được chọn
        $mainProduct = $products->firstWhere('spid', $spid) ?? $products->first();

        // dd($mainProduct);
        // Chuyển ảnh thành mảng URL hợp lệ
        $mainImages = $this->makeImageUrls($mainProduct->images);

        // Thêm dữ liệu images_json cho từng sản phẩm (hiển thị thumbnail phải)
        foreach ($products as $product) {
            $product->images_json = json_encode($this->makeImageUrls($product->images));
        }

        // Chuẩn bị dữ liệu cho 3 khu vực hiển thị
        return view('products.show', [
            'products' => $products,
            'mainProduct' => $mainProduct,
            'mainImages' => $mainImages,
        ]);
    }


    private function makeImageUrls($imagesStr)
    {
        return collect(explode(',', $imagesStr ?? ''))
            ->map(function ($path) {
                $path = trim($path);
                if ($path === '') return null;

                $segments = array_filter(explode('/', $path), fn($s) => $s !== '');
                $encodedSegments = array_map('rawurlencode', $segments);
                $encodedPath = implode('/', $encodedSegments);
                $encodedPath = preg_replace('/^images[\/\\\\]/', '', $encodedPath);

                return asset("images/{$encodedPath}");
            })
            ->filter()
            ->values()
            ->toArray();
    }


   
}
