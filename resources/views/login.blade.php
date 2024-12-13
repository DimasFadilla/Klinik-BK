@extends('layouts.app')

<!-- <div class="container"> -->
<div class="container mx-auto max-w-md">
<h2 class="text-2xl font-bold text-center">Login</h2>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mt-4">
        <!-- <div class="form-group"> -->
            <label for="username" class="block text-sm font-medium">Username</label>
            <input type="text" name="username" id="username" required class="w-full p-2 mt-2 border rounded-md" placeholder="Masukkan Username" required>
        </div>
        <div class="mt-4">
        <!-- <div class="form-group"> -->
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" name="password" id="password" required class="w-full p-2 mt-2 border rounded-md" placeholder="Masukkan Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

