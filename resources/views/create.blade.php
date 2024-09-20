@extends('layouts.app')

@section('content')
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" required>
        
        <label for="description">Description</label>
        <textarea name="description"></textarea>

        <label for="category_id">Category</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        
        <button type="submit">Add Book</button>
    </form>
@endsection
