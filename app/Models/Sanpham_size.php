<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham_size extends Model
{
    use HasFactory;

    protected $table = 'sanpham_size';
    protected $fillable = ['size', 'trangthai_size', 'ma_sp'];
    protected $primaryKey = 'ma_size';
}
