@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">User Register</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" required>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">DOB</label>
                <input type="date" name="dob" id="dob">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-register">Register</button>
                <a href="{{ route('admin.customers') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection