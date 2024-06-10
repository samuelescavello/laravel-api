@extends('layouts.admin')
@section('title', 'crea')

@section('content')
<section class="container">
    <h2 class="text-center text-uppercase">crea un nuovo tag</h2>
    <form action="{{route('admin.tags.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">nome</label>
            <input type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name"
                value="{{old('name')}}" placeholder="inserisci nome tag">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">crea</button>
    </form>
</section>
@endsection