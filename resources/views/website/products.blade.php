@extends('layouts.website')
@section('content')

			<div id="custom-header">
			  <div class="custom-header-content">
			    <div class="container">
			      <h1 class="page-title">المنتجات</h1>
			      <div id="breadcrumb">
			        <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
			          <ul class="trail-items">
			            <li class="trail-item trail-begin"><a href="" rel="home"><span>Home</span></a></li>
			            <li class="trail-item trail-end"><span>المنتجات</span></li>
			          </ul>
			        </div> <!-- .breadcrumbs -->
			      </div> <!-- #breadcrumb -->
			    </div> <!-- .container -->
			  </div>  <!-- .custom-header-content -->
			</div> <!-- .	 -->
            <div id="content" class="site-content default-full-width">
              <div class="container">
                <div class="inner-wrapper">
                  <div id="primary" class="content-area">
                    <main id="main" class="site-main">
						<div class="section-products">
							<div class="inner-wrapper">
								<div class="products-inner-wrapper clear-fix">
									@foreach($products as $product)
									<div class="product-item col-grid-3 top-space">
										<div class="product-item-wrapper zoom-effect-hover-container box-shadow-block">
											<div class="product-thumb zoom-effect">
												<a class="thumbnail" href="/category/{{$product->category_id}}/subcategory/{{$product->sub_category_id}}/products/{{$product->id}}">
													@foreach($product->images as $img)
															<img alt="product" class="category-image" src="/images/{{$img['image']}}">
													@endforeach
												</a>
												<div class="pruduct-buttons">
													<a href="#" class="product-button tooltip"><i class="fas fa-cart-plus"></i>
													<span class="tooltiptext tooltip-right">Add To Cart</span></a>
													<a href="#" class="product-button tooltip"><i class="far fa-heart"></i><span class="tooltiptext tooltip-right">Wishlist</span></a>
												</div><!-- .product-buttons -->
											</div><!-- .product-thumb -->
											<div class="product-item-details">
												<h3 class="product-title"><a href="/category/{{$product->category_id}}/subcategory/{{$product->sub_category_id}}/products/{{$product->id}}" title="title">{{$product->name_ar}}</a></h3>
												<div class="product-price-container">
													@if($product->isdiscount == 1)
														<del class="dis-price">{{$product->price}}</del>
														<span class="fix-price">{{$product->new_price}}</span>
													@else
														<span class="fix-price">{{$product->price}}</span>
													@endif

												</div><!-- .product-price-container -->
											</div>
										</div><!-- .product-item-wrapper -->
									</div><!-- .product-item -->
								 @endforeach
								</div><!-- .products-inner-wrapper -->
							</div><!-- .inner-wrapper -->
							<div class="text-aligncenter top-space"> {{ $products->links() }} </div>>
						</div><!-- .section-products -->
                  </div> <!-- #primary -->
                </div> <!-- #inner-wrapper -->
              </div><!-- .container -->
            </div> <!-- #content-->
@endsection