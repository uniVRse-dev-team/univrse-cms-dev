@extends('layouts.admin')
@section('content')
@can('delegate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.delegates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.delegate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
        <b>{{ trans('cruds.delegate.title_singular') }} {{ trans('global.list') }}</b>
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Delegate">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.delegate.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.delegate.fields.del_fname') }}
                    </th>
                    <th>
                        {{ trans('cruds.delegate.fields.del_lname') }}
                    </th>
                    <th>
                        {{ trans('cruds.delegate.fields.del_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.delegate.fields.del_contact_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.delegate.fields.del_companyname') }}
                    </th>
                    <th>
                        {{ trans('cruds.delegate.fields.del_jobposition') }}
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
@can('delegate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.delegates.massDestroy') }}",
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
    ajax: "{{ route('admin.delegates.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'del_name', name: 'del_name' },
{ data: 'del_position', name: 'del_position' },
{ data: 'del_office', name: 'del_office' },
{ data: 'del_mobile', name: 'del_mobile' },
{ data: 'del_email', name: 'del_email' },
{ data: 'del_adr_1', name: 'del_adr_1' },
{ data: 'del_adr_2', name: 'del_adr_2' },
{ data: 'del_postcode', name: 'del_postcode' },
{ data: 'del_city', name: 'del_city' },
{ data: 'del_state', name: 'del_state' },
{ data: 'del_country', name: 'del_country' },
{ data: 'del_speaker', name: 'del_speaker' },
{ data: 'del_twitter', name: 'del_twitter' },
{ data: 'del_linkedin', name: 'del_linkedin' },
{ data: 'del_facebook', name: 'del_facebook' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Delegate').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection