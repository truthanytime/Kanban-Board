<?php

namespace App\Http\Requests;

use App\Models\UseCase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUseCaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('use_case_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:use_cases,id',
        ];
    }
}
