@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon"></i>
        <b>{{ trans('global.edit') }} {{ trans('cruds.sponsor.title_singular') }}</b>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sponsors.update", [$sponsor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="spo_register">{{ trans('cruds.sponsor.fields.spo_register') }}</label>
                <input class="form-control {{ $errors->has('spo_register') ? 'is-invalid' : '' }}" type="text" name="spo_register" id="spo_register" value="{{ old('spo_register', $sponsor->spo_register) }}" required>
                @if($errors->has('spo_register'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_register') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_register_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_name">{{ trans('cruds.sponsor.fields.spo_name') }}</label>
                <input class="form-control {{ $errors->has('spo_name') ? 'is-invalid' : '' }}" type="text" name="spo_name" id="spo_name" value="{{ old('spo_name', $sponsor->spo_name) }}" required>
                @if($errors->has('spo_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_adr_1">{{ trans('cruds.sponsor.fields.spo_adr_1') }}</label>
                <input class="form-control {{ $errors->has('spo_adr_1') ? 'is-invalid' : '' }}" type="text" name="spo_adr_1" id="spo_adr_1" value="{{ old('spo_adr_1', $sponsor->spo_adr_1) }}" required>
                @if($errors->has('spo_adr_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_adr_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_adr_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_adr_2">{{ trans('cruds.sponsor.fields.spo_adr_2') }}</label>
                <input class="form-control {{ $errors->has('spo_adr_2') ? 'is-invalid' : '' }}" type="text" name="spo_adr_2" id="spo_adr_2" value="{{ old('spo_adr_2', $sponsor->spo_adr_2) }}" required>
                @if($errors->has('spo_adr_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_adr_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_adr_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_postcode">{{ trans('cruds.sponsor.fields.spo_postcode') }}</label>
                <input class="form-control {{ $errors->has('spo_postcode') ? 'is-invalid' : '' }}" type="text" name="spo_postcode" id="spo_postcode" value="{{ old('spo_postcode', $sponsor->spo_postcode) }}" required>
                @if($errors->has('spo_postcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_postcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_postcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_city">{{ trans('cruds.sponsor.fields.spo_city') }}</label>
                <input class="form-control {{ $errors->has('spo_city') ? 'is-invalid' : '' }}" type="text" name="spo_city" id="spo_city" value="{{ old('spo_city', $sponsor->spo_city) }}" required>
                @if($errors->has('spo_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_state">{{ trans('cruds.sponsor.fields.spo_state') }}</label>
                <input class="form-control {{ $errors->has('spo_state') ? 'is-invalid' : '' }}" type="text" name="spo_state" id="spo_state" value="{{ old('spo_state', $sponsor->spo_state) }}" required>
                @if($errors->has('spo_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_country">{{ trans('cruds.sponsor.fields.spo_country') }}</label>
                <input class="form-control {{ $errors->has('spo_country') ? 'is-invalid' : '' }}" type="text" name="spo_country" id="spo_country" value="{{ old('spo_country', $sponsor->spo_country) }}" required>
                @if($errors->has('spo_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_email">{{ trans('cruds.sponsor.fields.spo_email') }}</label>
                <input class="form-control {{ $errors->has('spo_email') ? 'is-invalid' : '' }}" type="text" name="spo_email" id="spo_email" value="{{ old('spo_email', $sponsor->spo_email) }}" required>
                @if($errors->has('spo_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_pic">{{ trans('cruds.sponsor.fields.spo_pic') }}</label>
                <input class="form-control {{ $errors->has('spo_pic') ? 'is-invalid' : '' }}" type="text" name="spo_pic" id="spo_pic" value="{{ old('spo_pic', $sponsor->spo_pic) }}" required>
                @if($errors->has('spo_pic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_pic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_position">{{ trans('cruds.sponsor.fields.spo_position') }}</label>
                <input class="form-control {{ $errors->has('spo_position') ? 'is-invalid' : '' }}" type="text" name="spo_position" id="spo_position" value="{{ old('spo_position', $sponsor->spo_position) }}" required>
                @if($errors->has('spo_position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_position_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spo_office">{{ trans('cruds.sponsor.fields.spo_office') }}</label>
                <input class="form-control {{ $errors->has('spo_office') ? 'is-invalid' : '' }}" type="text" name="spo_office" id="spo_office" value="{{ old('spo_office', $sponsor->spo_office) }}">
                @if($errors->has('spo_office'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_office') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_office_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_mobile">{{ trans('cruds.sponsor.fields.spo_mobile') }}</label>
                <input class="form-control {{ $errors->has('spo_mobile') ? 'is-invalid' : '' }}" type="text" name="spo_mobile" id="spo_mobile" value="{{ old('spo_mobile', $sponsor->spo_mobile) }}" required>
                @if($errors->has('spo_mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.sponsor.fields.spo_package') }}</label>
                <select class="form-control {{ $errors->has('spo_package') ? 'is-invalid' : '' }}" name="spo_package" id="spo_package" required>
                    <option value disabled {{ old('spo_package', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Sponsor::SPO_PACKAGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('spo_package', $sponsor->spo_package) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('spo_package'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_package') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_package_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_product">{{ trans('cruds.sponsor.fields.spo_product') }}</label>
                <input class="form-control {{ $errors->has('spo_product') ? 'is-invalid' : '' }}" type="text" name="spo_product" id="spo_product" value="{{ old('spo_product', $sponsor->spo_product) }}" required>
                @if($errors->has('spo_product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_amount">{{ trans('cruds.sponsor.fields.spo_amount') }}</label>
                <input class="form-control {{ $errors->has('spo_amount') ? 'is-invalid' : '' }}" type="text" name="spo_amount" id="spo_amount" value="{{ old('spo_amount', $sponsor->spo_amount) }}" required>
                @if($errors->has('spo_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="spo_logo">{{ trans('cruds.sponsor.fields.spo_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('spo_logo') ? 'is-invalid' : '' }}" id="spo_logo-dropzone">
                </div>
                @if($errors->has('spo_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spo_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sponsor.fields.spo_logo_helper') }}</span>
            </div>
            <div class="form-group">
            <a class="btn btn-danger" style="padding:6px 15px;" href="{{ route('admin.sponsors.index') }}"> Return </a>
                <button class="btn btn-info" style="padding:6px 15px;" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.spoLogoDropzone = {
    url: '{{ route('admin.sponsors.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="spo_logo"]').remove()
      $('form').append('<input type="hidden" name="spo_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="spo_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($sponsor) && $sponsor->spo_logo)
      var file = {!! json_encode($sponsor->spo_logo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="spo_logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection