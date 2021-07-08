<?php

namespace App\Http\Requests;

use App\Models\Actor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('actor_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
