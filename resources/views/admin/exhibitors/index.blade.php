@extends('layouts.admin')
@section('content')
@can('exhibitor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.exhibitors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.exhibitor.title_singular') }}
            </a>
            <a class="btn btn-success" href="{{ route('admin.exhibitors.uploadMedia') }}">
                Upload Materials
            </a>
            <a class="btn btn-info" href="{{ route('admin.exhibitors.viewMember') }}">
                Manage Members
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
        <b>{{ trans('cruds.exhibitor.title_singular') }} {{ trans('global.list') }}</b>
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Exhibitor">
            <thead>
                <tr>
                    <th width="15">

                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_adr_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_adr_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_postcode') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_state') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_country') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_pic') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_bcolor1') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_bcolor2') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_logo') }}
                    </th>
                    <th>
                        &nbsp;
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
@can('exhibitor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.exhibitors.massDestroy') }}",
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
    ajax: "{{ route('admin.exhibitors.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'exh_name', name: 'exh_name' },
{ data: 'exh_adr_1', name: 'exh_adr_1' },
{ data: 'exh_adr_2', name: 'exh_adr_2' },
{ data: 'exh_postcode', name: 'exh_postcode' },
{ data: 'exh_city', name: 'exh_city' },
{ data: 'exh_state', name: 'exh_state' },
{ data: 'exh_country', name: 'exh_country' },
{ data: 'exh_email', name: 'exh_email' },
{ data: 'exh_pic', name: 'exh_pic' },
{ data: 'exh_mobile', name: 'exh_mobile' },
{ data: 'exh_color1', name: 'exh_color1' },
{ data: 'exh_color2', name: 'exh_color2' },
{ data: 'exh_logo', name: 'exh_logo', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Exhibitor').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection