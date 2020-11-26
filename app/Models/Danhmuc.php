<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;

    protected $table = 'danhmuc';
    protected $fillable = ['ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc'];
    protected $primaryKey = 'ma_danhmuc';

}
