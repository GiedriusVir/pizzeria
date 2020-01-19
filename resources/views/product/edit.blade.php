@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit product</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('product.update', [$product])}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_type">Type</label>
                            <select class="form-control" name="product_type">
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_size">Size</label>
                            <input class="form-control" type="text" name="product_size" value="{{$product->size_title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" type="text" name="product_description" required>{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Price</label>
                            <input class="form-control" type="text" name="product_price" value="{{$product->price}}" required>
                        </div>
                        <div class="form-group">
                            <label for="product_discount">Discount</label>
                            <input class="form-control" type="text" name="product_discount" value="{{$product->discount}}" required>
                        </div>
                        <div class="form-group">
                            <label for="product_photo">Photo</label>
                            <input class="form-control" type="file" name="product_photo" value="{{$product->photo}}" required>
                        </div>
                        <div class="form-group">
                            <label for="product_priority">Priority</label>
                            <input class="form-control" type="text" name="product_priority" value="{{$product->priority}}" required>
                        </div>
                        <div class="form-group">
                            <label for="product_group">Group</label>
                            <select class="form-control" name="product_group">
                                @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
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