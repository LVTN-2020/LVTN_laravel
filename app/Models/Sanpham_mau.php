<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham_mau extends Model
{
    use HasFactory;

    protected $table = 'sanpham_mau';
    protected $fillable = ['mau', 'trangthai_mau', 'ma_sp'];
    protected $primaryKey = 'ma_mau';
}
