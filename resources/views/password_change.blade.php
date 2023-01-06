@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header">{{__('change your password')}}</div>
                   <div class="card-body">

                    @if(session()->has('success'))
                       <strong class="text-success"> {{ session()->get('success') }}</strong>
                    @endif

                    @if(session()->has('error'))
                       <strong class="text-danger"> {{ session()->get('error') }}</strong>
                    @endif

                        <form method="post" action="{{ route('update_password')}}">
                            @csrf

                            <label for="current_password">Current Password:</label><br>
                            <input type="password" id="current_password" name="current_password"><br>

                            <label for="new_password">New Password:</label><br>
                            <input type="password" id="new_password" name="new_password"><br>

                            <label for="new_password_confirmation">Confirm New Password:</label><br>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"><br><br>

                            <button type="submit">Change Password</button>
                        </form>

                  </div>

                </div>
             </div>


    </div>
</div> </div>
@endsection
