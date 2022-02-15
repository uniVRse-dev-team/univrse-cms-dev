@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon"></i>
        <b>{{ trans('global.show') }} {{ trans('cruds.sponsor.title') }}</b>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.id') }}
                        </th>
                        <td>
                            {{ $sponsor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_register') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_register }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_name') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_adr_1') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_adr_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_adr_2') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_adr_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_postcode') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_city') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_state') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_country') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_email') }}
                        </th>
                        <td>
                        @if($sponsor->spo_email)
                                <a href="mailto:{{ $sponsor->spo_email }}" target="_blank">
                                    {{ $sponsor->spo_email }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_pic') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_pic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_position') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_office') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_office }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_mobile') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_package') }}
                        </th>
                        <td>
                            {{ App\Models\Sponsor::SPO_PACKAGE_SELECT[$sponsor->spo_package] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_amount') }}
                        </th>
                        <td>
                            {{ $sponsor->spo_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sponsor.fields.spo_logo') }}
                        </th>
                        <td>
                            @if($sponsor->spo_logo)
                                <a href="{{ $sponsor->spo_logo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('admin.sponsors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection