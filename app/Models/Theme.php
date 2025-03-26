<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    /** @use HasFactory<\Database\Factories\ThemeFactory> */
    use HasFactory;

    protected $fillable = [
        'name','cover'
     ];
     protected $table ="themes";
    public function projects(){

        return $this->hasMany(Project::class);
     }
     public function hackathon()
     {
         return $this->belongsTo(Hackathon::class,'hackathon_id');
     }
}
