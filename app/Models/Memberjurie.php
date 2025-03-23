<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memberjurie extends Model
{
    /** @use HasFactory<\Database\Factories\MemberjurieFactory> */
    use HasFactory;
    protected $fillable = [
        'name','code'
     ];
     protected $table ="memberjuries";
}
