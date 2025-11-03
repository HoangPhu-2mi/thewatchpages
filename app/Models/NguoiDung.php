<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ⚠️ CHỈNH CHỖ NÀY
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NguoiDung extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'nguoidung';
    protected $primaryKey = 'ngid';
    public $timestamps = false;

    protected $fillable = [
        'TaiKhoan',
        'mail',
        'password',
        'diachi',
        'sdt',
        'vtid',
    ];

    protected $hidden = ['password'];

    
}
