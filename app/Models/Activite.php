<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    /** @use HasFactory<\Database\Factories\ActiviteFactory> */
    use HasFactory;

    protected $fillable = [
        'name','description','date'
     ];
     protected $table ="activites";


}
