<?php

namespace App\Http\Requests;

use App\Models\KnowledgebaseArticle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKnowledgebaseArticleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('knowledgebase_article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:knowledgebase_articles,id',
        ];
    }
}
