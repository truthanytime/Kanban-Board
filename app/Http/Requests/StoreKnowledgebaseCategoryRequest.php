<?php

namespace App\Http\Requests;

use App\Models\KnowledgebaseCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKnowledgebaseCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('knowledgebase_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:knowledgebase_categories',
            ],
            'notes' => [
                'required',
            ],
        ];
    }
}
