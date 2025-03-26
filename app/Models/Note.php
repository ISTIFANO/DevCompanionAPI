<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    /** @use HasFactory<\Database\Factories\NoteFactory> */
    use HasFactory;


    protected $fillable = [
        'date',
        'commentaire'
    ];
    protected $table = "notes";



    public function membre()
    {
        return $this->belongsTo(Memberjurie::class, 'membre_id');
    }
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_id');
    }
}
