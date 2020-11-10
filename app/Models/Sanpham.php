<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    protected $fillable = ['checkcode', 'ten_sp', 'gia', 'sale', 'hinhanh', 'mota' ,'trangthai_sp' ,'ma_danhmuc', 'ma_dongsp', 'ma_ncc'];
    protected $primaryKey = 'ma_sp';
}
