@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
        <b>{{ trans('global.show') }} {{ trans('cruds.delegate.title') }}</b>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.id') }}
                        </th>
                        <td>
                            {{ $delegate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_name') }}
                        </th>
                        <td>
                            {{ $delegate->del_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_position') }}
                        </th>
                        <td>
                            {{ $delegate->del_position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_office') }}
                        </th>
                        <td>
                            {{ $delegate->del_office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_mobile') }}
                        </th>
                        <td>
                            {{ $delegate->del_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_email') }}
                        </th>
                        <td>
                        @if($delegate->del_email)
                                <a href="mailto:{{ $delegate->del_mail }}" target="_blank">
                                    {{ $delegate->del_email }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_adr_1') }}
                        </th>
                        <td>
                            {{ $delegate->del_adr_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_adr_2') }}
                        </th>
                        <td>
                            {{ $delegate->del_adr_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_postcode') }}
                        </th>
                        <td>
                            {{ $delegate->del_postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_city') }}
                        </th>
                        <td>
                            {{ $delegate->del_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_state') }}
                        </th>
                        <td>
                            {{ $delegate->del_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_country') }}
                        </th>
                        <td>
                            {{ $delegate->del_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_speaker') }}
                        </th>
                        <td>
                            {{ App\Models\Delegate::DEL_SPEAKER_RADIO[$delegate->del_speaker] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_twitter') }}
                        </th>
                        <td>
                            {{ $delegate->del_twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_linkedin') }}
                        </th>
                        <td>
                            {{ $delegate->del_linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.delegate.fields.del_facebook') }}
                        </th>
                        <td>
                            {{ $delegate->del_facebook }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('admin.delegates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection