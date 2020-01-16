@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <p class="h2">Product groups</p>
                    <a class="btn btn-outline-dark ml-auto" href="{{route('group.create')}}">Create</a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <th class="align-middle" scope="row">{{$group->id}}</th>
                            <td class="align-middle">{{$group->title}}</td>
                            <td class="align-middle">{{$group->priority}}</td>
                            <td class="d-flex">
                                <a class="btn btn-outline-dark mr-2" href="{{route('group.edit', [$group])}}">Edit</a>
                                <form action="{{route('group.destroy', [$group])}}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-dark" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection