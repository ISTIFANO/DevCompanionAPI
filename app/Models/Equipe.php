<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    /** @use HasFactory<\Database\Factories\EquipeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'logo'
 
     ];
     protected $table ="equipes";

     public function jurie()
     {
         return $this->hasMany(Jurie::class);
     }
     public function hackathon()
     {
         return $this->belongsTo(Hackathon::class, 'hackathon_id');
     }
}
