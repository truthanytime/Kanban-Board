<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreKnowledgebaseArticleRequest;
use App\Http\Requests\UpdateKnowledgebaseArticleRequest;
use App\Http\Resources\Admin\KnowledgebaseArticleResource;
use App\Models\KnowledgebaseArticle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KnowledgebaseArticleApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('knowledgebase_article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KnowledgebaseArticleResource(KnowledgebaseArticle::with(['categories'])->get());
    }

    public function store(StoreKnowledgebaseArticleRequest $request)
    {
        $knowledgebaseArticle = KnowledgebaseArticle::create($request->all());
        $knowledgebaseArticle->categories()->sync($request->input('categories', []));

        return (new KnowledgebaseArticleResource($knowledgebaseArticle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(KnowledgebaseArticle $knowledgebaseArticle)
    {
        abort_if(Gate::denies('knowledgebase_article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KnowledgebaseArticleResource($knowledgebaseArticle->load(['categories']));
    }

    public function update(UpdateKnowledgebaseArticleRequest $request, KnowledgebaseArticle $knowledgebaseArticle)
    {
        $knowledgebaseArticle->update($request->all());
        $knowledgebaseArticle->categories()->sync($request->input('categories', []));

        return (new KnowledgebaseArticleResource($knowledgebaseArticle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(KnowledgebaseArticle $knowledgebaseArticle)
    {
        abort_if(Gate::denies('knowledgebase_article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseArticle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
