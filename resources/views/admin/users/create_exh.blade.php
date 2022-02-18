@extends('layouts.admin')
@section('content')

<style>
    body {
        background-image: url('/background/Add%20Admin%20Background.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .p_button {
		background-color: #72258B;
		color: white;
	}
	
	.p_button:hover {
		background-color: #3F145C;
		color: white;
	}

    .title {
        font-weight: 600;
        font-size: 48px;
        text-align: center;
        color: #72258B;
    }

    .form-control::placeholder {
        color: white;
    }

    .input-group {
		margin: 30px 20px;
	}

    .imgcenter {
        display: block;
        margin-bottom: auto;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
    }
</style>

<div style="display:flex;">
<div style="flex:50%;"><br><br><br><br><br><br><br><br>
<img class="imgcenter" src="/icon/UNIVRSE_LOGO2021_COLOR-1-1024x284.png">
<img class="imgcenter" src="/icon/Login-amico.png"></div>
<div class="card" style="padding: 20px 75px;">
    <div class="card-header border-0">
        <h4 class="title">Add New Admin</h4>
    </div>

    <center><img width=200 height=200 src="/icon/invite.png">

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="input-group" style="width:50%;">
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

            <div class="input-group" style="width:50%;">
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
            <button class="btn p_button" style="padding:6px 15px;" type="submit">
                    {{ trans('global.register') }}
                </button>
            <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.users.index') }}"> Return </a>

            </div>
        </form>
    </div>
</div>
</div>



@endsection