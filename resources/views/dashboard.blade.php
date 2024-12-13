<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to the Admin Dashboard</h2>
    <p>You're logged in as admin.</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
