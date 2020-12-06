/*=========================================================================================
    File Name: app-ecommerce-shop.js
    Description: Ecommerce Shop
    ----------------------------------------------------------------------------------------
    Item name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(document).ready(function () {
  "use strict";

  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

  // RTL Support
  var direction = 'ltr';
  if ($('html').data('textdirection') == 'rtl') {
    direction = 'rtl';
  }

  var sidebarShop = $(".sidebar-shop"),
    shopOverlay = $(".shop-content-overlay"),
    sidebarToggler = $(".shop-sidebar-toggler"),
    priceFilter = $(".price-options"),
    gridViewBtn = $(".grid-view-btn"),
    listViewBtn = $(".list-view-btn"),
    ecommerceProducts = $("#ecommerce-products"),
    cart = $(".cart"),
    wishlist = $(".wishlist");


  // show sidebar
  sidebarToggler.on("click", function () {
    sidebarShop.toggleClass("show");
    shopOverlay.toggleClass("show");
  });

  // remove sidebar
  $(".shop-content-overlay, .sidebar-close-icon").on("click", function () {
    sidebarShop.removeClass("show");
    shopOverlay.removeClass("show");
  })

  //price slider
  var slider = document.getElementById("price-slider");
  if (slider) {
    noUiSlider.create(slider, {
      start: [51, 5000],
      direction: direction,
      connect: true,
      tooltips: [true, true],
      format: wNumb({
        decimals: 0,
      }),
      range: {
        "min": 51,
        "max": 5000
      }
    });
  }
  // for select in ecommerce header
  if (priceFilter.length > 0) {
    priceFilter.select2({
      minimumResultsForSearch: -1,
      dropdownAutoWidth: true,
      width: 'auto'
    });
  }

  /***** CHANGE VIEW *****/
  // Grid View
  gridViewBtn.on("click", function () {
    ecommerceProducts.removeClass("list-view").addClass("grid-view");
    listViewBtn.removeClass("active");
    gridViewBtn.addClass("active");
  });

  // List View
  listViewBtn.on("click", function () {
    ecommerceProducts.removeClass("grid-view").addClass("list-view");
    gridViewBtn.removeClass("active");
    listViewBtn.addClass("active");
  });

  // For View in cart
  $('#ecommerce-products').on('click', '.cart', function() {
    var $this = $(this),
      addToCart = $this.find(".add-to-cart"),
      viewInCart = $this.find(".view-in-cart");
      let product_id = $this.attr('prod-id');
    if (addToCart.is(':visible')) {
      sendItemToCart(product_id)
      .then(() => {
        addToCart.addClass("d-none");
        viewInCart.addClass("d-inline-block");
      }).catch(() => {
        toastr.warning('Error', "Failed adding item to the cart.", { "positionClass": "toast-bottom-right" });
      });
      
    }
    else {
      var href = viewInCart.attr('href');
      window.location.href = href;
    }
  });

  $(".view-in-cart").on('click', function (e) {
    e.preventDefault();
  });

  // For Wishlist Icon
  wishlist.on("click", function () {
    var $this = $(this)
    $this.find("i").toggleClass("fa-heart-o fa-heart")
    $this.toggleClass("added");
  })

  // Checkout Wizard
  var checkoutWizard = $(".checkout-tab-steps"),
    checkoutValidation = checkoutWizard.show();
  if (checkoutWizard.length > 0) {
    $(checkoutWizard).steps({
      headerTag: "h6",
      bodyTag: "fieldset",
      transitionEffect: "fade",
      titleTemplate: '<span class="step">#index#</span> #title#',
      enablePagination: false,
      onStepChanging: function (event, currentIndex, newIndex) {
        // allows to go back to previous step if form is
        if (currentIndex > newIndex) {
          return true;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex) {
          // To remove error styles
          checkoutValidation.find(".body:eq(" + newIndex + ") label.error").remove();
          checkoutValidation.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        // check for valid details and show notification accordingly
        if (currentIndex === 1 && Number($(".form-control.required").val().length) < 1) {
          toastr.warning('Error', 'Please Enter Valid Details', { "positionClass": "toast-bottom-right" });
        }
        checkoutValidation.validate().settings.ignore = ":disabled,:hidden";
        return checkoutValidation.valid();
      },
    });
    // to move to next step on place order and save address click
    $(".place-order, .delivery-address").on("click", function () {
      $(".checkout-tab-steps").steps("next", {});
    });
    // check if user has entered valid cvv
    $("#btn-cvv").on("click", function () {
      $("#btn-cvv").prop("disabled", true);
      let fullname = $('#checkout-name').val();
      toastr.success(`Thanks ${fullname} ! Payment received Successfully.`, { "positionClass": "toast-top-right" });
      setTimeout(() => {
        window.location.href = "/";
      }, 4000);
    });
  }

  // checkout quantity counter
  var quantityCounter = $(".quantity-counter"),
    CounterMin = 1,
    CounterMax = 10;
  if (quantityCounter.length > 0) {
    quantityCounter.TouchSpin({
      min: CounterMin,
    }).on('touchspin.on.startdownspin', function (e) {
      quantityUpdate.call(this);
      var $this = $(this);
      $('.bootstrap-touchspin-up').removeClass("disabled-max-min");
      if ($this.val() == 1) {
        $(this).siblings().find('.bootstrap-touchspin-down').addClass("disabled-max-min");
      }
    }).on('touchspin.on.startupspin', function (e) {
      quantityUpdate.call(this);
      var $this = $(this);
      $('.bootstrap-touchspin-down').removeClass("disabled-max-min");
      if ($this.val() == 10) {
        $(this).siblings().find('.bootstrap-touchspin-up').addClass("disabled-max-min");
      }
    });
  }

  quantityCounter.on('blur', function () {
    quantityUpdate.call(this);
  })

  // remove items from wishlist page
  $(".remove-wishlist , .move-cart").on("click", function () {
    let product_id = $(this).closest(".ecommerce-card").find('input.product_id').val();
    $(this).closest(".ecommerce-card").remove();
    let that = this;

    $.post("/removeItemFromCart", {product_id}, function(data, status) {
      // err
      if (data.statut == 'err') {
        toastr.error("Oops! Failed while removing product.", 'Erreur!');
      }
      // success
      if (data.statut == 'success') {
        $(that).closest(".ecommerce-card").remove();
        if (!$('.remove-wishlist').length) window.location.href = "/"; // panier vide
        calculTotal();
      }
    });
  })

  // filter per categorie
  $('input[type=radio][name="category-filter"]').change(function() {
    refreshCardItem();
  });
  
  $('#ecommerce-price-options').change(function() {
    refreshCardItem();
  });

  //setup before functions
  let typingTimer;                //timer identifier
  let doneTypingInterval = 3000;  //time in ms, 5 second for example
  let $searchInput = $('#searchInput');

  $searchInput.on("input", function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(refreshCardItem, doneTypingInterval);
  });
  
  $searchInput.on("keydown", function () {
    clearTimeout(typingTimer);
  });

})
// on window resize hide sidebar
$(window).on("resize", function () {
  if ($(window).outerWidth() >= 991) {
    $(".sidebar-shop").removeClass("show");
    $(".shop-content-overlay").removeClass("show");
  }
});

