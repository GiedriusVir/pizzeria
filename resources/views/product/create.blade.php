@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create product</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
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
                            <input class="form-control" type="text" name="product_size" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" type="text" name="product_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Price</label>
                            <input class="form-control" type="text" name="product_price" required>
                        </div>
                        <div class="form-group">
                            <label for="product_discount">Discount</label>
                            <input class="form-control" type="text" name="product_discount" required>
                        </div>
                        <div class="form-group">
                            <label for="product_photo">Photo</label>
                            <input class="form-control" type="file" name="product_photo" required>
                        </div>
                        <div class="form-group">
                            <label for="product_priority">Priority</label>
                            <input class="form-control" type="text" name="product_priority" required>
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
                        <button class="btn btn-outline-dark" type="submit">Create</button>
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection