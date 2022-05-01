<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raporlar extends Model
{
    use HasFactory;
    protected $fillable = [
        'projerapor',
        'ogretmenid',
        'ogrno',
        'onerino',
        
       
    ];
}
