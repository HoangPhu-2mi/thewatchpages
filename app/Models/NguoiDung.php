<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'NguoiDung';       // tên bảng
    protected $primaryKey = 'ngid';       // khóa chính
    public $timestamps = false;           // nếu bảng không có created_at, updated_at

    protected $fillable = [
        'TaiKhoan',
        'mail',
        'password',
        'diachi',
        'sdt',
        'vtid',
    ];

    protected $hidden = [
        'password',
    ];

    public function gioHang()
    {
        return $this->hasMany(GioHang::class, 'ngid');
    }

    public function vaiTro()
    {
        return $this->belongsTo(VaiTro::class, 'vtid');
    }
}
