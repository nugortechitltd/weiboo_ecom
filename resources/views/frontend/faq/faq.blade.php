@extends('frontend.master.master')
@section('content')
<div class="page-path">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="path-title">Faq</h1>
            <ul>
                <li><a class="home-page-link" href="{{route('site')}}">Home <i class="fal fa-angle-right"></i></a></li>
                <li><a class="current-page" href="#">Faq</a></li>
            </ul>
        </div>
    </div>
</div>

<!--faq-area start-->
<section class="faq-area pt-120 pb-90 pt-md-55 pb-md-30 pt-xs-55 pb-xs-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="faq-que-list mb-30">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faq_left as $sl=>$faq)
                        <div class="accordion-item mb-20">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button {{$sl == 0 ? '': 'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$faq->id}}" aria-expanded="{{$sl == 0 ? 'true' : 'false'}}" aria-controls="collapse{{$faq->id}}">
                                    {{$faq->faq_title}}
                                </button>
                            </h2>
                            <div id="collapse{{$faq->id}}" class="accordion-collapse collapse {{$sl == 0 ? 'show' : ''}}"
                                aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{{$faq->faq_desc}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="faq-que-list mb-30">
                    <div class="accordion" id="accordionExample2">
                        @foreach ($faq_right as $right=>$faq_r)
                        <div class="accordion-item mb-20">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button {{$right == 0 ? '': 'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix{{$faq_r->id}}" aria-expanded="{{$right == 0 ? 'true': 'false'}}" aria-controls="collapseSix{{$faq_r->id}}">
                                    {{$faq_r->faq_title_r}}
                                </button>
                            </h2>
                            <div id="collapseSix{{$faq_r->id}}" class="accordion-collapse collapse {{$right == 0 ? 'show': ''}}"
                                aria-labelledby="headingSix" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    <p>{{$faq_r->faq_desc_r}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="accordion-item mb-20">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    Do you know anyone that works with our company?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="headingSeven" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    <p>Happiness Engineer via our Help Desk. We provide support for extensions
                                        developed by
                                        and/or sold on WooCommerce.com, and Jetpack/WordPress.com customers. If you
                                        are
                                        not a customer, we recommend finding help</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-20">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false"
                                    aria-controls="collapseEight">
                                    How do I get in touch with WooCommerce?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="headingEight" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    <p>Happiness Engineer via our Help Desk. We provide support for extensions
                                        developed by
                                        and/or sold on WooCommerce.com, and Jetpack/WordPress.com customers. If you
                                        are
                                        not a customer, we recommend finding help</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-20">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseNine" aria-expanded="false"
                                    aria-controls="collapseNine">
                                    How do I get in touch with WooCommerce?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    <p>Happiness Engineer via our Help Desk. We provide support for extensions
                                        developed by
                                        and/or sold on WooCommerce.com, and Jetpack/WordPress.com customers. If you
                                        are
                                        not a customer, we recommend finding help</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-20">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    How do I get in touch with WooCommerce?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    <p>Happiness Engineer via our Help Desk. We provide support for extensions
                                        developed by
                                        and/or sold on WooCommerce.com, and Jetpack/WordPress.com customers. If you
                                        are
                                        not a customer, we recommend finding help</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--faq-area end-->
@endsection