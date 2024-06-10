@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Projects</h1>
        <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Create</a>
    </div>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">SLUG</th>
                <th scope="col">CREATED AT</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->slug}}</td>
                    <td>{{$project->created_at}}</td>
                    <td>{{$project->updated_at}}</td>
                    <td>
                        <a href="{{route('admin.projects.show', $project->slug)}}"> <i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.projects.edit', $project->slug)}}"><i class="fa-solid fa-pen"></i></a>
                        <!-- <a href="{{route('admin.projects.destroy', $project->slug)}}"><i class="fa-solid fa-trash"></i></a> -->
                        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">

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
{{$projects->links('vendor.pagination.bootstrap-5')}}
@endsection