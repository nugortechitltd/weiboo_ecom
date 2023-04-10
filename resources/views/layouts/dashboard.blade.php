<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Andshop - Admin Dashboard HTML Template.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	@if (App\Models\Sitename::exists())
    <title>{{App\Models\Sitename::latest()->take(1)->first()->name}}</title>
    @else
    <title>Website - E-commerce HTML Template</title>
    @endif

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href='{{ asset('backend/assets/plugins/data-tables/datatables.bootstrap5.min.css') }}' rel='stylesheet'>
    <link href='{{ asset('backend/assets/plugins/data-tables/responsive.datatables.min.css') }}' rel='stylesheet'>

    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- custom css -->
    <link id="style.css" href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />

    <!-- FAVICON -->
	@if (App\Models\Favicon::exists())
	<link href="{{asset('uploads/favicon')}}/{{App\Models\Favicon::latest()->take(1)->first()->favicon}}" rel="shortcut icon" />
	@else
	<link href="{{ asset('backend/assets/img/favicon.png') }}" rel="shortcut icon" />
	@endif

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    <!--  WRAPPER  -->
    <div class="wrapper">

        <!-- LEFT MAIN SIDEBAR -->
        <div class="ec-left-sidebar ec-bg-sidebar">
            <div id="sidebar" class="sidebar ec-sidebar-footer">

                <div class="ec-brand">
                    {{-- <a href="{{route('home')}}"> --}}
                    @if (App\Models\Aboutus::latest()->exists())
                        <a href="{{ route('home') }}"><img class="ec-brand-name text-truncate"
                                src="{{ asset('uploads/logo') }}/{{ App\Models\Aboutus::latest()->take(1)->first()->logo }}"
                                alt="weiboo-logo"></a>
                    @else
                        <a href="{{ route('home') }}" class="logo">LOGO</a>
                        {{-- <span class="ec-brand-name "></span> --}}
                    @endif
                    </a>
                </div>

                <!-- begin sidebar scrollbar -->
                <div class="ec-navigation" data-simplebar>
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <!-- Dashboard -->
                        <li class="">
                            <a class="sidenav-item-link active" href="{{ route('site') }}" target="_b">
                                <i class="mdi mdi-web"></i>
                                <span class="nav-text">Website</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('home') ? 'active' : '' }}">
                            <a class="sidenav-item-link active" href="{{ route('home') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <!-- Users -->
                        <li class="has-sub {{ Request::is('user*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <span class="nav-text">User</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('user*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                    <li>
                                        <a class="sidenav-item-link {{ Request::is('user/list') ? 'active' : '' }}"
                                            href="{{ route('user.list') }}">
                                            <span class="nav-text">User List</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('user/profile') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('profile') }}">
                                            <span class="nav-text">Users Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Category -->
                        <li class="has-sub {{ Request::is('category*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-shape"></i>
                                <span class="nav-text">Categories</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('category*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                    <li class="{{ Request::is('category/list') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('category.list') }}">
                                            <span class="nav-text">All Category</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('category/add') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('category') }}">
                                            <span class="nav-text">Add Category</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('category/subcategory/list') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('subcategory.list') }}">
                                            <span class="nav-text">All Subcategory</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('category/subcategory/add') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('subcategory') }}">
                                            <span class="nav-text">Add Subcategory</span>
                                        </a>
                                    </li>
                                    {{-- <li class="{{ Request::is('category/maincategory/list') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('maincategory.list') }}">
                                            <span class="nav-text">All Maincategory</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('category/maincategory/add') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('maincategory') }}">
                                            <span class="nav-text">Maincategory</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>

                        <!-- Products -->
                        <li class="has-sub {{ Request::is('product*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <!-- <i class="mdi mdi-palette-advanced"></i> -->
                                <i class="mdi mdi-package-variant-closed"></i>
                                <span class="nav-text">Products</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('product*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                    <li class="{{ Request::is('product/list') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('product.list') }}">
                                            <span class="nav-text">All Product</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('product') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('product') }}">
                                            <span class="nav-text">Product</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('product/brand/list') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('brand.list') }}">
                                            <span class="nav-text">All Brand</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('product/brand') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('brand') }}">
                                            <span class="nav-text">Brand</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('product/variation/list') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('variation.list') }}">
                                            <span class="nav-text">All Variation</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('product/variation') ? 'active' : '' }}">
                                        <a class="sidenav-item-link" href="{{ route('variation') }}">
                                            <span class="nav-text">Variation</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- Coupon --}}
                        <li class="has-sub {{ Request::is('coupon*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-clipboard-check"></i>
                                <span class="nav-text">Coupon</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('coupon*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                    <li>
                                        <a class="sidenav-item-link {{ Request::is('coupon') ? 'active' : '' }}"
                                            href="{{ route('coupon') }}">
                                            <span class="nav-text">Coupon</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link {{ Request::is('coupon/list') ? 'active' : '' }}"
                                            href="{{ route('coupon.list') }}">
                                            <span class="nav-text">All Coupon</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Orders -->
                        <li class="has-sub {{ Request::is('order*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-cart-outline"></i>
                                <span class="nav-text">Orders</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('order*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('order/list*') ? 'active' : '' }}"
                                            href="{{ route('order') }}">
                                            <span class="nav-text">Order list</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Faq -->
                        <li class="has-sub {{ Request::is('faq*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-calendar-question"></i>
                                <span class="nav-text">Faq's</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('faq*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="faqs" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('faq/list') ? 'active' : '' }}"
                                            href="{{ route('faq.list') }}">
                                            <span class="nav-text">All faq</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('faq/store*') ? 'active' : '' }}"
                                            href="{{ route('faq.store') }}">
                                            <span class="nav-text">Add faq</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- About -->
                        <li class="has-sub {{ Request::is('about*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-bookmark"></i>
                                <span class="nav-text">About</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('about*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="about" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('about/add/list') ? 'active' : '' }}"
                                            href="{{ route('about.list') }}">
                                            <span class="nav-text">All about</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('about/add') ? 'active' : '' }}"
                                            href="{{ route('about.add') }}">
                                            <span class="nav-text">Add about</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Poster -->
                        <li class="has-sub {{ Request::is('poster*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-dots-vertical-circle"></i>
                                <span class="nav-text">Poster</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('poster*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="about" data-parent="#sidebar-menu">
                                    {{-- <li class="">
                                        <a class="sidenav-item-link {{ Request::is('about/add/list') ? 'active' : '' }}"
                                            href="{{ route('about.list') }}">
                                            <span class="nav-text">All about</span>
                                        </a>
                                    </li> --}}
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('poster') ? 'active' : '' }}"
                                            href="{{ route('poster') }}">
                                            <span class="nav-text">Add poster</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Brands -->
                        <li class="has-sub {{ Request::is('brand') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('brand.name') }}">
                                <i class="mdi mdi-tag-outline"></i>
                                <span class="nav-text">Brands</span>
                            </a>
                        </li>
                        <!-- Brands -->
                        <li class="has-sub {{ Request::is('banner*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('banner') }}">
                                <i class="mdi mdi-clipboard-text"></i>
                                <span class="nav-text">Banner</span>
                            </a>
                        </li>
                        <!-- Message -->
                        <li class="has-sub {{ Request::is('message*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('message') }}">
                                <i class="mdi mdi-message"></i>
                                <span class="nav-text">Message</span>
                            </a>
                        </li>
                        <!-- Service -->
                        <li class="has-sub {{ Request::is('service*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('service') }}">
                                <i class="mdi mdi-settings-box"></i>
                                <span class="nav-text">Service</span>
                            </a>
                        </li>
                        <!-- Role -->
                        {{-- <li class="has-sub {{ Request::is('role*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('role') }}">
                                <i class="mdi mdi-account-settings"></i>
                                <span class="nav-text">Role</span>
                            </a>
                        </li> --}}
                        <!-- Team -->
                        <!-- Team -->
                        <li class="has-sub {{ Request::is('team*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="nav-text">Team</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('team*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="team" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('team/list') ? 'active' : '' }}"
                                            href="{{ route('team.list') }}">
                                            <span class="nav-text">All team</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('team') ? 'active' : '' }}"
                                            href="{{ route('team') }}">
                                            <span class="nav-text">Add team</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Feature -->
                        <li class="has-sub {{ Request::is('feature*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-apps"></i>
                                <span class="nav-text">Feature</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('feature*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="feature" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('feature/list') ? 'active' : '' }}"
                                            href="{{ route('feature.list') }}">
                                            <span class="nav-text">All feature</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('feature') ? 'active' : '' }}"
                                            href="{{ route('feature') }}">
                                            <span class="nav-text">Add feature</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('feature/footer/feature') ? 'active' : '' }}"
                                            href="{{ route('footer.feature') }}">
                                            <span class="nav-text">Footer feature</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Invoice -->
                        {{-- <li class="has-sub {{Request::is('faq/store*') ? 'active' : ''}}">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-receipt"></i>
								<span class="nav-text">Faqs</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
									<li class="">
										<a href="invoice.html">
											<span class="nav-text">Invoice list</span>
										</a>
									</li>
									<li class="">
										<a href="invoice-details.html">
											<span class="nav-text">Invoice details</span>
										</a>
									</li>
								</ul>
							</div>
						</li> --}}

                        <!-- Reviews -->
                        <li class="has-sub {{ Request::is('review*') ? 'active' : '' }}">
							<a class="sidenav-item-link" href="{{route('review')}}">
								<i class="mdi mdi-star-circle-outline"></i>
								<span class="nav-text">Reviews</span>
							</a>
						</li>


                        <!-- Blog -->
                        <li class="has-sub {{ Request::is('blog*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-blogger"></i>
                                <span class="nav-text">Blog</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('blog*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a href="{{ route('blog.tag') }}" class="{{ Request::is('blog/tag') ? 'active' : '' }}">
                                            <span class="nav-text">Blog tag</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('blog.list') }}" class="{{ Request::is('blog/list') ? 'active' : '' }}">
                                            <span class="nav-text">All blog</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('blog.add') }}" class="{{ Request::is('blog/add') ? 'active' : '' }}">
                                            <span class="nav-text">Add blog</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('blog.comment') }}" class="{{ Request::is('blog/comment') ? 'active' : '' }}">
                                            <span class="nav-text">All comment</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Offer -->
                        <li class="has-sub {{ Request::is('offer*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('offer') }}">
                                <i class="mdi mdi-percent"></i>
                                <span class="nav-text">Offer</span>
                            </a>
                            {{-- <div class="collapse">
                                <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a href="{{ route('offer') }}">
                                            <span class="nav-text">offer</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </li>
                        
                        <!-- Transactions -->
                        <li class="has-sub {{ Request::is('payment*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('payment') }}">
                                <i class="mdi mdi-finance"></i>
                                <span class="nav-text">Transactions</span><b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('payment*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                    <li class="{{ Request::is('payment') ? 'active' : '' }}" >
                                        <a href="{{ route('payment') }}">
                                            <span class="nav-text">Payment details</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('payment/transaction/list') ? 'active' : '' }}" >
                                        <a href="{{ route('transaction.list') }}">
                                            <span class="nav-text">All transaction</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('payment/transaction/charge') ? 'active' : '' }}" >
                                        <a href="{{ route('transaction.charge') }}">
                                            <span class="nav-text">Charge ammount</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="has-sub {{ Request::is('blog*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-blogger"></i>
                                <span class="nav-text">Blog</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('blog*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a href="{{ route('blog.tag') }}" class="{{ Request::is('blog/tag') ? 'active' : '' }}">
                                            <span class="nav-text">Blog tag</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

						<!-- Deal -->
                        <li class="has-sub {{ Request::is('deal*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('deal') }}">
                                <i class="mdi mdi-walk"></i>
                                <span class="nav-text">Deal</span>
                            </a>
                            {{-- <div class="collapse">
                                <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                    <li class="">
                                        <a href="{{ route('deal') }}">
                                            <span class="nav-text">Deal</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </li>
                        <!-- Setting -->

                        <li class="has-sub {{ Request::is('setting*') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)">
                                <i class="mdi mdi-cogs"></i>
                                <span class="nav-text">Setting</span> <b class="caret"></b>
                            </a>
                            <div class="collapse {{ Request::is('setting*') ? 'show' : '' }}">
                                <ul class="sub-menu" id="setting" data-parent="#sidebar-menu">
                                    {{-- <li class="">
										<a class="sidenav-item-link {{Request::is('setting/list') ? 'active' : ''}}" href="{{route('feature.list')}}">
											<span class="nav-text">All feature</span>
										</a>
									</li> --}}
                                    <li class="">
                                        <a class="sidenav-item-link {{ Request::is('setting') ? 'active' : '' }}" href="{{ route('setting') }}" > 
                                            <span class="nav-text">Add setting</span>
                                        </a>
                                    </li>
									<li class="">
                                        <a class="sidenav-item-link {{ Request::is('setting/favicon') ? 'active' : '' }}" href="{{ route('favicon') }}">
                                            <span class="nav-text">Favicon</span>
                                        </a>
                                    </li>
									<li class="">
                                        <a class="sidenav-item-link {{ Request::is('setting/webdetails') ? 'active' : '' }}" href="{{ route('webdetails') }}">
                                            <span class="nav-text">Website details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Authentication -->
                        <li class="has-sub {{ Request::is('register/user') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('user.register') }}">
                                <i class="mdi mdi-login-variant"></i>
                                <span class="nav-text">Register</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">

            <!-- Header -->
            <header class="ec-main-header" id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler">
                        <img src="assets/img/icons/clops.png" alt="">
                    </button>
                    <!-- search form -->
                    <div class="search-form d-lg-inline-block">
                        <div class="input-group">
                            <input type="text" name="query" id="search-input" class="form-control"
                                placeholder="search.." autofocus autocomplete="off" />
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>

                    <!-- navbar right -->
                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @if (Auth::user()->image == null)
                                        <img width="50"
                                            src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"
                                            alt="">
                                    @else
                                        <img src="{{ asset('uploads/users') }}/{{ Auth::user()->image }}"
                                            class="user-image" alt="User Image" />
                                    @endif
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                                    <!-- User image -->
                                    <li class="dropdown-header">
                                        <div class="d-inline-block">
                                            <h5>{{ Auth::user()->name }}</h5>
                                            <p class="pt-2">{{ Auth::user()->email }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile') }}">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-logout"></i> Log Out </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown notifications-menu custom-dropdown">
                                <ul class="dropdown-menu dropdown-menu-right d-none">
                                    <li class="dropdown-header">You have 5 notifications</li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-plus"></i> New user registered
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-remove"></i> User deleted
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 07 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 12 PM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-supervisor"></i> New client
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-server-network-off"></i> Server overloaded
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 05 AM</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a class="text-center" href="#"> View All </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- CONTENT WRAPPER -->
            <div class="ec-content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->
                    @yield('content')

                </div> <!-- End Content -->
            </div> <!-- End Content Wrapper -->

            <!-- Footer -->
            {{-- <footer class="footer mt-auto">
				<div class="copyright bg-white">
					<p>
						Copyright © 2023. All right reserved.
					</p>
				</div>
			</footer> --}}

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->

    <!-- Common Javascript -->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-zoom/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/slick/slick.min.js') }}"></script>

    <!-- Chart -->
    <script src="{{ asset('backend/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chart.js') }}"></script>

    <!-- Google map chart -->
    <script src="{{ asset('backend/assets/plugins/charts/google-map-loader.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/charts/google-map.js') }}"></script>

    <!-- Date Range Picker -->
    <script src="{{ asset('backend/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/assets/js/date-range.js') }}"></script>

    {{-- Sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Data Tables -->
    <script src='{{ asset('backend/assets/plugins/data-tables/jquery.datatables.min.js') }}'></script>
    <script src='{{ asset('backend/assets/plugins/data-tables/datatables.bootstrap5.min.js') }}'></script>
    <script src='{{ asset('backend/assets/plugins/data-tables/datatables.responsive.min.js') }}'></script>
    <script src="{{ asset('backend/assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- custom js -->
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

    @yield('footer_script')
    @if (session('success'))
        {
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
            })
        </script>
        }
    @endif
    @if (session('error'))
        {
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
            })
        </script>
        }
    @endif

    
</body>

</html>
