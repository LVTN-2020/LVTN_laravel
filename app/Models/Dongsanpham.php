<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dongsanpham extends Model
{
    use HasFactory;

    protected $table = 'dongsanpham';
    protected $fillable = ['ten_dongsp', 'trangthai_danhmuc'];
    protected $primaryKey = 'ma_dongsp';
}
