@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Student') }}</div>

                <div class="card-body">
                    <a href="{{ route('students.create')}}" class="btn btn-sm btn-primary" style="float: right;"> Add new student</a>
                   <table class="table table-responsive table-strioe " border="1">
                       <thead>
                        <tr>
                                <td>sl</td>
                                <td>Roll</td>
                                <td>Name</td>
                                <td>phone</td>

                                <td>class name </td>
                                <td> Action </td>
                        </tr>
                       </thead>
                       <tbody>
                        @foreach($students as $d)
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->roll}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->phone}}</td>
                            <td>{{$d->class_id}}</td>
                            <td>
                                {{-- <a href="{{ route('class.edit',$d->id)}}" class="btn btn-sm btn-info">edit</a> --}}
                                {{-- <a href="{{ route('class.delete',$d->id) }}" class="btn btn-sm btn-info">delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                       </tbody>

                   </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
