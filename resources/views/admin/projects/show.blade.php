@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <td>
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.client') }}
                        </th>
                        <td>
                            {{ $project->client->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {{ $project->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.start_date') }}
                        </th>
                        <td>
                            {{ $project->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.due_date') }}
                        </th>
                        <td>
                            {{ $project->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.status') }}
                        </th>
                        <td>
                            {{ $project->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.budget') }}
                        </th>
                        <td>
                            {{ $project->budget }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#project_features" role="tab" data-toggle="tab">
                {{ trans('cruds.feature.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_phases" role="tab" data-toggle="tab">
                {{ trans('cruds.phase.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_tasks" role="tab" data-toggle="tab">
                {{ trans('cruds.task.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_actors" role="tab" data-toggle="tab">
                {{ trans('cruds.actor.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_use_cases" role="tab" data-toggle="tab">
                {{ trans('cruds.useCase.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="project_features">
            @includeIf('admin.projects.relationships.projectFeatures', ['features' => $project->projectFeatures])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_phases">
            @includeIf('admin.projects.relationships.projectPhases', ['phases' => $project->projectPhases])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_tasks">
            @includeIf('admin.projects.relationships.projectTasks', ['tasks' => $project->projectTasks])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_actors">
            @includeIf('admin.projects.relationships.projectActors', ['actors' => $project->projectActors])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_use_cases">
            @includeIf('admin.projects.relationships.projectUseCases', ['useCases' => $project->projectUseCases])
        </div>
    </div>
</div>

@endsection