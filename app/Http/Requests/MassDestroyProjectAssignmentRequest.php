<?php

namespace App\Http\Requests;

use App\Models\ProjectAssignment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProjectAssignmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('project_assignment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:project_assignments,id',
        ];
    }
}
