<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKnowledgebaseCategoryRequest;
use App\Http\Requests\StoreKnowledgebaseCategoryRequest;
use App\Http\Requests\UpdateKnowledgebaseCategoryRequest;
use App\Models\KnowledgebaseCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KnowledgebaseCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('knowledgebase_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseCategories = KnowledgebaseCategory::all();

        return view('admin.knowledgebaseCategories.index', compact('knowledgebaseCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('knowledgebase_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.knowledgebaseCategories.create');
    }

    public function store(StoreKnowledgebaseCategoryRequest $request)
    {
        $knowledgebaseCategory = KnowledgebaseCategory::create($request->all());

        return redirect()->route('admin.knowledgebase-categories.index');
    }

    public function edit(KnowledgebaseCategory $knowledgebaseCategory)
    {
        abort_if(Gate::denies('knowledgebase_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.knowledgebaseCategories.edit', compact('knowledgebaseCategory'));
    }

    public function update(UpdateKnowledgebaseCategoryRequest $request, KnowledgebaseCategory $knowledgebaseCategory)
    {
        $knowledgebaseCategory->update($request->all());

        return redirect()->route('admin.knowledgebase-categories.index');
    }

    public function show(KnowledgebaseCategory $knowledgebaseCategory)
    {
        abort_if(Gate::denies('knowledgebase_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseCategory->load('categoryKnowledgebaseArticles');

        return view('admin.knowledgebaseCategories.show', compact('knowledgebaseCategory'));
    }

    public function destroy(KnowledgebaseCategory $knowledgebaseCategory)
    {
        abort_if(Gate::denies('knowledgebase_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $knowledgebaseCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyKnowledgebaseCategoryRequest $request)
    {
        KnowledgebaseCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
