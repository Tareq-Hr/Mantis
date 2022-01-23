<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
           
        </style>
    </head>

    <body>
        <p></p>
        <table class="table table-striped"  style="text-align:center">
            <thead>
                <tr>
                    <th scope="col">Projets</th>
                    <th scope="col">Total Anomalies</th>
                    <th scope="col" colspan="2">Bugs</th>
                    <th scope="col" colspan="2">Améliorations</th>
                </tr>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">En cours</th>
                    <th scope="col">Résolu</th>
                    <th scope="col">En cours</th>
                    <th scope="col">Résolu</th>
                </tr>
            </thead>
            <tbody>

            <!-- LOOP RESULTS COMING FROM PROJET CONTROLLER -->
                @foreach($projects as $index => $project)
                    <tr>
                        
                    <!-- GET PROJECT NAMES -->
                        @if($project)
                            <td>{{$project->name}}</td>
                        @else
                            <td>--</td>
                        @endif

                        <!-- GET TOTAL ANOMALIES -->
                        @if(!empty(getAnomalies($project->id)[0]))
                            <td>{{getAnomalies($project->id)[0]->anomalies}}</td>
                        @else
                            <td>0</td>
                        @endif

                        <!-- GET TOTAL IN PROGRESS BUGS -->
                        @if(!empty(getInProgressBugs($project->id)[0]))
                            <td>{{getInProgressBugs($project->id)[0]->in_progress}}</td>
                        @else
                            <td>0</td>
                        @endif

                        <!-- GET TOTAL RESOLVED BUGS -->
                        @if(!empty(getResolvedBugs($project->id)[0]))
                            <td>{{getResolvedBugs($project->id)[0]->resolved}}</td>
                        @else
                            <td>0</td>
                        @endif

                        <!-- GET TOTAL IN PROGRESS AMELIORATIONS -->
                        @if(!empty(getInProgressAmeliorations($project->id)[0]))
                            <td>{{getInProgressAmeliorations($project->id)[0]->in_progress}}</td>
                        @else
                            <td>0</td>
                        @endif

                        <!-- GET TOTAL RESOLVED AMELIORATIONS -->
                        @if(!empty(getResolvedAmeliorations($project->id)[0]))
                            <td>{{getResolvedAmeliorations($project->id)[0]->resolved}}</td>
                        @else
                            <td>0</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>

        </table>
    </body>

</html>
