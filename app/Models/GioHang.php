<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'GioHang';
    protected $primaryKey = 'ghid';
    public $timestamps = false;

    protected $fillable = ['soluong', 'ngid', 'spid'];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'spid');
    }

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'ngid');
    }
}
