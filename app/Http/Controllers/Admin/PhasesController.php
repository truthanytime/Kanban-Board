<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPhaseRequest;
use App\Http\Requests\StorePhaseRequest;
use App\Http\Requests\UpdatePhaseRequest;
use App\Models\Phase;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PhasesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('phase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phases = Phase::with(['project'])->get();

        return view('admin.phases.index', compact('phases'));
    }

    public function create()
    {
        abort_if(Gate::denies('phase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.phases.create', compact('projects'));
    }

    public function store(StorePhaseRequest $request)
    {
        $phase = Phase::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $phase->id]);
        }

        return redirect()->route('admin.phases.index');
    }

    public function edit(Phase $phase)
    {
        abort_if(Gate::denies('phase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $phase->load('project');

        return view('admin.phases.edit', compact('projects', 'phase'));
    }

    public function update(UpdatePhaseRequest $request, Phase $phase)
    {
        $phase->update($request->all());

        return redirect()->route('admin.phases.index');
    }

    public function show(Phase $phase)
    {
        abort_if(Gate::denies('phase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phase->load('project', 'phaseFeatures');

        return view('admin.phases.show', compact('phase'));
    }

    public function destroy(Phase $phase)
    {
        abort_if(Gate::denies('phase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phase->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhaseRequest $request)
    {
        Phase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('phase_create') && Gate::denies('phase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Phase();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
