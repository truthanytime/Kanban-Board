@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.phase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.phases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.phase.fields.id') }}
                        </th>
                        <td>
                            {{ $phase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.phase.fields.name') }}
                        </th>
                        <td>
                            {{ $phase->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.phase.fields.due_date') }}
                        </th>
                        <td>
                            {{ $phase->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.phase.fields.notes') }}
                        </th>
                        <td>
                            {!! $phase->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.phase.fields.project') }}
                        </th>
                        <td>
                            {{ $phase->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.phase.fields.budget') }}
                        </th>
                        <td>
                            {{ $phase->budget }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.phases.index') }}">
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
            <a class="nav-link" href="#phase_features" role="tab" data-toggle="tab">
                {{ trans('cruds.feature.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="phase_features">
            @includeIf('admin.phases.relationships.phaseFeatures', ['features' => $phase->phaseFeatures])
        </div>
    </div>
</div>

@endsection