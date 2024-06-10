@extends('layouts.admin')
@section('title', 'modifica tag')

@section('content')
    <div>
        <h2 class="text-center text-uppercase">modifica un tag</h2>
    </div>
    <section class="container">
    
    <form action="{{route('admin.tags.update', $tag->slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">nome</label>
            <input type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name" value="{{old('name', $tag->title)}}" placeholder="inserisci titolo tag" value="{{$tag->title}}" >
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">modifica tag</button>
    </form>
</section>
@endSection