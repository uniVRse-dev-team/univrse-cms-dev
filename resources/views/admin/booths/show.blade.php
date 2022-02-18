@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <b>{{ trans('global.show') }} {{ trans('cruds.booth.title') }}</b>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.booth.fields.boothId') }}
                        </th>
                        <td>
                            @foreach ($booth as $key => $b)
                            {{ $b->boothId }}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.booth.fields.boothName') }}
                        </th>
                        <td>
                            @foreach ($booth as $key => $b)
                                {{ $b->boothName }}
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.booth.fields.boothManager') }}
                        </th>
                        <td>
                            @foreach ($booth as $key => $b)
                                {{ $b->boothManager }}
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.booth.fields.boothColor') }}
                        </th>
                        <td>
                            @foreach ($booth as $key => $b)
                            {{ $b->boothColor }}
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-link" href="{{ route('admin.booths.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection