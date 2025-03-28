<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    /** @use HasFactory<\Database\Factories\RuleFactory> */
    use HasFactory;

    protected $fillable =["name", "descrition"];

    protected $table ="rules";


    public function hackathons(){
        $this->belongsToMany(Hackathon::class);
    }


}
