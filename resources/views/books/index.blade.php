<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Books</h1>

    <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Published At</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ optional($book->published_at)->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $book->department }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
