
{{-- {!! Helper::applClasses() !!} --}}
@php
$configData = Helper::applClasses();
@endphp

@extends((( $configData["mainLayoutType"] === 'horizontal') ? 'layouts/horizontalDetachedLayoutMaster' : 'layouts/detachedLayoutMaster' ))

@section('title', 'Shop')

@section('vendor-style')
        <!-- Vendor css files -->
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">
@endsection
@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/noui-slider.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/toastr.css')) }}">
        <link rel="stylesheet" href="{{ asset(mix('css/pages/app-ecommerce-shop.css')) }}">
@endsection
@include('pages/app-ecommerce-sidebar')
@section('content')
<!-- Ecommerce Content Section Starts -->
<div>
  <h1>Gebeya shoes collection</h1>
</div>
<section id="ecommerce-header">
  <div class="row">
    <div class="col-sm-12">
      <div class="ecommerce-header-items">
        <div class="result-toggler">
          <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon d-block d-lg-none"><i class="feather icon-menu"></i></span>
          </button>
          <div class="search-results">
            
          </div>
        </div>
        <div class="view-options">
          <select class="price-options form-control" id="ecommerce-price-options">
            <option value="desc">Highest</option>
            <option value="asc">Lowest</option>
          </select>
          <div class="view-btn-option">
            <button class="btn btn-white view-btn grid-view-btn active">
              <i class="feather icon-grid"></i>
            </button>
            <button class="btn btn-white list-view-btn view-btn">
              <i class="feather icon-list"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Ecommerce Content Section Starts -->
<!-- background Overlay when sidebar is shown  starts-->
<div class="shop-content-overlay"></div>
<!-- background Overlay when sidebar is shown  ends-->

<!-- Ecommerce Search Bar Starts -->
<section id="ecommerce-searchbar">
  <div class="row mt-1">
    <div class="col-sm-12">
      <fieldset class="form-group position-relative">
        <input type="text" class="form-control search-product" id="searchInput" placeholder="Search here">
        <div class="form-control-position">
          <i class="feather icon-search"></i>
        </div>
      </fieldset>
    </div>
  </div>
</section>
<!-- Ecommerce Search Bar Ends -->

<!-- Ecommerce Products Starts -->
<section id="ecommerce-products" class="grid-view">
  @php
    $panier = Session::get('cart'); 
  @endphp
  @foreach($products as $prod)
    <div class="card ecommerce-card">
      <div class="card-content">
        <!-- <a href="app-ecommerce-details"> -->
          <div class="item-img text-center">
            <img class="img-fluid" src="{{ $prod->image }}" alt="img-placeholder">
          </div>
          <div class="card-body">
            <div class="item-wrapper">
              
              <div>
                <h6 class="item-price">
                {{ number_format($prod->price,0,","," ") }} {{ $prod->currency }}
                </h6>
              </div>
            </div>
            <div class="item-name">
              <span>{{ $prod->name }}</span>
            </div>
            <div>
              <p class="item-description">
               
              </p>
            </div>
          </div>
        <!-- </a> -->
        <div class="item-options text-center">
          <div class="item-wrapper">
          </div>
          
          <div class="cart" prod-id="{{ $prod->id }}">
            <i class="feather icon-shopping-cart"></i> <span class="add-to-cart {{ $prod->isInCart ? 'd-none' : '' }}">Add to cart</span> <a
              href="app-ecommerce-checkout" class="view-in-cart {{ $prod->isInCart ? '' : 'd-none' }}">View In Cart</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</section>
<!-- Ecommerce Products Ends -->


  @endsection

@section('vendor-script')
        <!-- Vendor js files -->
        <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/wNumb.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
        <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
        <!-- Page js files -->
        <script src="{{ asset(mix('js/scripts/pages/app-ecommerce-shop.js')) }}"></script>
@endsection
