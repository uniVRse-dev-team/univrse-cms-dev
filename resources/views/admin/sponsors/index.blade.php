@extends('layouts.admin')
@section('content')
@can('sponsor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sponsors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sponsor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">

    <div class="card-body">
        <h4 style="margin-bottom:20px;">{{ trans('cruds.sponsor.title_singular') }} {{ trans('global.listing') }}</h4>

        <table class=" table table-bordered table-hover ajaxTable datatable datatable-Sponsor">
        <thead style="background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%); color: white;" >
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_adr_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_adr_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_postcode') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_state') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_country') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_pic') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_mobile') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_package') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.sponsor.fields.spo_logo') }}
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
@can('sponsor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sponsors.massDestroy') }}",
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
    ajax: "{{ route('admin.sponsors.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'spo_name', name: 'spo_name' },
{ data: 'spo_adr_1', name: 'spo_adr_1' },
{ data: 'spo_adr_2', name: 'spo_adr_2' },
{ data: 'spo_postcode', name: 'spo_postcode' },
{ data: 'spo_city', name: 'spo_city' },
{ data: 'spo_state', name: 'spo_state' },
{ data: 'spo_country', name: 'spo_country' },
{ data: 'spo_email', name: 'spo_email' },
{ data: 'spo_pic', name: 'spo_pic' },
{ data: 'spo_mobile', name: 'spo_mobile' },
{ data: 'spo_package', name: 'spo_package'},
{ data: 'spo_amount', name: 'spo_amount' },
{ data: 'spo_logo', name: 'spo_logo', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Sponsor').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection