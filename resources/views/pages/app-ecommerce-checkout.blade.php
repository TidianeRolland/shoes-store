@extends('layouts/contentLayoutMaster')

@section('title', 'Checkout')

@section('vendor-style')
<!-- Vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">
@endsection

@section('page-style')
<!-- Page css files -->
<link rel="stylesheet" href="{{ asset(mix('css/pages/app-ecommerce-shop.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/wizard.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/toastr.css')) }}">
@endsection
@section('content')
<form action="#" onSubmit="return false;" class="icons-tab-steps checkout-tab-steps wizard-circle">
  <!-- Checkout Place order starts -->
  <h6><i class="step-icon step feather icon-shopping-cart"></i>Cart</h6>
  <fieldset class="checkout-step-1 px-0">
    <section id="place-order" class="list-view product-checkout">
      <div class="checkout-items">

        @if(Session::has('cart'))
            @php
            $panier = Session::get('cart');
            $total = 0;
            foreach($panier as $p) {
            $total += $p->qte * $p->price;
            }
            $taxe = $total * 0.18;
            @endphp
            @foreach(Session::get('cart') as $key => $item)
        <div class="card ecommerce-card">
          <div class="card-content">
            <!-- <a href="app-ecommerce-details"> -->
              <div class="item-img text-center">
                <img src="{{ $item->image }}" width="200" alt="img-placeholder">
              </div>
              <div class="card-body">
                <div class="item-name">
                  <span> {{ $item->name }} </span>
                  <p class="item-company"></p>
                  <p class="stock-status-in">In Stock</p>
                </div>
                <div class="item-quantity">
                  <p class="quantity-title">Quantity</p>
                  <div class="input-group quantity-counter-wrapper">
                    <input type="text" class="quantity-counter" value="{{ $item->qte }}">
                    <input type="hidden" class="product_id" value="{{ $item->id }}">
                  </div>
                  <input type="hidden" class="pu-item" value="{{ $item->price }}">
                </div>
                <p class="delivery-date"></p>
                <p class="offers"></p>
            <!-- </a> -->
          </div>
          <div class="item-options text-center">
            <div class="item-wrapper">
              <div class="item-rating">
                
              </div>
              <div class="item-cost">
                <h6 class="item-price">
                {{ number_format($item->price,0,","," ") }} {{ $item->currency }} 
                </h6>
              </div>
            </div>
            <div class="wishlist remove-wishlist">
              <i class="feather icon-x align-middle"></i> Remove
            </div>
          </div>
        </div>
      </div>
    @endforeach
    @endif

      </div>
      <div class="checkout-options">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="price-details">
                <p>Details</p>
              </div>
              <div class="detail">
                <div class="detail-title">
                  Total Net
                </div>
                <div class="detail-amt pnet">
                  {{ number_format($total,0,","," ") }}
                </div>
              </div>
              <div class="detail">
                <div class="detail-title">
                  Tax
                </div>
                <div class="detail-amt ptaxes">
                  {{ number_format($taxe,0,","," ") }}
                </div>
              </div>
              <div class="detail">
                <div class="detail-title">
                  Delivery Charges
                </div>
                <div class="detail-amt discount-amt">
                  Free
                </div>
              </div>
              <hr>
              <div class="detail">
                <div class="detail-title detail-total">Total TTC</div>
                <div class="detail-amt total-amt pttc"> {{ number_format($total + $taxe,0,","," ") }} </div>
              </div>
              <div class="btn btn-primary btn-block place-order">PLACE ORDER</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </fieldset>
  <!-- Checkout Place order Ends -->

  <!-- Checkout Customer Address Starts -->
  <h6><i class="step-icon step feather icon-home"></i>Address</h6>
  <fieldset class="checkout-step-2 px-0">
    <section id="checkout-address" class="list-view product-checkout">
      <div class="card">
        <div class="card-header flex-column align-items-start">
          <h4 class="card-title">Add New Address</h4>
          <p class="text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="checkout-name">Full Name:</label>
                  <input type="text" id="checkout-name" class="form-control required" name="fname">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="checkout-number">Mobile Number:</label>
                  <input type="number" id="checkout-number" class="form-control required" name="mnumber">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="checkout-apt-number">Flat, House No:</label>
                  <input type="number" id="checkout-apt-number" class="form-control required" name="apt-number">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="checkout-landmark">Landmark e.g. near apollo hospital:</label>
                  <input type="text" id="checkout-landmark" class="form-control required" name="landmark">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="checkout-city">Town/City:</label>
                  <input type="text" id="checkout-city" class="form-control required" name="city">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="checkout-pincode">Pincode:</label>
                  <input type="number" id="checkout-pincode" class="form-control required" name="pincode">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="checkout-state">State:</label>
                  <input type="text" id="checkout-state" class="form-control required" name="state">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="add-type">Address Type:</label>
                  <select class="form-control" id="add-type">
                    <option>Home</option>
                    <option>Work</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6 offset-md-6">
                <div class="btn btn-primary delivery-address float-right">
                  SAVE AND DELIVER HERE
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </section>
  </fieldset>

  <!-- Checkout Customer Address Ends -->

  <!-- Checkout Payment Starts -->
  <h6><i class="step-icon step feather icon-credit-card"></i>Payment</h6>
  <fieldset class="checkout-step-3 px-0">
    <section id="checkout-payment" class="list-view product-checkout">
      <div class="payment-type">
        <div class="card">
          <div class="card-header flex-column align-items-start">
            <h4 class="card-title">Payment options</h4>
            <p class="text-muted mt-25">Be sure to click on correct payment option</p>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="d-flex justify-content-between flex-wrap">
                
                <div class="vs-radio-con vs-radio-primary">
                  <input type="radio" name="vueradio" checked="" value="false">
                  <span class="vs-radio">
                    <span class="vs-radio--border"></span>
                    <span class="vs-radio--circle"></span>
                  </span>
                  <span>Debit Card XXXX XXXX XXXX XXXX
                  </span>
                </div>
              </div>
              <div class="customer-cvv mt-1">
              </div>
              <ul class="other-payment-options list-unstyled">
                <li>
                  <div class="vs-radio-con vs-radio-primary py-25">
                    <input type="radio" name="vueradio" value="false">
                    <span class="vs-radio">
                      <span class="vs-radio--border"></span>
                      <span class="vs-radio--circle"></span>
                    </span>
                    <span>
                      Orange Money
                    </span>
                  </div>
                </li>
                <li>
                  <div class="vs-radio-con vs-radio-primary py-25">
                    <input type="radio" name="vueradio" value="false">
                    <span class="vs-radio">
                      <span class="vs-radio--border"></span>
                      <span class="vs-radio--circle"></span>
                    </span>
                    <span>
                      MTN Money
                    </span>
                  </div>
                </li>
                
                <li>
                  <div class="vs-radio-con vs-radio-primary py-25">
                    <input type="radio" name="vueradio" value="false">
                    <span class="vs-radio">
                      <span class="vs-radio--border"></span>
                      <span class="vs-radio--circle"></span>
                    </span>
                    <span>
                      Cash On Delivery
                    </span>
                  </div>
                </li>
              </ul>
              <hr>
              <button id="btn-cvv" class="btn btn-primary ml-50 mb-50">Continue</button>
              
            </div>
          </div>
        </div>
      </div>
      <div class="checkout-options">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="price-details">
                <p>Details</p>
              </div>
              <div class="detail">
                <div class="detail-title">
                  Total Net
                </div>
                <div class="detail-amt pnet">
                  {{ number_format($total,0,","," ") }}
                </div>
              </div>
              <div class="detail">
                <div class="detail-title">
                  Tax
                </div>
                <div class="detail-amt ptaxes">
                  {{ number_format($taxe,0,","," ") }}
                </div>
              </div>
              <div class="detail">
                <div class="detail-title">
                  Delivery Charges
                </div>
                <div class="detail-amt discount-amt">
                  Free
                </div>
              </div>
              <hr>
              <div class="detail">
                <div class="detail-title detail-total">Total TTC</div>
                <div class="detail-amt total-amt pttc"> {{ number_format($total + $taxe,0,","," ") }} </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </fieldset>

  <!-- Checkout Payment Starts -->
</form>
@endsection

@section('vendor-script')
<!-- Vendor js files -->
<script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/jquery.steps.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection

@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/pages/app-ecommerce-shop.js')) }}"></script>
@endsection