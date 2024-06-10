@extends('layouts.admin')
@section('title', 'categoriess')

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center">
        <h1>categories</h1>
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Create</a>
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
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.categories.show', $category->slug)}}"> <i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.categories.edit', $category->slug)}}"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{route('admin.categories.destroy', $category->slug)}}" method="POST">

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