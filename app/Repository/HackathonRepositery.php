<?php

namespace App\Repository;

use App\Models\Hackathon;
use App\Models\Note;
use App\Repository\interfaces\HackathonInterface;

class HackathonRepositery implements HackathonInterface
{


    public function register($data)
    {
        // return['message'=>$note];

        $note = Hackathon::create([
            'theme_id' => $data['theme_id'],
            'organisateur_id' => $data['organisateur_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date']
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
