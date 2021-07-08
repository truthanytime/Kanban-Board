@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.feature.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.features.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="project_id">{{ trans('cruds.feature.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="use_cases">{{ trans('cruds.feature.fields.use_case') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('use_cases') ? 'is-invalid' : '' }}" name="use_cases[]" id="use_cases" multiple required>
                    @foreach($use_cases as $id => $use_case)
                        <option value="{{ $id }}" {{ in_array($id, old('use_cases', [])) ? 'selected' : '' }}>{{ $use_case }}</option>
                    @endforeach
                </select>
                @if($errors->has('use_cases'))
                    <div class="invalid-feedback">
                        {{ $errors->first('use_cases') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.use_case_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="feature_name">{{ trans('cruds.feature.fields.feature_name') }}</label>
                <input class="form-control {{ $errors->has('feature_name') ? 'is-invalid' : '' }}" type="text" name="feature_name" id="feature_name" value="{{ old('feature_name', '') }}" required>
                @if($errors->has('feature_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('feature_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.feature_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.feature.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.feature.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Feature::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phases">{{ trans('cruds.feature.fields.phase') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('phases') ? 'is-invalid' : '' }}" name="phases[]" id="phases" multiple>
                    @foreach($phases as $id => $phase)
                        <option value="{{ $id }}" {{ in_array($id, old('phases', [])) ? 'selected' : '' }}>{{ $phase }}</option>
                    @endforeach
                </select>
                @if($errors->has('phases'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phases') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.phase_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.features.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $feature->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection