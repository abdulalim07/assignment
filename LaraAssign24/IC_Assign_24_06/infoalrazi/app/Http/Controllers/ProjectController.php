<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(){
        $projects = Storage::json('project.json');
        
        return view('projects.index', compact('projects'));
    }
}
