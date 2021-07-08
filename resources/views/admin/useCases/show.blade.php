@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.useCase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.use-cases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.useCase.fields.id') }}
                        </th>
                        <td>
                            {{ $useCase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.useCase.fields.as_a') }}
                        </th>
                        <td>
                            {{ $useCase->as_a->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.useCase.fields.i_want_to') }}
                        </th>
                        <td>
                            {{ $useCase->i_want_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.useCase.fields.so_i_can') }}
                        </th>
                        <td>
                            {{ $useCase->so_i_can }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.useCase.fields.notes') }}
                        </th>
                        <td>
                            {{ $useCase->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.useCase.fields.project') }}
                        </th>
                        <td>
                            {{ $useCase->project->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.use-cases.index') }}">
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
            <a class="nav-link" href="#use_case_features" role="tab" data-toggle="tab">
                {{ trans('cruds.feature.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="use_case_features">
            @includeIf('admin.useCases.relationships.useCaseFeatures', ['features' => $useCase->useCaseFeatures])
        </div>
    </div>
</div>

@endsection