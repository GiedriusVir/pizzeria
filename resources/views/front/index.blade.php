<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dodo Pizza Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&display=swap" rel="stylesheet"> 
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="brand"><img src="./img/brand/brand.png"></div>
                <div class="login">Prisijungti</div>
                <div class="advert">
                    <div class="advert-row">
                        <p>Nemokamas picų pristatymas <span class="orange-color">Vilnius</span></p>
                        <p>60 minučių arba sekanti pica nemokamai</p>
                    </div>
                    <div class="advert-row">
                        <p>Skambinkite</p>
                        <p>8 635 11 555</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="nav">
                    <div class="nav-item" name="pizza">Picos</div>
                    <div class="nav-item" name="snacks">Užkandžiai</div>
                    <div class="nav-item" name="drinks">Gėrimai</div>
                    <div class="nav-item" name="promotions">Akcijos</div>
                    <div class="nav-item" name="contacs">Kontaktai</div>
                </div>
                <div class="basket">
                    Krepšelis | 
                    <span id="basket-count">
                        @if(isset($cart))
                            <br><br>
                            @foreach ($cart as $product)
                                {{$product->size_title}} - {{$product->count}} - {{$product->id}}<br>
                            @endforeach
                        @else
                            {{0}}
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </header>
    <div class="testimonials">
        TESTIMONIALS      
    </div>
    <main>
        <div class="container">

            @foreach ($types as $type)
                <section>
                    <div class="section-name">{{$type->title}}</div>
                    @foreach ($type->productOfType as $product)
                        @if ($product->type_id == 2 && $product->priority > 1)
                            @continue
                        @else
                            <div class="product">
                                <div class="item">
                                    <div class="item-img">
                                        <img src="{{ asset('img/'.$product->photo) }}" name="{{$product->photo}}" alt="{{$product->photo}}"/>
                                    </div>
                                    <h3>{{$product->productGroup->title}}</h3>
                                    <p>Description</p>
                                    <div class="item-row">
                                        <div class="item-cost">nuo {{$product->price}} €</div>
                                        <a href="{{route('add', [$product])}}" class="item-button">
                                            Pasirinkti
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif          
                    @endforeach
                
                </section> 
            @endforeach
        </div>
    </main>
    <div class="payment">
        <div class="container">
            PAYMENT
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-row">
                    <div class="footer-row-left">
                        <p><span>Darbas</span></p>
                        <p>Picerijoje</p>
                    </div>
                    <div class="footer-row-rigth">
                        <p>Skambinkite</p>
                        <p><span>8 635 11 555</span></p>
                        <p>kokybe@dodopizza.lt</p>
                    </div>
                </div>
                <div class="footer-row">
                    <div class="footer-bottom">
                        <img src="./img/brand/logo.png" alt="dodo logo">
                        <p>© 2020</p>
                        <a href="">Teisinė informacija</a>
                        <a href="">Alergenai ir informacija apie maistingumą</a>
                        <a href="https://www.instagram.com">Instragram</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="./js/data.js"></script>
    <script src="./js/function.js"></script>
    <script src="./js/action.js"></script>

</body>
</html>