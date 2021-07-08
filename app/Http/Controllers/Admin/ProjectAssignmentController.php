<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectAssignmentRequest;
use App\Http\Requests\StoreProjectAssignmentRequest;
use App\Http\Requests\UpdateProjectAssignmentRequest;
use App\Models\ProjectAssignment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProjectAssignmentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_assignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectAssignments = ProjectAssignment::with(['users'])->get();

        return view('admin.projectAssignments.index', compact('projectAssignments'));
    }

    public function create()
    {
        abort_if(Gate::denies('project_assignment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        return view('admin.projectAssignments.create', compact('users'));
    }

    public function store(StoreProjectAssignmentRequest $request)
    {
        $projectAssignment = ProjectAssignment::create($request->all());
        $projectAssignment->users()->sync($request->input('users', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $projectAssignment->id]);
        }

        return redirect()->route('admin.project-assignments.index');
    }

    public function edit(ProjectAssignment $projectAssignment)
    {
        abort_if(Gate::denies('project_assignment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $projectAssignment->load('users');

        return view('admin.projectAssignments.edit', compact('users', 'projectAssignment'));
    }

    public function update(UpdateProjectAssignmentRequest $request, ProjectAssignment $projectAssignment)
    {
        $projectAssignment->update($request->all());
        $projectAssignment->users()->sync($request->input('users', []));

        return redirect()->route('admin.project-assignments.index');
    }

    public function show(ProjectAssignment $projectAssignment)
    {
        abort_if(Gate::denies('project_assignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectAssignment->load('users');

        return view('admin.projectAssignments.show', compact('projectAssignment'));
    }

    public function destroy(ProjectAssignment $projectAssignment)
    {
        abort_if(Gate::denies('project_assignment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectAssignment->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectAssignmentRequest $request)
    {
        ProjectAssignment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_assignment_create') && Gate::denies('project_assignment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProjectAssignment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
