<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProjectAssignmentRequest;
use App\Http\Requests\UpdateProjectAssignmentRequest;
use App\Http\Resources\Admin\ProjectAssignmentResource;
use App\Models\ProjectAssignment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectAssignmentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_assignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectAssignmentResource(ProjectAssignment::with(['users'])->get());
    }

    public function store(StoreProjectAssignmentRequest $request)
    {
        $projectAssignment = ProjectAssignment::create($request->all());
        $projectAssignment->users()->sync($request->input('users', []));

        return (new ProjectAssignmentResource($projectAssignment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectAssignment $projectAssignment)
    {
        abort_if(Gate::denies('project_assignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectAssignmentResource($projectAssignment->load(['users']));
    }

    public function update(UpdateProjectAssignmentRequest $request, ProjectAssignment $projectAssignment)
    {
        $projectAssignment->update($request->all());
        $projectAssignment->users()->sync($request->input('users', []));

        return (new ProjectAssignmentResource($projectAssignment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectAssignment $projectAssignment)
    {
        abort_if(Gate::denies('project_assignment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectAssignment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
