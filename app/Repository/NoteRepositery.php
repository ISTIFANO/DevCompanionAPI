<?php

namespace App\Repository;

use App\Models\Note;
use App\Repository\interfaces\NoteInterface;

class NoteRepositery implements NoteInterface
{
    protected Note $note;
    public function __construct()
    {
        $this->note = new Note();

        
    }


    public function register($data)
    {
        $note = $this->note->create([
            'date' => $data['date'],
            'commentaire' => $data['commentaire'],
            'membre_id' => $data['membre_id'],
            'equipe_id' => $data['equipe_id']
        ]);

        return   $note;
    }

    public function show()
    {
        $Note = $this->note->all();

        return $Note;
    }

    public function delete($id)
    {

        $this->note->where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data =  $this->note->where('id', '=', $id)->update($data);

        return $data;
    }
}
