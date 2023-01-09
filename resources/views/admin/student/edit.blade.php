@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Student') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <strong class="text-success"> {{ session()->get('success') }}</strong>
                 @endif
                 <a href="{{ route('students.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">student </a>
                    <a href="{{ route('students.index')}}" class="btn btn-sm btn-primary" style="float: right;"> Add new</a>
                    <form action="{{ route('students.update',$students->id)}}" method="post">
                      @csrf

                        <input type="hidden" name="_method" value="PUT">

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Class Name</label>
                          <select class="form-control" name="class_id">
                            @foreach ($class as $d )
                               <option value="{{$d->id}}" @if ($d->id == $students->class_id) selected @endif>  {{$d->class_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $students->name }}" required>

                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student roll</label>
                            <input type="text" name="roll" class="form-control" value="{{ $students->roll }}" required>
                          </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Student Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $students->email }}" required> </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Student phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $students->phone }}" required> </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
