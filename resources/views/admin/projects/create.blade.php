@extends('layouts.admin')
@section('title', 'crea')

@section('content')
<section class="container">
    <h2 class="text-center text-uppercase">crea il tuo progetto</h2>
    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title"
                value="{{old('title')}}" placeholder="inserisci titolo">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="file" accept="image/*" class="form-control" @error('image') is-invalid @enderror id="image"
                name="image" value="{{old('image')}}" placeholder="inserisci titolo">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">contenuto</label>
            <textarea class="form-control" @error('content') is-invalid @enderror id="content"
                value="{{old('content')}}" name="content" placeholder="inserisci contenuto" col="30"
                rows="10"></textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">select category</label>
            <select name="category_id" id="category_id" class="form-control" @error('category_id') is-invalid @enderror>
                <option value="">seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{$category->id == old('category_id') ? 'selected' : ''}}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group ">
            <p>seleziona tag</p>
            <div class="d-flex">
                @foreach ($tags as $tag)
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}"
                            {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="">
                            {{$tag->name}}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('tags')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">crea</button>
    </form>
</section>
@endsection