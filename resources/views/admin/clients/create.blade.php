@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.client.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.client.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.client.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}">
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.client.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skype">{{ trans('cruds.client.fields.skype') }}</label>
                <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', '') }}">
                @if($errors->has('skype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skype') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.skype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_2">{{ trans('cruds.client.fields.address_2') }}</label>
                <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', '') }}">
                @if($errors->has('address_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="town">{{ trans('cruds.client.fields.town') }}</label>
                <input class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}" type="text" name="town" id="town" value="{{ old('town', '') }}">
                @if($errors->has('town'))
                    <div class="invalid-feedback">
                        {{ $errors->first('town') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.town_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.client.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.client.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.client.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.client.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.client.fields.details') }}</label>
                <textarea class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" name="details" id="details">{{ old('details') }}</textarea>
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.details_helper') }}</span>
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