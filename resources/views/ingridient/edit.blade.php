@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit product ingridient</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('ingridient.update', [$ingridient])}}" method="post">
                        <div class="form-group">
                            <label for="ingridient_name">Ingridient title</label>
                            <input class="form-control" type="text" name="ingridient_title" value="{{$ingridient->title}}">
                        </div>
                        <div class="form-group">
                            <label for="ingridient_type">Type</label>
                            <input class="form-control" type="text" name="ingridient_type" value="{{$ingridient->type}}">
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