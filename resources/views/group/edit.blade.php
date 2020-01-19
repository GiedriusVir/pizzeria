@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit product group</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('group.update', [$group])}}" method="post">
                        <div class="form-group">
                            <label for="group_name">Type title</label>
                            <input class="form-control" type="text" name="group_title" value="{{$group->title}}">
                        </div>
                        <div class="form-group">
                            <label for="group_priority">Priority</label>
                            <input class="form-control" type="text" name="group_priority" value="{{$group->priority}}">
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