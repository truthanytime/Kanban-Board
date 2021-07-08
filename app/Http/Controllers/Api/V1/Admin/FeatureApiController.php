<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Http\Resources\Admin\FeatureResource;
use App\Models\Feature;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeatureApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeatureResource(Feature::with(['project', 'use_cases', 'phases'])->get());
    }

    public function store(StoreFeatureRequest $request)
    {
        $feature = Feature::create($request->all());
        $feature->use_cases()->sync($request->input('use_cases', []));
        $feature->phases()->sync($request->input('phases', []));

        return (new FeatureResource($feature))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Feature $feature)
    {
        abort_if(Gate::denies('feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FeatureResource($feature->load(['project', 'use_cases', 'phases']));
    }

    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $feature->update($request->all());
        $feature->use_cases()->sync($request->input('use_cases', []));
        $feature->phases()->sync($request->input('phases', []));

        return (new FeatureResource($feature))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Feature $feature)
    {
        abort_if(Gate::denies('feature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feature->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
