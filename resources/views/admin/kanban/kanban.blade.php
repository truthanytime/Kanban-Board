@extends('layouts.admin')
@section('styles')
    @parent
    <link href="{{ asset('/css/dashmix.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h3 class="page-title">{{ trans('global.kanbanproject') }}</h3>
    <div class="card">
        <div class="card-header text-primary">
            {{ trans('Kanban Card') }}
        </div>
        <div class="card-body">
            <form action="/saveDraft" method="POST">
                @csrf
                <h2 class="content-heading">Connected lists</h2>
                <div class="row">
                    <div class="col-xl-4">
                        <!-- Simple -->
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Simple</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="js-nestable-connected-simple dd">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle">Bootstrap</div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="2">
                                                    <div class="dd-handle">Themes</div>
                                                </li>
                                                <li class="dd-item" data-id="3">
                                                    <div class="dd-handle">Documentation</div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle">Learning</div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="5">
                                                    <div class="dd-handle">Code</div>
                                                </li>
                                                <li class="dd-item" data-id="6">
                                                    <div class="dd-handle">Tutorials</div>
                                                </li>
                                                <li class="dd-item" data-id="7">
                                                    <div class="dd-handle">Articles</div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="8">
                                            <div class="dd-handle">Design</div>
                                        </li>
                                        <li class="dd-item" data-id="9">
                                            <div class="dd-handle">Coding</div>
                                        </li>
                                        <li class="dd-item" data-id="10">
                                            <div class="dd-handle">Marketing</div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END Simple -->
                    </div>
                    <div class="col-xl-4">
                        <!-- With Icons -->
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">With Icons</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="js-nestable-connected-icons dd">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="11">
                                            <div class="dd-handle">
                                                <i class="fa fa-bold text-muted mr-1"></i> Bootstrap
                                            </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="12">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-brush text-muted mr-1"></i> Themes
                                                    </div>
                                                </li>
                                                <li class="dd-item" data-id="13">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file text-muted mr-1"></i> Documentation
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="14">
                                            <div class="dd-handle">
                                                <i class="fa fa-graduation-cap text-muted mr-1"></i> Learning
                                            </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="15">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-code text-muted mr-1"></i> Code
                                                    </div>
                                                </li>
                                                <li class="dd-item" data-id="16">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-pencil-alt text-muted mr-1"></i> Tutorials
                                                    </div>
                                                </li>
                                                <li class="dd-item" data-id="17">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file-alt text-muted mr-1"></i> Articles
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="18">
                                            <div class="dd-handle">
                                                <i class="fa fa-bezier-curve text-muted mr-1"></i> Design
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="19">
                                            <div class="dd-handle">
                                                <i class="fa fa-terminal text-muted mr-1"></i> Coding
                                            </div>
                                        </li>
                                        <li class="dd-item" data-id="20">
                                            <div class="dd-handle">
                                                <i class="fa fa-burn text-muted mr-1"></i> Marketing
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END With Icons -->
                    </div>
                    <div class="col-xl-4">
                        <!-- Tree View -->
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Tree View</h3>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="js-nestable-connected-treeview dd">
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="21">
                                            <div class="dd-handle">
                                                <i class="fa fa-folder text-warning mr-1"></i> Photos
                                            </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="22">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file-alt text-info mr-1"></i> trip_image_1.jpg
                                                    </div>
                                                </li>
                                                <li class="dd-item" data-id="23">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file-alt text-info mr-1"></i> trip_image_2.jpg
                                                    </div>
                                                </li>
                                                <li class="dd-item" data-id="24">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file-alt text-info mr-1"></i> trip_image_3.jpg
                                                    </div>
                                                </li>
                                                <li class="dd-item" data-id="25">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file-alt text-info mr-1"></i> trip_image_4.jpg
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="26">
                                            <div class="dd-handle">
                                                <i class="fa fa-folder text-warning mr-1"></i> Videos
                                            </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="27">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file-alt text-info mr-1"></i> Trailer.mov
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="28">
                                            <div class="dd-handle">
                                                <i class="fa fa-folder text-warning mr-1"></i> Notes
                                            </div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="29">
                                                    <div class="dd-handle">
                                                        <i class="fa fa-file-alt text-info mr-1"></i> Trip.docx
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="30">
                                            <div class="dd-handle">
                                                <i class="fa fa-file-alt text-info mr-1"></i> Backup.zip
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- END Tree View -->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('/js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/nestable2/jquery.nestable.min.js') }}"></script>
    <script src="{{ asset('/js/pages/be_comp_nestable.min.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            events = {!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,


            })
        });
        $(function() {
            $('#savedraft').click(function() {
                $.ajax({
                    url: '/saveDraft',
                    type: 'POST',
                    data: {
                        id: 1
                    },
                    success: function(response) {
                        alert("success");
                        //$('#something').html(response);
                    }
                });
            });
        });
    </script>
@stop
