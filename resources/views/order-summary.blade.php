@extends('layouts/main')
@section('content')
    @php
        use App\Models\Cart;
    @endphp
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">

                <section>

                    <div class="container">
                        <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                            <div class="col-md-7 heading-section text-center ftco-animate">
                                <h2 class="mb-4">Order Summary</h2>
                                <p class="flip">
                                    <span class="deg1"></span><span class="deg2"></span><span class="deg3"></span>
                                </p>

                            </div>
                        </div>
                        <div class="row">

                            @foreach ($cartDetails as $item)
                                <div class="col-md-12">
                                    <div class="pricing-entry d-flex ftco-animate">
                                        <div class="img"
                                            style="
                                            background-image: url(images/pizza-5.jpg);
                                        ">
                                        </div>
                                        <div class="desc pl-3">
                                            <div class="d-flex text align-items-center">
                                                <h3><span> {{ $item->pizza->name }} </span></h3>
                                                <span class="price"> {{ $item->pizza->price }} </span>
                                            </div>
                                            <div class="d-block">
                                                <p>
                                                    {{ $item->pizza->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                <div class="pricing-entry d-flex ftco-animate">
                                    <div class="img"
                                        style="
                                            background-image: url(images/pizza-5.jpg);
                                        ">
                                    </div>
                                    <div class="desc pl-3">
                                        <div class="d-flex text align-items-center">
                                            <h3><span> <b> Total price </b> </span></h3>
                                            <span class="price"> <b>{{ $totalPrice }}</b> </span>
                                        </div>
                                        <div class="d-block">

                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ route('checkout') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ getCurrentUserId() }}">
                                                <button type="submit" class="btn btn-primary px-5 my-4">Processed to
                                                    Checkout </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </section>

            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">



            </div>
        </div>

    </section>
@endsection
