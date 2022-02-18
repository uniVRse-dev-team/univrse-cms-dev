@extends('layouts.admin')
@section('content')
@can('exhibitor_create')
<style>
    .p_button {
        background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%);
        color: white;
    }

    .p_button:hover {
        background-color: purple;
    }
    
</style>

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn p_button" href="{{ route('admin.exhibitors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.exhibitor.title_singular') }}
            </a>
            <!--
            <a class="btn p_button" href="{{ route('admin.exhibitors.uploadMedia') }}">
                Upload Materials
            </a>
            <a class="btn p_button" href="{{ route('admin.exhibitors.viewMember') }}">
                Manage Members
            </a>
            -->
        </div>
    </div>
@endcan
<div class="card">
        
    <div class="card-body">
    <h4 style="margin-bottom:20px;">{{ trans('cruds.exhibitor.title_singular') }} {{ trans('global.listing') }}</h4>
        <table class=" table table-bordered compact table-hover ajaxTable datatable datatable-Exhibitor">
             <thead style="background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%); color: white;" >
                <tr>
                    <th width="15">

                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_fname') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_lname') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_contact_no') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_companyname') }}
                    </th>
                    <th>
                        {{ trans('cruds.exhibitor.fields.exh_jobposition') }}
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
{ data: 'exh_fname', name: 'exh_fname' },
{ data: 'exh_lname', name: 'exh_lname' },
{ data: 'exh_email', name: 'exh_email' },
{ data: 'exh_contact_no', name: 'exh_contact_no' },
{ data: 'exh_companyname', name: 'exh_companyname' },
{ data: 'exh_jobposition', name: 'exh_jobposition' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Exhibitor').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection