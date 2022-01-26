@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon"></i>
        <b>{{ trans('global.show') }} {{ trans('cruds.organizer.title') }}</b>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.id') }}
                        </th>
                        <td>
                            {{ $organizer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_register') }}
                        </th>
                        <td>
                            {{ $organizer->org_register }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_name') }}
                        </th>
                        <td>
                            {{ $organizer->org_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_adr_1') }}
                        </th>
                        <td>
                            {{ $organizer->org_adr_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_adr_2') }}
                        </th>
                        <td>
                            {{ $organizer->org_adr_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_postcode') }}
                        </th>
                        <td>
                            {{ $organizer->org_postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_city') }}
                        </th>
                        <td>
                            {{ $organizer->org_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_state') }}
                        </th>
                        <td>
                            {{ $organizer->org_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_country') }}
                        </th>
                        <td>
                            {{ $organizer->org_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_email') }}
                        </th>
                        <td>
                        @if($organizer->org_email)
                                <a href="mailto:{{ $organizer->org_email }}" target="_blank">
                                    {{ $organizer->org_email }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_pic') }}
                        </th>
                        <td>
                            {{ $organizer->org_pic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_position') }}
                        </th>
                        <td>
                            {{ $organizer->org_position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_office') }}
                        </th>
                        <td>
                            {{ $organizer->org_office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_mobile') }}
                        </th>
                        <td>
                            {{ $organizer->org_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.organizer.fields.org_logo') }}
                        </th>
                        <td>
                            @if($organizer->org_logo)
                                <a href="{{ $organizer->org_logo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('admin.organizers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection