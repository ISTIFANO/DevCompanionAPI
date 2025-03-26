<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurie extends Model
{
    /** @use HasFactory<\Database\Factories\JurieFactory> */
    use HasFactory;

    protected $fillable = ['name'];
     protected $table ="juries";



     public function memberjuries()
     {
         return $this->hasMany(Jurie::class);
     }

     public function equipe()
     {
         return $this->belongsTo(Equipe::class, 'team_id');
     }

}
