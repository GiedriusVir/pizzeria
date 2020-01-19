@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <p class="h2">Product types</p>
                    <a class="btn btn-outline-dark ml-auto" href="{{route('type.create')}}">Create</a>
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
                        @foreach ($types as $type)
                        <tr>
                            <th class="align-middle" scope="row">{{$type->id}}</th>
                            <td class="align-middle">{{$type->title}}</td>
                            <td class="align-middle">{{$type->priority}}</td>
                            <td class="d-flex">
                                <a class="btn btn-outline-dark mr-2" href="{{route('type.edit', [$type])}}">Edit</a>
                                <form action="{{route('type.destroy', [$type])}}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-dark" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                {{-- <div class="card-body d-flex border-bottom">
                    <div class="text-left mr-5">ID</div>
                    <div class="text-left mr-5">Title</div>
                    <div class="text-left mr-3">Priority</div>
                    <div class="mr-auto">Actions</div>
                </div> --}}
                {{-- @foreach ($types as $type)
                    <div class="card-body d-flex pt-2 pb-1">
                        <div class="pt-2 text-right mr-5">{{$type->id}}</div>
                        <div class="pt-2 text-left mr-5">{{$type->title}}</div>
                        <div class="pt-2 text-left mr-auto">{{$type->priority}}</div>
                        <div class="d-flex">
                            <a class="btn btn-outline-dark mr-2" href="{{route('type.edit', [$type])}}">Edit</a>
                            <form action="{{route('type.destroy', [$type])}}" method="post">
                                @csrf
                                <button class="btn btn-outline-dark" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach --}}

            </div>
        </div>
    </div>
</div>
@endsection