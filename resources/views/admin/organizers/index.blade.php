@extends('layouts.admin')
@section('content')
@can('organizer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.organizers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.organizer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">

    <div class="card-body">
    <h4 style="margin-bottom:20px;">{{ trans('cruds.organizer.title_singular') }} {{ trans('global.listing') }}</h4>
        <table class=" table table-bordered table-hover ajaxTable datatable datatable-Organizer">
             <thead style="background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%); color: white;" >
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_adr_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_adr_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_postcode') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_state') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_country') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_pic') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizer.fields.org_logo') }}
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
@can('organizer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.organizers.massDestroy') }}",
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
    ajax: "{{ route('admin.organizers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'org_name', name: 'org_name' },
{ data: 'org_adr_1', name: 'org_adr_1' },
{ data: 'org_adr_2', name: 'org_adr_2' },
{ data: 'org_postcode', name: 'org_postcode' },
{ data: 'org_city', name: 'org_city' },
{ data: 'org_state', name: 'org_state' },
{ data: 'org_country', name: 'org_country' },
{ data: 'org_email', name: 'org_email' },
{ data: 'org_pic', name: 'org_pic' },
{ data: 'org_mobile', name: 'org_mobile' },
{ data: 'org_logo', name: 'org_logo', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Organizer').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection