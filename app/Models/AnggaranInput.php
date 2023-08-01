<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggaranInput extends Model
{
    use HasFactory;
    public function variabel()
    {
        return $this->belongsTo(Variabel::class, 'variabel_id');
    }
}
