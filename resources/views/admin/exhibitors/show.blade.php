@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
        <b>{{ trans('global.show') }} {{ trans('cruds.exhibitor.title') }}</b>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.id') }}
                        </th>
                        <td>
                            {{ $exhibitor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_register') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_register }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Exhibition Name
                        </th>
                        <td>
                            {{ $exhibitor->exh_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_adr_1') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_adr_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_adr_2') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_adr_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_postcode') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_city') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_state') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_country') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_email') }}
                        </th>
                        <td>
                        @if($exhibitor->exh_email)
                                <a href="mailto:{{ $exhibitor->exh_email }}" target="_blank">
                                    {{ $exhibitor->exh_email }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_pic') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_pic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_position') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_office') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_bcolor1') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_bcolor1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_bcolor2') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_bcolor2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_mobile') }}
                        </th>
                        <td>
                            {{ $exhibitor->exh_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exhibitor.fields.exh_logo') }}
                        </th>
                        <td>
                            @if($exhibitor->exh_logo)
                                <a href="{{ $exhibitor->exh_logo->getURL() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('admin.exhibitors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection