@extends('layouts.admin')
@section('content')

<style>
    .btn {
        color: white;
    }

    .p_button {
        background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%);
        color: white;
    }

    .p_button:hover {
        background-color: purple;
    }

.page-link {
    background-color: #F5F5F5;
    border: 1px solid black;
    border-radius: 5%;
    color: black !important;
}

.page-link:hover {
    background-color: purple;
    color: white !important;
}
    
</style>


<div style="display:flex; margin: 10px 30px;">
    <img src="/icon/user.png" width="100" height="100" alt="booth_logo">
    <h1 style="margin: 30px 30px;"><b> {{ trans('cruds.booth.title') }}</b></h1>
</div>


	
<div class="card">

    <div class="card-body">
        <div style="display:flex;">
        <div style="flex:50%;">
    <h4 style="margin-bottom:20px;">{{ trans('cruds.booth.title_singular') }} {{ trans('global.listing') }}</h4>
        </div> 
        <div style="margin: 10px 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn p_button" href="{{ route('admin.booths.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.booth.title_singular') }}
            </a>
            
        </div>
    </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered datatable datatable-Booth">
                <thead style="background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%); color: white;" >
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.booth.fields.boothId') }}
                        </th>
                        <th>
                            {{ trans('cruds.booth.fields.boothName') }}
                        </th>
                        <th>
                            {{ trans('cruds.booth.fields.boothManager') }}
                        </th>
                        <th>
                            {{ trans('cruds.booth.fields.boothColor') }}
                        </th>
                        <th style="text-align:center;">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booth as $key => $b)
                        <tr data-entry-id="{{ $b->boothId }}">
                            <td>

                            </td>
                            <td>
                                {{ $b->boothId ?? '' }}
                            </td>
                            <td>
                                {{ $b->boothName ?? '' }}
                            </td>
                            <td>
                                {{ $b->boothManager ?? '' }}
                            </td>
                            <td>
                                {{ $b->boothColor ?? '' }}
                            </td>
                            <td style="display:flex;">
                            
                                    <a style="margin-right:10px;" href="{{ route('admin.booths.show', $b->boothId) }}">
                                        <img width=20 height=20 src="{{ url('/icon/viewfile.png') }}">
                                    </a>
                                    
                                    <a style="margin-right:10px;" href="{{ route('admin.booths.edit', $b->boothId) }}">
                                    <img width=20 height=20 src="{{ url('/icon/edit.png') }}">
                                    </a>

                                    <form action="{{ route('admin.booths.destroy', $b->boothId) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input style="margin-right:10px;" type="image" width=20 height=20 src="{{ url('/icon/delete.png') }}" value="{{ trans('global.delete') }}">
                                    </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.booths.massDestroy') }}",
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Booth:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection