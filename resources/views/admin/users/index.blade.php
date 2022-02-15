@extends('layouts.admin')
@section('content')
@can('user_create')
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

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn p_button" href="{{ route('admin.users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">

    <div class="card-body">
    <h4 style="margin-bottom:20px;">{{ trans('cruds.user.title_singular') }} {{ trans('global.listing') }}</h4> 
        <div class="table-responsive">
            <table class="table table-hover table-bordered datatable datatable-User">
                <thead style="background: linear-gradient(0deg, rgba(92,15,121,1) 0%, rgba(192,94,233,1) 100%); color: white;" >
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.avatar_url') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th style="text-align:center;" class="col-sm">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                {{ $user->avatar_url ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $user->approved ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $user->verified ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span style="background-color: #741897;" class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td style="display:flex;">
                                @can('user_show')
                                    <a style="margin-right:10px;" href="{{ route('admin.users.show', $user->id) }}">
                                        <img width=20 height=20 src="{{ url('/icon/viewfile.png') }}">
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a style="margin-right:10px;" href="{{ route('admin.users.edit', $user->id) }}">
                                    <img width=20 height=20 src="{{ url('/icon/edit.png') }}">
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input style="margin-right:10px;" type="image" width=20 height=20 src="{{ url('/icon/delete.png') }}" value="{{ trans('global.delete') }}">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection