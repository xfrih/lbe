@extends('layouts.app')

@section('content')
    <h1>List of Books</h1>
    <a href="{{ route('books.create') }}">Add New Book</a>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->title }} - Category: {{ $book->category->name }} - By {{ $book->user->name }}</li>
        @endforeach
    </ul>
@endsection