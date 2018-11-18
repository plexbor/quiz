@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.common.errors')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Профиль</div>
                <div class="card-body">
                    <h5>Бонусные баллы: <span class="badge badge-secondary">{{ $user->bonus }}</span></h5>
                    <hr />
                    @include('user.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
