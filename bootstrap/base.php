<?php

use Illuminate\Support\Facades\DB;
use App\Bugs;

//get total number of anomalies
function getAnomalies($id){

    $anomalies = Bugs::select(DB::raw('count(*) as anomalies')) //count all raws
                        ->where('project_id',$id)
                        ->groupBy('project_id')
                        ->get();

    return $anomalies;

}

//get total number of bugs in progress
function getInProgressBugs($id, $cat_id = 2){

    $inProgress = Bugs::select(DB::raw('count(*) as in_progress'))
                    ->whereNotIn('status', [80, 90]) //in progress
                    ->where('project_id',$id)
                    ->where('category_id',$cat_id) //bugs
                    ->groupBy('category_id')
                    ->get();

    return $inProgress;

}


//get total number of bugs resolved
function getResolvedBugs($id, $cat_id = 2){

    $resolved = Bugs::select(DB::raw('count(*) as resolved'))
                        ->whereIn('status', [80, 90]) //resolved
                        ->where('project_id',$id)
                        ->where('category_id',$cat_id) //bugs
                        ->groupBy('project_id')
                        ->get();

    return $resolved;

}


//get total number of ameliorations in progress
function getInProgressAmeliorations($id, $cat_id = 3){

    $inProgress = Bugs::select(DB::raw('count(*) as in_progress'))
                    ->whereNotIn('status', [80, 90]) // in progress
                    ->where('project_id',$id)
                    ->where('category_id',$cat_id) //ameliorations
                    ->groupBy('category_id')
                    ->get();

    return $inProgress;

}



//get total number of ameliorations resolved
function getResolvedAmeliorations($id, $cat_id = 3){

    $resolved = Bugs::select(DB::raw('count(*) as resolved'))
                        ->whereIn('status', [80, 90]) //resolved
                        ->where('project_id',$id)
                        ->where('category_id',$cat_id) //ameliorations
                        ->groupBy('project_id')
                        ->get();

    return $resolved;

}


