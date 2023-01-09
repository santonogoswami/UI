@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update student info') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <strong class="text-success"> {{ session()->get('success') }}</strong>
                 @endif
                    <a href="{{ route('create.class')}}" class="btn btn-sm btn-primary" style="float: right;"> Add new</a>
                    <a href="{{ route('class.index')}}" class="text-sm text-gray-700 dark:text-gray-500 underline">Class</a>
                    <form action="{{ route('update.class', $data->id)}}" method="post">
                      @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Class Name</label>
                          <input type="text" name="class_name" value="{{$data->class_name}}" class="form-control @error('class_name') is-invalid @enderror" id="exampleInputEmail1"
                          placeholder=" class name" value="{{ old('class_name')}}">
                          @error('class_name')
                          <span class="invalid-feedback" role="alert">
                            <strong> {{ $message}}</strong>
                          </span>

                          @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
