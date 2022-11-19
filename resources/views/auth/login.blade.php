@extends('layouts.auth')
@section('title','Login')
@section('description','Please Login')
@section('content')
<form action="{{ route('auth.login.process') }}" method="POST">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" name="email">
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    @error('password')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    {{-- <div class="form-check form-check-lg d-flex align-items-end">
        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" name="">
        <label class="form-check-label text-gray-600" for="flexCheckDefault">
            Keep me logged in
        </label>
    </div> --}}
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log in</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class="text-gray-600">Don't have an account? <a href="#"class="font-bold">Signup</a>.</p>
    <p><a class="font-bold" href="#">Forgot password?</a>.</p>
</div>
@endsection
