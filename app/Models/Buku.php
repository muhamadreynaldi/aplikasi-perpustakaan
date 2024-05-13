<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $primaryKey = 'no_buku';
    protected $table = 'buku';

    protected $fillable = [
        'id_penulis',
        'id_rak',
        'no_buku',
        'judul',
        'edisi',
        'tahun',
        'penerbit',
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak');
    }
}
