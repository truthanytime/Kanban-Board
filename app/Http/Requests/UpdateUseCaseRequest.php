<?php

namespace App\Http\Requests;

use App\Models\UseCase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUseCaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('use_case_edit');
    }

    public function rules()
    {
        return [
            'as_a_id' => [
                'required',
                'integer',
            ],
            'so_i_can' => [
                'required',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
