<?php

namespace App\Http\Requests;

use App\Models\Feature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('feature_edit');
    }

    public function rules()
    {
        return [
            'project_id' => [
                'required',
                'integer',
            ],
            'use_cases.*' => [
                'integer',
            ],
            'use_cases' => [
                'required',
                'array',
            ],
            'feature_name' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
            'phases.*' => [
                'integer',
            ],
            'phases' => [
                'array',
            ],
        ];
    }
}
