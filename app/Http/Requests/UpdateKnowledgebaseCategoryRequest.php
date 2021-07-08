<?php

namespace App\Http\Requests;

use App\Models\KnowledgebaseCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKnowledgebaseCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('knowledgebase_category_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:knowledgebase_categories,name,' . request()->route('knowledgebase_category')->id,
            ],
            'notes' => [
                'required',
            ],
        ];
    }
}
