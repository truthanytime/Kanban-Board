<?php

namespace App\Http\Requests;

use App\Models\TimeEntry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTimeEntryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('time_entry_create');
    }

    public function rules()
    {
        return [
            'task_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'hours' => [
                'numeric',
                'required',
                'min:0',
            ],
        ];
    }
}
