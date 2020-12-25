<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    protected $table = 'donhang';
    protected $fillable = ['ma_dh', 'ngaydathang', 'ten_nguoinhan',
                            'ma_tt', 'ma_vanchuyen', 'phivanchuyen',
                            'tongtien', 'sdt', 'diachi','trangthai_dh','user_id'];
    protected $primaryKey = 'donhang_id';
}
