@extends('layouts.admin')
@section('title', 'crea')

@section('content')
<section class="container">
    <h2 class="text-center text-uppercase">crea una nuva categoria</h2>
    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="namme" class="form-label">titolo</label>
            <input type="text" class="form-control" @error('title') is-invalid @enderror id="name" name="name"
                value="{{old('name')}}" placeholder="inserisci categoria">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">crea</button>
    </form>
</section>
@endsection