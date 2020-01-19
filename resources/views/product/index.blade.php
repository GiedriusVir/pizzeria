@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <p class="h2">Products</p>
                    <a class="btn btn-outline-dark ml-auto" href="{{route('product.create')}}">Create</a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Size</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Group</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <th class="align-middle" scope="row">{{$product->id}}</th>
                            <td class="align-middle">{{$product->productType->title}}</td>
                            <td class="align-middle">{{$product->size_title}}</td>
                            <td class="align-middle">{{$product->description}}</td>
                            <td class="align-middle">{{$product->price}}</td>
                            <td class="align-middle">{{$product->discount}}</td>
                            <td class="align-middle">{{$product->photo}}</td>
                            <td class="align-middle">{{$product->priority}}</td>
                            <td class="align-middle">{{$product->productGroup->title}}</td>
                            <td class="d-flex">
                                <a class="btn btn-outline-dark mr-2" href="{{route('product.edit', [$product])}}">Edit</a>
                                <form action="{{route('product.destroy', [$product])}}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-dark" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection