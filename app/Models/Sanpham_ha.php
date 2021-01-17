<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham_ha extends Model
{
    use HasFactory;

    protected $table = 'sanpham_hinhanh';
    protected $fillable = ['hinhanh', 'trangthai_hinhanh', 'ma_sp'];
    protected $primaryKey = 'ma_hinhanh';


}
