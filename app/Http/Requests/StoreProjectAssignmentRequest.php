<?php

namespace App\Http\Requests;

use App\Models\ProjectAssignment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_assignment_create');
    }

    public function rules()
    {
        return [
            'users.*' => [
                'integer',
            ],
            'users' => [
                'required',
                'array',
            ],
            'role' => [
                'string',
                'required',
            ],
            'notes' => [
                'required',
            ],
        ];
    }
}
