<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hackathon extends Model
{
    /** @use HasFactory<\Database\Factories\HackathonFactory> */
    use HasFactory;

    protected $fillable = [
     'name','description','start_date','end_date'
     ];
     protected $table ="hackathons";

     public function theme()
     {
         return $this->belongsTo(Theme::class,'theme_id');
     }
     public function user()
     {
         return $this->belongsTo(User::class,'organisateur_id');
     }
     public function rules()
     {
         return $this->belongsToMany(Rule::class);
     }
}
