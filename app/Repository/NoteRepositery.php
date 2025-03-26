<?php

namespace App\Repository;

use App\Models\Note;
use App\Repository\interfaces\NoteInterface;
use Exception;

class NoteRepositery implements NoteInterface
{
    protected Note $note;
    public function __construct()
    {
        $this->note = new Note();
    }


    public function register($data, $team, $memberjurie)
    {
        try {
            
            $note = new Note();
            $note->commentaire = $data["commentaire"];
            $note->date = $data["date"];
            $note->equipe()->associate($team);
            $note->membre()->associate($memberjurie);
            $note->save();
        } catch (Exception $e) {
            return ["message" => $e->getMessage()];
        }
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
