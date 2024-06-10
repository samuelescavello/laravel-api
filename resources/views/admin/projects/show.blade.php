@extends('layouts.admin')
@section('title', 'dettaggli')

@section('content')
<div class="mb-5">
    <h2 class="text-center text-uppercase">dettagli progetto</h2>
</div>

<div class="card container" style="width: 18rem;">
    <img src="{{asset('storage/' . $project->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$project->title}}</h5>
        <p class="card-text">{{$project->content}}</p>
        @if($project->category)
            <p>category: {{$project->category->name}}</p>
        @endif
        <div>
            @if($project->tags)
                @foreach ($project->tags as $tag)
                    <span class="badge bg-secondary mb-2">{{$tag->name}}</span>
                @endforeach
            @endif
        </div>

        <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-primary mb-2">modifica</a>

        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

        </form>
    </div>
</div>

@endsection