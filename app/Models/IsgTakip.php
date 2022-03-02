<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsgTakip extends Model
{
    use HasFactory;

    protected $table = "isg_takip";
    protected $primaryKey = 'id';

    protected $fillable = [
        'tc',
        'ad_soyad',
        'gorev_turu',
        'personel_kategori',
        'aylik_calisma_suresi',
    ];
}
