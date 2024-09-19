<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Storage::json('project.json');
        
        return view('projects.index', compact('projects'));
    }
    public function show($project){
        $projects = Storage::json('project.json');
        
        return view('projects.show', compact('projects'));
    }
}
