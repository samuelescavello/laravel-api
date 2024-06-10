@extends('layouts.admin')
@section('title', 'modifica categoria')

@section('content')
    <div>
        <h2 class="text-center text-uppercase">modifica una categoria</h2>
    </div>
    <section class="container">
    
    <form action="{{route('admin.categories.update', $category->slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">nome</label>
            <input type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name" value="{{old('name', $category->namee)}}" placeholder="inserisci titolo" value="{{$category->name}}" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">modifica</button>
    </form>
</section>
@endSection