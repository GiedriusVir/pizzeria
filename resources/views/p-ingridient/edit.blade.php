@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Add ingridient to product</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('p-ingridient.update', [$group])}}" method="post">
                        <div class="form-group">
                            <label for="product_name">Product</label>
                            <select class="form-control" name="product_name" required>
                                <option value="{{$group->id}}">{{$group->title}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ingridients">Ingridients</label>

                            @foreach ($ingridients as $ingridient)    
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="ingridient[]" value="{{$ingridient->id}}">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$ingridient->title}} 
                                        @if ($ingridient->type)
                                            (trinamas)
                                        @else
                                            (netrinamas)
                                        @endif
                                    </label>
                                </div>
                            @endforeach

                        </div>
                        @csrf
                        <button class="btn btn-outline-dark" type="submit">Edit</button>
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection