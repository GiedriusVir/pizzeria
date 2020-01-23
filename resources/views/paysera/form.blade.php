@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Paysera mokėjimas</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('pay')}}" method="post">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="money">Pinigu kiekis</label>
                            <input class="form-control" type="text" name="amount" required>
                        </div>
                        @csrf
                        <button class="btn btn-outline-dark" type="submit">Mokėti</button>
                    </form>   
                </div>

            </div>
        </div>
    </div>
</div>
@endsection