<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'ChiTietDonHang';
    protected $primaryKey = 'ctdh_id';
    public $timestamps = false;

    protected $fillable = [
        'Don_gia', 'soluong', 'spid', 'dhid'
    ];

    public function donhang()
    {
        return $this->belongsTo(DonHang::class, 'dhid');
    }
}
