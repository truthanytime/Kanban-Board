<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUseCaseRequest;
use App\Http\Requests\UpdateUseCaseRequest;
use App\Http\Resources\Admin\UseCaseResource;
use App\Models\UseCase;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UseCaseApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('use_case_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UseCaseResource(UseCase::with(['as_a', 'project'])->get());
    }

    public function store(StoreUseCaseRequest $request)
    {
        $useCase = UseCase::create($request->all());

        return (new UseCaseResource($useCase))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UseCase $useCase)
    {
        abort_if(Gate::denies('use_case_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UseCaseResource($useCase->load(['as_a', 'project']));
    }

    public function update(UpdateUseCaseRequest $request, UseCase $useCase)
    {
        $useCase->update($request->all());

        return (new UseCaseResource($useCase))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UseCase $useCase)
    {
        abort_if(Gate::denies('use_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $useCase->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
