@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All new Student') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <strong class="text-success"> {{ session()->get('success') }}</strong>
                 @endif
                 <a href="{{ route('students.index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">student </a>
                    <a href="{{ route('students.index')}}" class="btn btn-sm btn-primary" style="float: right;"> Add new</a>
                    <form action="{{ route('students.store')}}" method="post">
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Class Name</label>
                          <select class="form-control" name="class_id">
                            @foreach ($class as $d )
                               <option value="{{$d->id}}"> {{$d->class_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid

                            @enderror" id="exampleInputEmail1" placeholder="Class Name" value="{{ old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student roll</label>
                            <input type="text" name="roll" class="form-control @error('roll') is-invalid

                            @enderror" id="exampleInputEmail1" placeholder="Class roll" value="{{ old('roll')}}">
                            @error('roll')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          </div>
                             @enderror

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Student Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid

                                    @enderror" id="exampleInputEmail1" placeholder="Class phone" value="{{ old('email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> </div>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Student phone</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid

                                        @enderror" id="exampleInputEmail1" placeholder="Class phone" value="{{ old('phone')}}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> </div>
                                        @enderror
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