function refreshCardItem() {
  let categorie_id = $('input[type=radio][name="category-filter"]:checked').val();
  let priceOptions = $('#ecommerce-price-options').val();
  let searchStr = $('#searchInput').val();


    $.post("/ecommerce-products", {categorie_id, priceOptions, searchStr}, function(data, status) {
      // err
      if (data.statut == 'err') {
        toastr.error(data.msg, 'Erreur!');
      }
      // success
      if (data.statut == 'success') {
        updateCardItem(data.products);
      }
    });
}

function updateCardItem(data) {
  $('#ecommerce-products').empty();
  for (let id = 0; id < data.length; id++) {
    const item = data[id];
    createCardItem(item);
  }
}

function createCardItem(item) {
  let html = `
    <div class="card ecommerce-card">
      <div class="card-content">
        <div class="item-img text-center">
          <img class="img-fluid" src="${item.image}" alt="img-placeholder">
        </div>
        <div class="card-body">
          <div class="item-wrapper">
            <div class="item-rating">
            </div>
          <div>
            <h6 class="item-price">
            ${item.price.toLocaleString()} ${item.currency}
            </h6>
          </div>
        </div>
        <div class="item-name">
          <span> ${item.name} </span>
          <p class="item-company">By <span class="company-name">Google</span></p>
        </div>
        <div>
          <p class="item-description">   
          </p>
        </div>
      </div>
      <div class="item-options text-center">
        <div class="item-wrapper">
          <div class="item-rating">
            <div class="badge badge-primary badge-md">
              <span>4</span> <i class="feather icon-star"></i>
            </div>
          </div>
        <div class="item-cost">
          <h6 class="item-price">
          ${item.price} ${item.currency}
          </h6>
        </div>
      </div>
      <div class="cart">
        <i class="feather icon-shopping-cart"></i> <span class="add-to-cart ${ item.isInCart ? 'd-none' : '' }">Add to cart</span> <a
          href="app-ecommerce-checkout" class="view-in-cart ${ item.isInCart ? '' : 'd-none' }">View In Cart</a>
      </div>
    </div>
  </div></div>`;
  $('#ecommerce-products').append(html);
}

function sendItemToCart(product_id) {
  // add product to cart session
  return new Promise((res, rej) => {
    $.post("/addToCart", {product_id}, function(data, status) {
      data.statut == 'success' ? res() : rej();
    });

  }); 
}

function calculTotal() {
  let total = 0;
  $('.ecommerce-card').each(function(i, obj) {
    let qte = $(this).find('input.quantity-counter').val();
    let pu = $(this).find('input.pu-item').val();
    total += qte * pu;
  });
  let taxes = total * 0.18;
  let totalTtc = total + taxes;
  $('.pnet').text(total.toLocaleString());
  $('.ptaxes').text(taxes.toLocaleString());
  $('.pttc').text(totalTtc.toLocaleString());

  return {total, taxes, totalTtc};
}

function quantityUpdate() {
  let qte = parseInt($(this).closest('.item-quantity').find('input.quantity-counter:first').val());
  let pu = parseInt($(this).closest('.item-quantity').find('input.pu-item:first').val());
  if (!isNaN(qte)) {
    let prix = qte * pu;
    $(this).closest('.card-content').find('.item-price:first').text(`${prix.toLocaleString()} XOF`);
  }
  calculTotal();
}