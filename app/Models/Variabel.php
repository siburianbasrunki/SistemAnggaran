<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;

class Variabel extends Model
{
    use HasFactory;

    protected $table = 'variabels';

    protected $fillable = [
        'no',
        'nama_ruas',
        'panjang_ruas',
        'pr_tidak_mantap',
        'variabel1',
        'variabel2',
        'variabel3',
        'variabel4',
        'variabel5',
        'total',
        'dana_anggaran', // Tambahkan kolom 'dana_anggaran' di sini
    ];
}
