<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projekonuları extends Model
{
    use HasFactory;
    protected $fillable = [
        'projename',
        'ogretmenid',
        'status',
        'ogrno',
        
       
    ];
}
