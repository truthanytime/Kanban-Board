<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests\MassDestroyFeatureRequest;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Client;
use App\Models\Feature;
use App\Models\ProjectStatus;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SystemKanbanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Feature::with(['project'])->get();
        //$dadiff=Feature::with('datediff'())
        //print_r($projects->toArray());
        //exit;
        return view('admin.kanban.kanban', compact('projects'));
    }
    public function create()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Feature::with(['project'])->get();
        return view('admin.kanban.kanbancreate', compact('projects'));
    }

    public function savedraft(Request $request)
    {
        print_r("Save success");
        exit;
    }
}
