<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    use HasFactory;

    protected $table = 'nhacungcap';
    protected $fillable = ['ten_ncc', 'diachi', 'sdt'];
    protected $primaryKey = 'ma_ncc';

    public function supplierProduct(){
        return $this->hasMany('App\Models\Sanpham');
    }
}
