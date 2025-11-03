<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $primaryKey = 'dhid';
    public $timestamps = false;

    protected $fillable = [
        'trangthai',
        'tongtien',
        'ngaydat',
        'ngaygiao',
        'Phuong_thuc_TT',
        'Phi_van_chuyen',
        'note',
        'ngid'
    ];

    public function chitiet()
    {
        return $this->hasMany(ChiTietDonHang::class, 'dhid');
    }
}
