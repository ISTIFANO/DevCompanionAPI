<?php

namespace App\Repository;

use App\Models\Note;
use App\Repository\interfaces\NoteInterface;
use Illuminate\Support\Facades\Hash;

class NoteRepositery implements NoteInterface
{


    public function register($data)
    {
        $note = Note::create([
            'date' => $data['date'],
            'commentaire' => $data['commentaire'],
            'membre_id' => $data['membre_id'],
            'equipe_id' => $data['equipe_id']
        ]);

        return   $note;
    }

    public function show()
    {
        $Note = Note::all();

        return $Note;
    }

    public function delete($id)
    {

        Note::where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data =  Note::where('id', '=', $id)->update($data);

        return $data;
    }
}
