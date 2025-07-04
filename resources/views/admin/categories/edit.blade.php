@extends('layouts.app')
@section('page_title', 'Category Update')
@section('content')
  
    <div class="form-container">
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-register">Save</button>
                <a href="{{ route('admin.categories') }}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection