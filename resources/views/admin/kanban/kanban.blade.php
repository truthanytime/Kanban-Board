@extends('layouts.admin')
@section('styles')

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid clearfix mb-5">
        <h2 class="page-title float-left">{{ trans('Kanban Board') }}</h2>
        <form action="/createproject" class="float-right" method="POST">
            @csrf
            <div class="input-group">
                <a href="{{ route('admin.kanbancreate') }}" class="btn btn-md btn-primary ml-1" id="btn_add"> <i class="fa fa-plus"></i>
                    Add project</a>
            </div>
        </form>
    </div>
    <form action="/saveDraft" method="POST">
        @csrf
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-header p-3">
                            <h2 class="m-0">Backlog</h2>
                        </div>
                        <div class="ibox-content">
                            <p class="big"><i class="fa fa-hand-o-up"></i> Drag task between list</p>


                            <ul class="sortable-list connectList agile-list" id="backlog">
                                @foreach ($projects as $project)
                                    @if ($project->status == 'backlog')
                                        <li class="warning-element" id="{{ $project->id }}">
                                            {{ $project->project->name }}
                                            <div class="agile-detail">
                                                <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                                <i class="fa fa-clock-o"></i> {{ $project->project->due_date }}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-header p-3">
                            <h2 class="m-0">In Progress</h2>
                        </div>
                        <div class="ibox-content">
                            <p class="big"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                            <ul class="sortable-list connectList agile-list" id="inprogress">
                                @foreach ($projects as $project)
                                    @if ($project->status == 'in_progress')
                                        <li class="warning-element" id="{{ $project->id }}">
                                            {{ $project->project->name }}
                                            <div class="agile-detail">
                                                <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                                <i class="fa fa-clock-o"></i> {{ $project->project->due_date }}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                                <li class="danger-element" id="11">
                                    Healthcare by parents (injected humour and the like).
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                        <i class="fa fa-clock-o"></i> 16.11.2015
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-header p-3">
                            <h2 class="m-0">Issues</h2>
                        </div>
                        <div class="ibox-content">
                            <p class="big"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                            <ul class="sortable-list connectList agile-list" id="issues">
                                @foreach ($projects as $project)
                                    @if ($project->status == 'issues')
                                        <li class="warning-element" id="{{ $project->id }}">
                                            {{ $project->project->name }}
                                            <div class="agile-detail">
                                                <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                                <i class="fa fa-clock-o"></i> {{ $project->project->due_date }}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                                <li class="info-element" id="13">
                                    Sometimes by accident, sometimes on purpose (injected humour and the like).
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                        <i class="fa fa-clock-o"></i> 16.11.2015
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-header p-3">
                            <h2 class="m-0">Completed</h2>
                        </div>
                        <div class="ibox-content">
                            <p class="big"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                            <ul class="sortable-list connectList agile-list" id="completed">
                                @foreach ($projects as $project)
                                    @if ($project->status == 'completed')
                                        <li class="warning-element" id="{{ $project->id }}">
                                            {{ $project->project->name }}
                                            <div class="agile-detail">
                                                <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                                <i class="fa fa-clock-o"></i> {{ $project->project->due_date }}
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                                <li class="success-element" id="14">
                                    Healthcare by parents (injected humour and the like).
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white">Done</a>
                                        <i class="fa fa-clock-o"></i> 16.11.2015
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/nestable2/jquery.nestable.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#btn_add").click(function(e) {
                e.preventDefault();
                var projectname = $('#inputaddproject').val();
                console.log(projectname);
                $.ajax({
                    url: "{{ route('admin.ajax_drag_project.create') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        projectname: projectname,
                        _token: _token
                    },
                    success: function(response) {
                        console.log(response);
                    },
                });
            });
            $("#backlog, #inprogress,#issues, #completed").sortable({
                connectWith: ".connectList",
                update: function(event, ui) {
                    var backlog = $("#backlog").sortable("toArray");
                    var in_progress = $("#inprogress").sortable("toArray");
                    var issues = $("#issues").sortable("toArray");
                    var completed = $("#completed").sortable("toArray");
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: "{{ route('admin.ajax_drag_project.store') }}",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            backlog: backlog,
                            in_progress: in_progress,
                            issues: issues,
                            completed: completed,
                            _token: _token
                        },
                        success: function(response) {
                            //console.log(response);
                        },
                    });
                    $('.output').html(
                        "Backlog: " + window.JSON.stringify(backlog) + "<br/>" +
                        "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" +
                        "Issues: " + window.JSON.stringify(issues) + "<br/>" +
                        "Completed: " + window.JSON.stringify(completed)
                    );
                }
            }).disableSelection();

        });
    </script>
@stop
