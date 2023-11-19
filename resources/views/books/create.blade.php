<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>

    @include('books._form', ['action' => route('books.store')])
@endsection
