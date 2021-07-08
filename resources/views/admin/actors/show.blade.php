@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actor.fields.id') }}
                        </th>
                        <td>
                            {{ $actor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actor.fields.name') }}
                        </th>
                        <td>
                            {{ $actor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actor.fields.project') }}
                        </th>
                        <td>
                            {{ $actor->project->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actor.fields.notes') }}
                        </th>
                        <td>
                            {!! $actor->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actors.index') }}">
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
            <a class="nav-link" href="#as_a_use_cases" role="tab" data-toggle="tab">
                {{ trans('cruds.useCase.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="as_a_use_cases">
            @includeIf('admin.actors.relationships.asAUseCases', ['useCases' => $actor->asAUseCases])
        </div>
    </div>
</div>

@endsection