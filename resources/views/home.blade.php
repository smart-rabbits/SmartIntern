@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @else if
                    (auth()->user()->is_com_sv == 1)
                    <a href="{{url('com_sv/routes')}}">Company Supervisor</a>
                    @else if
                    (auth()->user()->is_fac_sv == 1)
                    <a href="{{url('fac_sv/routes')}}">Faculty Supervisor</a>
                    @else
                    <a href="{{url('student/routes')}}">Student</a>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
