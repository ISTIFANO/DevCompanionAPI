<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'name','date','description'
     ];
     protected $table ="projects";



     public function theme(){

        return $this->belongsTo(Theme::class,'theme_id');
     }
}
