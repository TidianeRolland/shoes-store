@section('content-sidebar')
<!-- Ecommerce Sidebar Starts -->
<div class="sidebar-shop" id="ecommerce-sidebar-toggler">
  <div class="row">
    <div class="col-sm-12">
      <h6 class="filter-heading d-none d-lg-block">Filters</h6>
    </div>
  </div>
  <span class="sidebar-close-icon d-block d-md-none">
    <i class="feather icon-x"></i>
  </span>
  <div class="card">
    <div class="card-body">
      <!-- Categories Starts -->
      <div id="product-categories">
        <div class="product-category-title">
          <h6 class="filter-title mb-1">Categories</h6>
        </div>
        <ul class="list-unstyled categories-list">
          @foreach($categories as $categ)
          <li>
            <span class="vs-radio-con vs-radio-primary py-25">
              <input type="radio" name="category-filter" value="{{ $categ->id }}" {{ $categ->id == 1 ? 'checked' : '' }}>
              <span class="vs-radio">
                <span class="vs-radio--border"></span>
                <span class="vs-radio--circle"></span>
              </span>
              <span class="ml-50"> {{ $categ->name }} </span>
            </span>
          </li>
          @endforeach
         
        </ul>
      </div>
      <!-- Categories Ends -->
    </div>
  </div>
</div>
<!-- Ecommerce Sidebar Ends -->
  
@endsection
