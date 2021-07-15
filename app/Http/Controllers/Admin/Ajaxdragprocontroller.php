<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\ProjectStatus;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class Ajaxdragprocontroller extends Controller
{
    //
    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //$clients = Client::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $statuses = ProjectStatus::all()->pluck('name', 'id'); //->prepend(trans('global.pleaseSelect'), '');
        $data = $request->toArray();
        var_dump($data);
        exit;
        foreach ($data as $key => $value) {
            if ($key != "_token") {
                $project["name"] = $key;
                $project = Project::create($project);
            }
        }
        return response()->json('ajax-request');
    }

    public function store(Request $request, Feature $feature)
    {
        $data = $request->toArray();
        foreach ($data as $key => $value) {
            if ($key != "_token") {
                foreach ($value as $key2 => $value2) {
                    $status["status"] = $key;
                    //var_dump($key, $value2);

                    $feature::where('id', $value2)->update($status);
                }
            }
        }

        return response()->json($data);
    }
}
