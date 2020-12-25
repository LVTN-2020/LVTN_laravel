<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChitietDH extends Model
{
    use HasFactory;

    protected $table = 'chitiet_dh';
    protected $fillable = ['ten_sp', 'so_tien', 'soluong',
                            'size', 'mau', 'tongtien',
                            'donhang_id', 'ma_sp'];
    protected $primaryKey = 'ma_chitiet';
}
