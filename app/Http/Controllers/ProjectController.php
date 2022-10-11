<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function addproject(Request $request){
        //print_r($request);exit;
        $project = new Project();
        $project->project_name = $request->input('project_name');
        $project->allocated_to = $request->input('allocated_to');
        $project->description = $request->input('description');
        $project->file_path = $request->file('file')->store('projects');
        $project->project_type = $request->input('project_type');
      //  $destinationPath = public_path().'/projects' ;
        //$file->move($destinationPath,$request->file('file'));
        $project->save();
        return $project;
    }
    public function projectlist(){
        return Project::all();
    }
    public function delete($id){
     $projectlist  = Project::where('id',$id)-> delete();
     if($projectlist){
        return["success"=>"Project has been deleted"];
     }  
     else{
        return["Error"=>"An unknown error has occured"];
     }
    }
    public function getsingleproject($id){
        return Project::find($id);
    }
    public function updateproject(Request $request,$id){
        $project = Project::find($id);
        $project->update($request->all());
    }
}
