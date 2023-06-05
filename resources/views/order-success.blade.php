@extends('layouts/main')
@section('content')
    @php
        use App\Models\Cart;
    @endphp
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                
                <section >

                    <div class="container">
                        <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
                            <div class="col-md-7 heading-section text-center ftco-animate">
                                <h2 class="mb-4">Success</h2>
                                {{-- <h3>{{$customer->name}}</h3> --}}
                                <p class="flip">
                                    <span class="deg1"></span><span class="deg2"></span><span class="deg3"></span>
                                </p>

                            </div>
                        </div>
                        <div class="row">



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
