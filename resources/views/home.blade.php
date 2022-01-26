@extends('layouts.admin')
@section('content')


<style>
    .container {
        margin: 20px; 
        padding: 10px 20px;
        color: white;
        border-radius: 10px;
    }

    .user {
        background-color: #8442A3;
    }

    .exhibitor {
        background-color: #1DCE22
;
    }
    
    .exhibition {
        background-color: #273AAD;
    }
</style>

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Univrse CMS</h3>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <!--
                <div class="card-title">
                    <hr>
                    <h3>Welcome</h3>
                </div>
                <div class="card-text">
                    <p>idk</p>
                </div>
                -->
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('scripts')
@parent

@endsection

