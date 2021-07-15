@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/iCheck/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery.steps.css') }}" rel="stylesheet" />
    
	{{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /> --}}
	<link href="{{ asset('css/material-bootstrap-wizard.css') }}" rel="stylesheet" />
	{{-- <link href="{{ asset('css/demo.css') }}" rel="stylesheet" /> --}}
@endsection

@section('content')
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h2>
                            Creating Kanban Board
                        </h2>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="position:relative;">                        
                        <form id="form" method="POST" action="{{ route('admin.kanbansavedraft') }}" class="wizard-big" enctype="multipart/form-data">
                        
                            @csrf
                            <h1>New Project</h1>
                            <fieldset>
                                <div class="row mt-2">
                                    <div class="col-lg-8">                                        
                                        <div class="form-group">
                                            <label class="required" for="name">{{ trans('cruds.project.fields.name') }}</label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                                id="name" value="{{ old('name', '') }}" required>
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.project.fields.name_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="required" for="client_id">{{ trans('cruds.project.fields.client') }}</label>
                                            
                                            @if ($errors->has('client'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('client') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.project.fields.client_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ trans('cruds.project.fields.description') }}</label>
                                            <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                                name="description" id="description">{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('description') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.project.fields.description_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
                                            <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text"
                                                name="start_date" id="start_date" value="{{ old('start_date') }}">
                                            @if ($errors->has('start_date'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('start_date') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.project.fields.start_date_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="required" for="due_date">{{ trans('cruds.project.fields.due_date') }}</label>
                                            <input class="form-control datetime {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text"
                                                name="due_date" id="due_date" value="{{ old('due_date') }}" required>
                                            @if ($errors->has('due_date'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('due_date') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.project.fields.due_date_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="status_id">{{ trans('cruds.project.fields.status') }}</label>
                                            <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                                name="status_id" id="status_id">
                                                
                                            </select>
                                            @if ($errors->has('status'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('status') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.project.fields.status_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="budget">{{ trans('cruds.project.fields.budget') }}</label>
                                            <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="number"
                                                name="budget" id="budget" value="{{ old('budget', '') }}" step="0.01">
                                            @if ($errors->has('budget'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('budget') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.project.fields.budget_helper') }}</span>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <h1>Add Actors</h1>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>First name *</label>
                                            <input id="name" name="name" type="text" class="form-control required">
                                        </div>
                                        <div class="form-group">
                                            <label>Last name *</label>
                                            <input id="surname" name="surname" type="text" class="form-control required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input id="email" name="email" type="text" class="form-control required email">
                                        </div>
                                        <div class="form-group">
                                            <label>Address *</label>
                                            <input id="address" name="address" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h1>Add Use Cases</h1>
                            <fieldset>                                
                                    <div class="form-group">
                                        <label>Password *</label>
                                        <input id="password" name="password" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password *</label>
                                        <input id="confirm" name="confirm" type="text" class="form-control required">
                                    </div>
                                
                                    <div class="col-lg-4">
                                        <div class="text-center">
                                            <div style="margin-top: 20px">
                                                <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                            </div>
                                        </div>
                                    </div>
                            </fieldset>

                            <h1>Group Use Cases</h1>
                            <fieldset>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                            </fieldset>
                            <h1>Add Phases</h1>
                            <fieldset>
                                <div class="text-center" style="margin-top: 120px">
                                    <h2>You did it Man :-)</h2>
                                </div>
                            </fieldset>
                            <h1>Group Phases</h1>
                            <fieldset>
                                <div class="text-center" style="margin-top: 120px">
                                    <h2>You did it Man :-)</h2>
                                </div>
                            </fieldset>
                            <h1>Add Tasks</h1>
                            <fieldset>
                                <div class="text-center" style="margin-top: 120px">
                                    <h2>You did it Man :-)</h2>
                                </div>
                            </fieldset>
                        </form>
                        
                            <div class="savedraft">
                                <button id="savedraft" class="btn btn-md btn-primary ml-1">Save Draft</button>
                            </div>
                    </div>
                </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/nestable2/jquery.nestable.min.js') }}"></script>
    <script src="{{ asset('js/plugins/steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
    
	<script src="{{asset('/js/jquery.bootstrap.js') }}" type="text/javascript"></script>
	<script src="{{asset('/js/material-bootstrap-wizard.js')}}"></script>
    <script>
        $(document).ready(function() {
             $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
        });
    </script>
@stop
