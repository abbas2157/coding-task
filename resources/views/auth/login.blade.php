@extends('layout.app')
@section('title')
<title>Home | My Task</title>
@stop
@section('content')
<div class="container">
    <div class="p-t-40 mt-5 pt-5">
        <div class="mt-5 mb-5">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    @if ($errors->has('error'))
                        <div class="text-danger text-left mt-3">{{ $errors->first('error') }}</div>
                    @endif
                    <form action="{{ route('login.perform') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete="off" {{ old('email') }}>
                            @error('email') <span>{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required placeholder="Enter your password" autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>

@stop