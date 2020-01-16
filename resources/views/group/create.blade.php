@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create product group</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('group.store')}}" method="post">
                        <div class="form-group">
                            <label for="group_name">Group title</label>
                            <input class="form-control" type="text" name="group_title">
                        </div>
                        <div class="form-group">
                            <label for="group_priority">Priority</label>
                            <input class="form-control" type="text" name="group_priority">
                        </div>
                        @csrf
                        <button class="btn btn-outline-dark" type="submit">Create</button>
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection