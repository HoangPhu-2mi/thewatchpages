<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
     protected $table = 'vaitro'; // đúng tên bảng trong DB
    protected $primaryKey = 'vtid';
    public $timestamps = false;
}
