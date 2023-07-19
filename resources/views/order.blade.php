@extends('layouts/main')
@section('content')
@php
    use App\Models\Cart;
@endphp
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Menu</h2>
                    <p>
                        Far far away, behind the word mountains, far from
                        the countries Vokalia and Consonantia, there live
                        the blind texts.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                @foreach ($pizzas as $pizza)
                    <div class="col-lg-4 d-flex ftco-animate pizza-data">
                        <input type="hidden" name="pizzaID" class="pizza_Id" value={{ $pizza->id }}>
                        <div class="services-wrap d-flex">
                            <a href="#" class="img"
                                style="
                            background-image: url({{ asset(env('IMAGE_DIR') . '/' . $pizza->image) }});
                        "></a>
                            <div class="text p-4">
                                <h3 class=""> {{ $pizza->name }}</h3>
                                <p>
                                    {{ $pizza->description }}
                                </p>
                                <p class="price">
                                    <span> {{ $pizza->price . '$' }} </span>
                                    <a href="#" class="ml-2 btn btn-white btn-outline-white add-cart">Add to cart</a>

                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </section>
@endsection
@section('additional_script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.add-cart', function(e) {
                var pizzaID = $(e.target).closest('.pizza-data').find('.pizza_Id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "add-to-cart",
                    data: {
                        'pizza_id': pizzaID
                    },
                    success: function (response) {
                        $('.cart-counter').text(response['cart-counter']);

                    }

                });
            });

        });
    </script>
@endsection
