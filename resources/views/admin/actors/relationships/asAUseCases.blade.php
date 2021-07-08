@can('use_case_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.use-cases.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.useCase.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.useCase.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-asAUseCases">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.useCase.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.useCase.fields.as_a') }}
                        </th>
                        <th>
                            {{ trans('cruds.useCase.fields.i_want_to') }}
                        </th>
                        <th>
                            {{ trans('cruds.useCase.fields.so_i_can') }}
                        </th>
                        <th>
                            {{ trans('cruds.useCase.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.useCase.fields.project') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($useCases as $key => $useCase)
                        <tr data-entry-id="{{ $useCase->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $useCase->id ?? '' }}
                            </td>
                            <td>
                                {{ $useCase->as_a->name ?? '' }}
                            </td>
                            <td>
                                {{ $useCase->i_want_to ?? '' }}
                            </td>
                            <td>
                                {{ $useCase->so_i_can ?? '' }}
                            </td>
                            <td>
                                {{ $useCase->notes ?? '' }}
                            </td>
                            <td>
                                {{ $useCase->project->name ?? '' }}
                            </td>
                            <td>
                                @can('use_case_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.use-cases.show', $useCase->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('use_case_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.use-cases.edit', $useCase->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('use_case_delete')
                                    <form action="{{ route('admin.use-cases.destroy', $useCase->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('use_case_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.use-cases.massDestroy') }}",
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
  let table = $('.datatable-asAUseCases:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection