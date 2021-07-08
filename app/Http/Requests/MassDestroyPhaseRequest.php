<?php

namespace App\Http\Requests;

use App\Models\Phase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPhaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('phase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:phases,id',
        ];
    }
}
