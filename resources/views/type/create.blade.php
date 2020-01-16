@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create product type</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('type.store')}}" method="post">
                        <div class="form-group">
                            <label for="type_name">Type title</label>
                            <input class="form-control" type="text" name="type_title">
                        </div>
                        <div class="form-group">
                            <label for="type_priority">Priority</label>
                            <input class="form-control" type="text" name="type_priority">
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