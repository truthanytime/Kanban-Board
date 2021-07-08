<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyKnowledgebaseArticleRequest;
use App\Http\Requests\StoreKnowledgebaseArticleRequest;
use App\Http\Requests\UpdateKnowledgebaseArticleRequest;
use App\Models\KnowledgebaseArticle;
use App\Models\KnowledgebaseCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class KnowledgebaseArticleController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('knowledgebase_article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseArticles = KnowledgebaseArticle::with(['categories'])->get();

        $knowledgebase_categories = KnowledgebaseCategory::get();

        return view('admin.knowledgebaseArticles.index', compact('knowledgebaseArticles', 'knowledgebase_categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('knowledgebase_article_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = KnowledgebaseCategory::all()->pluck('name', 'id');

        return view('admin.knowledgebaseArticles.create', compact('categories'));
    }

    public function store(StoreKnowledgebaseArticleRequest $request)
    {
        $knowledgebaseArticle = KnowledgebaseArticle::create($request->all());
        $knowledgebaseArticle->categories()->sync($request->input('categories', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $knowledgebaseArticle->id]);
        }

        return redirect()->route('admin.knowledgebase-articles.index');
    }

    public function edit(KnowledgebaseArticle $knowledgebaseArticle)
    {
        abort_if(Gate::denies('knowledgebase_article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = KnowledgebaseCategory::all()->pluck('name', 'id');

        $knowledgebaseArticle->load('categories');

        return view('admin.knowledgebaseArticles.edit', compact('categories', 'knowledgebaseArticle'));
    }

    public function update(UpdateKnowledgebaseArticleRequest $request, KnowledgebaseArticle $knowledgebaseArticle)
    {
        $knowledgebaseArticle->update($request->all());
        $knowledgebaseArticle->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.knowledgebase-articles.index');
    }

    public function show(KnowledgebaseArticle $knowledgebaseArticle)
    {
        abort_if(Gate::denies('knowledgebase_article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseArticle->load('categories', 'relatedKnowledgeTasks');

        return view('admin.knowledgebaseArticles.show', compact('knowledgebaseArticle'));
    }

    public function destroy(KnowledgebaseArticle $knowledgebaseArticle)
    {
        abort_if(Gate::denies('knowledgebase_article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseArticle->delete();

        return back();
    }

    public function massDestroy(MassDestroyKnowledgebaseArticleRequest $request)
    {
        KnowledgebaseArticle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('knowledgebase_article_create') && Gate::denies('knowledgebase_article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new KnowledgebaseArticle();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
