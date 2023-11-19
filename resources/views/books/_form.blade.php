<!-- resources/views/books/_form.blade.php -->

<form action="{{ $action }}" method="POST">
    @csrf

    @if(isset($method))
        @method($method)
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required>{{ old('description', $book->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="published_at" class="form-label">Published At</label>
        <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $book->published_at ? \Carbon\Carbon::parse($book->published_at)->format('Y-m-d\TH:i') : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="department" class="form-label">Department</label>
        <input type="text" class="form-control" id="department" name="department" value="{{ old('department', $book->department ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
