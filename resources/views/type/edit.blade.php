@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit product type</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('type.update', [$type])}}" method="post">
                        <div class="form-group">
                            <label for="type_name">Type title</label>
                            <input class="form-control" type="text" name="type_title" value="{{$type->title}}">
                        </div>
                        <div class="form-group">
                            <label for="type_priority">Priority</label>
                            <input class="form-control" type="text" name="type_priority" value="{{$type->priority}}">
                        </div>
                        <button class="btn btn-outline-dark" type="submit">Edit</button>
                        @csrf
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection