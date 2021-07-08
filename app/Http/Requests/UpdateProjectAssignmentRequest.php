<?php

namespace App\Http\Requests;

use App\Models\ProjectAssignment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_assignment_edit');
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
