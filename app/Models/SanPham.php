<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'SanPham';
    protected $primaryKey = 'spid';
    public $timestamps = false;

    protected $fillable = [
        'Ten_SP', 'mota', 'gia', 'kho', 'mid', 'clid', 'dspid'
    ];

    public function gioHang()
    {
        return $this->hasMany(GioHang::class, 'spid');
    }

    public function hinhAnh()
    {
        return $this->belongsToMany(HinhAnh::class, 'HinhAnh_SanPham', 'spid', 'hinhid');
    }

    public function dongSanPham()
    {
        return $this->belongsTo(DongSanPham::class, 'dspid');
    }
}
