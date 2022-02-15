@extends('layouts.admin')
@section('content')
@can('schedule_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.schedules.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.schedule.title_singular') }}
            </a>
            <a class="btn btn-warning" style="color:white;" href="{{ route('admin.schedules.manageSpeaker') }}">
                Manage Speakers
            </a>
        </div>
    </div>
@endcan
<div class="card">


    <div class="card-body">
    <h4 style="margin-bottom:20px;">{{ trans('cruds.schedule.title_singular') }} {{ trans('global.listing') }}</h4>
        <table class=" table table-bordered table-hover ajaxTable datatable datatable-Schedule">
        <thead style="background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%); color: white;" >
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_start_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_end_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_pic') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_venue') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.schedule.fields.sch_max_pax') }}
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('schedule_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.schedules.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.schedules.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'sch_title', name: 'sch_title' },
{ data: 'sch_start_time', name: 'sch_start_time' },
{ data: 'sch_end_time', name: 'sch_end_time' },
{ data: 'sch_description', name: 'sch_description' },
{ data: 'sch_pic', name: 'sch_pic' },
{ data: 'sch_venue', name: 'sch_venue' },
{ data: 'sch_price', name: 'sch_price' },
{ data: 'sch_max_pax', name: 'sch_max_pax' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Schedule').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection