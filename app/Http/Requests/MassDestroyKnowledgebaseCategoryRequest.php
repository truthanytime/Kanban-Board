<?php

namespace App\Http\Requests;

use App\Models\KnowledgebaseCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyKnowledgebaseCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('knowledgebase_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:knowledgebase_categories,id',
        ];
    }
}
