@extends('layouts.admin')
@section('title', 'modifica')

@section('content')
    <div>
        <h2 class="text-center text-uppercase">modifica un progetto</h2>
    </div>
    <section class="container">
    
    <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" value="{{old('title', $project->title)}}" placeholder="inserisci titolo" value="{{$project->title}}" >
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">contenuto</label>
            <textarea class="form-control" id="content" name="content" col="30"
                rows="10">{{old('content', $project->content)}}
            </textarea>
            
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">select category</label>
            <select name="category_id" id="category_id" class="form-control" @error('category_id') is-invalid @enderror >
                <option value="">seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{$category->id == $project->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
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
                            {{$project->tags->contains($tag->id) ? 'checked' : ''}}>
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
        <button type="submit" class="btn btn-success">modifica</button>
    </form>
</section>
@endSection