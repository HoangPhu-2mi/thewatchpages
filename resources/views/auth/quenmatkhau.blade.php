@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 450px;">
    <div class="card shadow-sm p-4">
        <h3 class="text-center mb-4 fw-bold">FORGOT PASSWORD</h3>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @error('email')
            <div class="alert alert-danger text-center">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address *</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">SEND RESET LINK</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Back to Sign In</a>
        </div>
    </div>
</div>
@endsection
