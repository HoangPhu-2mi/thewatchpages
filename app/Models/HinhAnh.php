<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;

    protected $table = 'HinhAnh';
    protected $primaryKey = 'hinhid';
    public $timestamps = false;

    protected $fillable = ['vitri'];

    public function sanPham()
    {
        return $this->belongsToMany(SanPham::class, 'HinhAnh_SanPham', 'hinhid', 'spid');
    }
}
