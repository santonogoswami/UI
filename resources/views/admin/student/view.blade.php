@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All  Student Details') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <strong class="text-success"> {{ session()->get('success') }}</strong>
                 @endif
                 <a href="{{ route('students.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">student </a>


                 <div class="card-body">
                        <ul class="list">
                            <li class="list-item">class: {{$students->class_id}}</li>
                           <li class="list-item">name: {{ $students->name}}</li>
                           <li class="list-item">roll: {{ $students->roll}}</li>
                           <li class="list-item">phone: {{ $students->phone}}</li>
                           <li class="list-item">email: {{ $students->email}} </li>

                        </ul>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
