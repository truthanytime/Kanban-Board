<?php

namespace App\Http\Requests;

use App\Models\KnowledgebaseArticle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKnowledgebaseArticleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('knowledgebase_article_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:knowledgebase_articles,title,' . request()->route('knowledgebase_article')->id,
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'required',
                'array',
            ],
            'description' => [
                'required',
            ],
            'action' => [
                'required',
            ],
            'gotcha' => [
                'required',
            ],
        ];
    }
}
