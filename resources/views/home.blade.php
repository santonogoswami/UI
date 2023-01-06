@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <a href="{{ route('class.index')}}" class="text-sm text-gray-700 dark:text-gray-500 underline">Class</a>
                <a href="{{ route('students.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">student </a>
                   <br>
                   @if(session('ststus'))
                   <div class="alart alart-success" role="alert">
                    {{ session('status')}}
                   </div>

                   @endif
                   {{__('you are logged in')}} {{ Auth::user()->name}}

            </div>
            </div>
        </div>
    </div>
</div>
@endsection
