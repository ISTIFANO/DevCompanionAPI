<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hackathon extends Model
{
    /** @use HasFactory<\Database\Factories\HackathonFactory> */
    use HasFactory;

    protected $fillable = [
        'theme_id','organisateur_id','name','description','start_date','end_date'
     ];
     protected $table ="hackathons";
}
