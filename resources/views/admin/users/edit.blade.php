@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">User Update</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" required>
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">DOB</label>
                <input type="date" name="dob" id="dob" value="{{ $user->dob }}">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ $user->address }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-register">Register</button>
                <a href="{{ route('admin.users') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection