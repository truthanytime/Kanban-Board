<?php

namespace App\Http\Requests;

use App\Models\Phase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePhaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('phase_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'due_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
