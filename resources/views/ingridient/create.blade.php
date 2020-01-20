@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create product ingridient</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('ingridient.store')}}" method="post">
                        <div class="form-group">
                            <label for="ingridient_name">Type title</label>
                            <input class="form-control" type="text" name="ingridient_title" required>
                        </div>
                        <div class="form-group">
                            <label for="ingridient_type">Type</label>
                            <input class="form-control" type="text" name="ingridient_type" required>
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