@extends('layouts.app')

@section('title', 'Login')

@section('content')
<form method="post" action="/auth/login/store">
    @include('alert')
    @csrf
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="inputEmail3">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="inputPassword3">
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-check">
            <input class="form-check-input" name="remember" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Remember Me
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
</form>
<a href="/sign-up">Sign up</a>
@endsection