@can('phase_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.phases.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.phase.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.phase.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-projectPhases">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.phase.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.phase.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.phase.fields.due_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.phase.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.phase.fields.budget') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phases as $key => $phase)
                        <tr data-entry-id="{{ $phase->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $phase->id ?? '' }}
                            </td>
                            <td>
                                {{ $phase->name ?? '' }}
                            </td>
                            <td>
                                {{ $phase->due_date ?? '' }}
                            </td>
                            <td>
                                {{ $phase->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $phase->budget ?? '' }}
                            </td>
                            <td>
                                @can('phase_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.phases.show', $phase->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('phase_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.phases.edit', $phase->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('phase_delete')
                                    <form action="{{ route('admin.phases.destroy', $phase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('phase_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.phases.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-projectPhases:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection