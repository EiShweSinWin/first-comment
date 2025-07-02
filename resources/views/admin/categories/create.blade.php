@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Category Register</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-register">Register</button>
                <a href="{{ route('admin.categories') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection