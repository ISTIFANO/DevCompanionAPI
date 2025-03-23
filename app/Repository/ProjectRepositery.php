<?php

namespace App\Repository;

use App\Models\Project;
use App\Repository\interfaces\ProjectInterface;

class ProjectRepositery implements ProjectInterface
{
    protected Project $project;

    public function __construct()
    {
        $this->project = new Project();
    }

    public function register($data, $theme)
    {
        $project = new Project;    
        $project->name = $data['name'];
        $project->date = $data['date'];
        $project->description = $data['description'];
        
        $project->theme()->associate($theme);
            $project->save();
    
        return $project;
    }
    



    public function show()
    {
        $project = $this->project->all();

        return $project;
    }

    public function delete($id)
    {

        $this->project->where('id', '=', $id)->delete();

        return true;
    }
    public function update($data, $id)
    {
        $data =  $this->project->where('id', '=', $id)->update($data);

        return $data;
    }
}
