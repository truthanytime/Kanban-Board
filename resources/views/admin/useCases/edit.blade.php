@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.useCase.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.use-cases.update", [$useCase->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="as_a_id">{{ trans('cruds.useCase.fields.as_a') }}</label>
                <select class="form-control select2 {{ $errors->has('as_a') ? 'is-invalid' : '' }}" name="as_a_id" id="as_a_id" required>
                    @foreach($as_as as $id => $entry)
                        <option value="{{ $id }}" {{ (old('as_a_id') ? old('as_a_id') : $useCase->as_a->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('as_a'))
                    <div class="invalid-feedback">
                        {{ $errors->first('as_a') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.useCase.fields.as_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="i_want_to">{{ trans('cruds.useCase.fields.i_want_to') }}</label>
                <textarea class="form-control {{ $errors->has('i_want_to') ? 'is-invalid' : '' }}" name="i_want_to" id="i_want_to">{{ old('i_want_to', $useCase->i_want_to) }}</textarea>
                @if($errors->has('i_want_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('i_want_to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.useCase.fields.i_want_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="so_i_can">{{ trans('cruds.useCase.fields.so_i_can') }}</label>
                <textarea class="form-control {{ $errors->has('so_i_can') ? 'is-invalid' : '' }}" name="so_i_can" id="so_i_can" required>{{ old('so_i_can', $useCase->so_i_can) }}</textarea>
                @if($errors->has('so_i_can'))
                    <div class="invalid-feedback">
                        {{ $errors->first('so_i_can') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.useCase.fields.so_i_can_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.useCase.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $useCase->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.useCase.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_id">{{ trans('cruds.useCase.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $useCase->project->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.useCase.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection