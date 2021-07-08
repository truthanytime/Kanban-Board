<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SystemKanbanController extends Controller
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

        return view('admin.kanban.kanban', compact('events'));
    }

    public function saveDraft(Request $request)
    {
        $id = $_POST['id'];
        $test = new TestModel();
        $result = $test->getData($id);

        foreach ($result as $row) {
            $html =
                '<tr>
                    <td>' . $row->name . '</td>' .
                '<td>' . $row->address . '</td>' .
                '<td>' . $row->age . '</td>' .
                '</tr>';
        }
        return $html;
        // print_r($request->dm_project_new_name);
        // print_r("<br>");
        // print_r($request->dm_project_new_description);
        // print_r("<br>");
        exit;
    }
}
