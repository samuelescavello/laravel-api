@extends('layouts.admin')
@section('title', 'tags')

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center">
        <h1>tags</h1>
        <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Create</a>
    </div>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">SLUG</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td>{{$tag->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.tags.show', $tag->slug)}}"> <i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.tags.edit', $tag->slug)}}"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{route('admin.tags.destroy', $tag->slug)}}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
</section>

@endsection