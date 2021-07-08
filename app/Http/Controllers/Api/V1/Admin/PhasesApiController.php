<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePhaseRequest;
use App\Http\Requests\UpdatePhaseRequest;
use App\Http\Resources\Admin\PhaseResource;
use App\Models\Phase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhasesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('phase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PhaseResource(Phase::with(['project'])->get());
    }

    public function store(StorePhaseRequest $request)
    {
        $phase = Phase::create($request->all());

        return (new PhaseResource($phase))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Phase $phase)
    {
        abort_if(Gate::denies('phase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PhaseResource($phase->load(['project']));
    }

    public function update(UpdatePhaseRequest $request, Phase $phase)
    {
        $phase->update($request->all());

        return (new PhaseResource($phase))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Phase $phase)
    {
        abort_if(Gate::denies('phase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $phase->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
