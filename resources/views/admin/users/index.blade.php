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

    .e_btn {
        background: linear-gradient(0deg, rgba(165,35,135,1) 0%, rgba(125,67,138,1) 100%);
        color: white;
        padding: 5px;
        border-radius:110px;
    }

    .e_btn:hover {
        background: linear-gradient(0deg, rgba(108,28,94,1) 0%, rgba(54,4,62,1) 100%);
        color: white;
    }

    .e_btn_cancel {
        background: linear-gradient(0deg, rgba(255,24,24,1) 0%, rgba(159,32,56,1) 100%);
        color: white;
        padding: 5px 10px;
        border-radius:110px;
    }

    .e_btn_cancel:hover {
        color: white;
        background: linear-gradient(0deg, rgba(52,5,5,1) 0%, rgba(110,25,47,1) 100%);
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

.input-group {
		margin: 30px 20px;
	}

.title {
    font-weight: 800;
    font-size: 36px;
    text-align: center;
    color: #72258B;
}

.title_exh {
    font-weight: 600;
    margin: 20px;
    font-size: 24px;
    text-align: center;
    color: #72258B;
}

.imgcenter {
    padding: 5px;
    display: block;
    margin-bottom: auto;
    margin-left: auto;
    margin-right: auto;
}    

.mc_user {
    background-image: url('/background/Add%20Delegate%20Register%20Cropped.jpg');
    background-position: center; background-repeat: no-repeat; background-size: cover;
}

.mc_admin {
        background-image: url('/background/Add%20Admin%20Background.jpg');
        background-repeat: no-repeat;
        background-size: cover;
}

.mc_exhibitor {
        background-image: url('/background/border.png');
        background-repeat: no-repeat;
        background-size: 100% 100%;
}

.form-control::placeholder {
        color:white;
    }

.reg_form {
    background-color: white;
    padding: 30px;
    width: 40%;
    border-radius:5px;
}
    
</style>


<div style="display:flex; margin: 10px 30px;">
    <img src="/icon/user.png" width="100" height="100">
    <h1 style="margin: 30px 30px;"><b> {{ trans('cruds.user.title') }}</b></h1>
</div>



<div class="card">

    <div class="card-body">
        <div style="display:flex;">
        <div style="flex: 50%;">
            <h4 style="margin-bottom:20px;">{{ trans('cruds.user.title_singular') }} {{ trans('global.listing') }}</h4>
        </div>
        <div style="margin: 10px 10px;" class="row">
        <div class="col-lg-12">
            
            <!-- Add User - Trigger button -->
            <button type="button" class="btn p_button" data-toggle="modal" data-target="#exampleModal">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </button>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content mc_user">
                
                <div class="modal-body" >
                    <div style="display:flex;">
                    <div style="width: 50%">
                        <img class="imgcenter" width=50% height=auto src="/icon/univrse_logo_white-01.png">
                    </div>

                    <div class="reg_form">
                        <center><h4 class="title">Registration Form</h4>
                        <img width=100 height=100 style="margin:20px;" src="/icon/user.png">
                        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data" autocomplete="off">
                            <div class="input-group" style="width:70%;">
                                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 12px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-user"></i></span></div>
                                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" 
                                style="padding: 21px;background-color:#8334AB; font-size: 12px; color:white; border-radius: 0 5px 5px 0;" 
                                placeholder="{{ trans('cruds.user.fields.username') }}" value="{{ old('username', '') }}" required>
                                @if($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.username_helper') }}</span>
                            </div>

                                <div class="input-group" style="width:70%;">
                                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 12px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-lock"></i></span></div>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" 
                                style="padding: 21px;background-color:#8334AB; font-size: 12px; color:white; border-radius: 0 5px 5px 0;" 
                                placeholder="{{ trans('cruds.user.fields.password') }}" value="{{ old('password', '') }}" required>
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                            </div>

                            <div class="form-group">
                            <button class="btn e_btn" style="padding:6px 15px;" type="submit">
                                    <b>{{ trans('global.save') }}</b>
                            </button>

                            </div>

                        </form>
                        </center>
                    </div>

                    </div>
                </div>
                </div>
            </div>
            </div>

            <!-- Add Admin - Trigger button -->

            <button type="button" class="btn p_button" data-toggle="modal" data-target="#exModal1">
                {{ trans('global.add') }} Admin
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exModal1" role="dialog" aria-labelledby="exModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content mc_admin">
                
                <div class="modal-body" >
                    <div style="display:flex;F">
                    <div style="width: 50%;"><br><br><br><br><br><br>
                        <img class="imgcenter" width=50% height=auto src="/icon/UNIVRSE_LOGO2021_COLOR-1-1024x284.png">
                        <img class="imgcenter" width=50% height=auto src="/icon/Login-amico.png">
                    </div>

                    <div class="reg_form">
                        <center><h4 class="title">Add New Admin</h4>
                            <img width=100 height=100 style="margin:20px;" src="/icon/invite.png">

                        <form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                            <div class="input-group" style="width:70%;">
                                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 12px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-user"></i></span></div>
                                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" 
                                style="padding: 21px;background-color:#8334AB; font-size: 12px; color:white; border-radius: 0 5px 5px 0;" 
                                placeholder="{{ trans('cruds.user.fields.username') }}" value="{{ old('username', '') }}" required>
                                @if($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.username_helper') }}</span>
                            </div>

                                <div class="input-group" style="width:70%;">
                                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 12px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-lock"></i></span></div>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" 
                                style="padding: 21px;background-color:#8334AB; font-size: 12px; color:white; border-radius: 0 5px 5px 0;" 
                                placeholder="{{ trans('cruds.user.fields.password') }}" value="{{ old('password', '') }}" required>
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                            </div>

                            <div class="form-group">
                            <button class="btn e_btn" style="padding:6px 15px;" type="submit">
                                    <b>{{ trans('global.save') }}</b>
                                </button>

                            </div>

                        </form>
                        </center>
                    </div>

                    </div>
                </div>
                </div>
            </div>
            </div>


            <!-- Add Exhibitor - Trigger button -->
            <button type="button" class="btn p_button" data-toggle="modal" data-target="#exModal2">
                {{ trans('global.add') }} {{ trans('cruds.exhibitor.title_singular') }}
            </button>


            <!-- Modal -->
                <div class="modal fade" id="exModal2" role="dialog" aria-labelledby="exModal2Label" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content mc_exhibitor">
                    
                    <div class="modal-body" style="margin: 100px 0;">

                    <center>
                        <div class="reg_form">
                            <img width=250 height=auto src="/icon/UNIVRSE_LOGO2021_COLOR-1-1024x284.png">
                            <h4 class="title_exh">Add New Exhibitor</h4>
                            <img width=150 height=auto src="/icon/invite.png">
                        <form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                        @csrf
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 12px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-user"></i></span></div>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" 
                style="padding: 21px;background-color:#8334AB; font-size: 12px; color:white; border-radius: 0 5px 5px 0;" 
                placeholder="{{ trans('cruds.user.fields.username') }}" value="{{ old('username', '') }}" required>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.username_helper') }}</span>
            </div>

            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text" style="font-size: 12px; padding:15px;;background-color:#8334AB; color:white;"><i class="fas fa fa-lock"></i></span></div>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" 
                style="padding: 21px;background-color:#8334AB; font-size: 12px; color:white; border-radius: 0 5px 5px 0;" 
                placeholder="{{ trans('cruds.user.fields.password') }}" value="{{ old('password', '') }}" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>

            <div class="form-group">
            <button class="btn e_btn" style="padding:6px 15px;" type="submit">
                    <b>{{ trans('global.register') }}</b>
                </button>

            </div>
            </form>                       
                        </div>
                        </center>

                    </div>
                    </div>
                </div>
                </div>

        </div>
    </div>
        </div>
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
                            {{ trans('cruds.user.fields.username') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.occupation') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.age') }}
                        </th>
                        <th style="text-align:center;">
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
                                {{ $user->username ?? '' }}
                            </td>
                            <td>
                                {{ $user->country ?? '' }}
                            </td>
                            <td>
                                {{ $user->occupation ?? '' }}
                            </td>
                            <td>
                                {{ $user->age ?? '' }}
                            </td>
                            <td style="display:flex;">
                            
                                    <a style="margin-right:10px;" href="{{ route('admin.users.show', $user->id) }}">
                                        <img width=20 height=20 src="{{ url('/icon/viewfile.png') }}">
                                    </a>
                                    
                                    <a style="margin-right:10px;" href="{{ route('admin.users.edit', $user->id) }}">
                                    <img width=20 height=20 src="{{ url('/icon/edit.png') }}">
                                    </a>
                                    
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection