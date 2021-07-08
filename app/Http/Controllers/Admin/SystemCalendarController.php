<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Project',
            'date_field' => 'due_date',
            'field'      => 'name',
            'prefix'     => 'Project',
            'suffix'     => 'is due',
            'route'      => 'admin.projects.edit',
        ],
        [
            'model'      => '\App\Models\Project',
            'date_field' => 'start_date',
            'field'      => 'name',
            'prefix'     => 'Project',
            'suffix'     => 'has kicked off!',
            'route'      => 'admin.projects.edit',
        ],
        [
            'model'      => '\App\Models\Phase',
            'date_field' => 'due_date',
            'field'      => 'name',
            'prefix'     => 'Phase',
            'suffix'     => 'is due!',
            'route'      => 'admin.phases.edit',
        ],
        [
            'model'      => '\App\Models\Task',
            'date_field' => 'due_date',
            'field'      => 'id',
            'prefix'     => 'Task',
            'suffix'     => 'is due!',
            'route'      => 'admin.tasks.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
