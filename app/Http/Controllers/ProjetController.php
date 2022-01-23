<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Projet;
use App\Bugs;

class ProjetController extends Controller
{

    //GET ALL PROJECTS INFORMATIONS FROM DATABASE
    public function getAll(){

        $projects = Projet::all();

        return view(
            'index',
            [
                'projects' => $projects
            ]      
        );

    }

}
