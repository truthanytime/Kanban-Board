<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUseCaseRequest;
use App\Http\Requests\StoreUseCaseRequest;
use App\Http\Requests\UpdateUseCaseRequest;
use App\Models\Actor;
use App\Models\Project;
use App\Models\UseCase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UseCaseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('use_case_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $useCases = UseCase::with(['as_a', 'project'])->get();

        return view('admin.useCases.index', compact('useCases'));
    }

    public function create()
    {
        abort_if(Gate::denies('use_case_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $as_as = Actor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.useCases.create', compact('as_as', 'projects'));
    }

    public function store(StoreUseCaseRequest $request)
    {
        $useCase = UseCase::create($request->all());

        return redirect()->route('admin.use-cases.index');
    }

    public function edit(UseCase $useCase)
    {
        abort_if(Gate::denies('use_case_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $as_as = Actor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $useCase->load('as_a', 'project');

        return view('admin.useCases.edit', compact('as_as', 'projects', 'useCase'));
    }

    public function update(UpdateUseCaseRequest $request, UseCase $useCase)
    {
        $useCase->update($request->all());

        return redirect()->route('admin.use-cases.index');
    }

    public function show(UseCase $useCase)
    {
        abort_if(Gate::denies('use_case_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $useCase->load('as_a', 'project', 'useCaseFeatures');

        return view('admin.useCases.show', compact('useCase'));
    }

    public function destroy(UseCase $useCase)
    {
        abort_if(Gate::denies('use_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $useCase->delete();

        return back();
    }

    public function massDestroy(MassDestroyUseCaseRequest $request)
    {
        UseCase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
