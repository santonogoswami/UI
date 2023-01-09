@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Student') }}</div>

                <div class="card-body">
                    <a href="{{ route('students.create')}}" class="btn btn-sm btn-primary" style="float: right;"> Add new student</a>


                    @if(session()->has('success'))
                    <strong class="text-success"> {{ session()->get('success') }}</strong>
                 @endif

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
                        @foreach($students as $d);
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->roll}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->phone}}</td>
                            <td>{{$d->class_name }}</td>
                            <td>
                                <a href="{{ route('students.show',$d->id)}}" class="btn btn-sm btn-info">view</a>
                                <a href="{{ route('students.edit',$d->id)}}" class="btn btn-sm btn-info">edit</a>
                                <form action="{{ route('students.destroy',$d->id)}}" method="POST">
                                    @csrf
                            <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger">delete</button>

                                </form>

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
