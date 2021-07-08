<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKnowledgebaseCategoryRequest;
use App\Http\Requests\UpdateKnowledgebaseCategoryRequest;
use App\Http\Resources\Admin\KnowledgebaseCategoryResource;
use App\Models\KnowledgebaseCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KnowledgebaseCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('knowledgebase_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KnowledgebaseCategoryResource(KnowledgebaseCategory::all());
    }

    public function store(StoreKnowledgebaseCategoryRequest $request)
    {
        $knowledgebaseCategory = KnowledgebaseCategory::create($request->all());

        return (new KnowledgebaseCategoryResource($knowledgebaseCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(KnowledgebaseCategory $knowledgebaseCategory)
    {
        abort_if(Gate::denies('knowledgebase_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KnowledgebaseCategoryResource($knowledgebaseCategory);
    }

    public function update(UpdateKnowledgebaseCategoryRequest $request, KnowledgebaseCategory $knowledgebaseCategory)
    {
        $knowledgebaseCategory->update($request->all());

        return (new KnowledgebaseCategoryResource($knowledgebaseCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(KnowledgebaseCategory $knowledgebaseCategory)
    {
        abort_if(Gate::denies('knowledgebase_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
