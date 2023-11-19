<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>

    @include('books._form', ['action' => route('books.update', $book->id), 'method' => 'PUT'])
@endsection
