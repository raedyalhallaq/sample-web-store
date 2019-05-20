@extends('layouts.website')
@section('content')
			<div id="custom-header">
			  <div class="custom-header-content">
			    <div class="container">
			      <h1 class="page-title">السلة</h1>
			      <div id="breadcrumb">
			        <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
			          <ul class="trail-items">
			            <li class="trail-item trail-begin"><a href="" rel="home"><span>Home</span></a></li>
			            <li class="trail-item trail-end"><span>Cart</span></li>
			          </ul>
			        </div> <!-- .breadcrumbs -->
			      </div> <!-- #breadcrumb -->
			    </div> <!-- .container -->
			  </div>  <!-- .custom-header-content -->
			</div> <!-- .custom-header -->
            <div id="content" class="site-content default-full-width">
              <div class="container">
                <div class="inner-wrapper">
                  <div id="primary" class="content-area">
                    <main id="main" class="site-main">
						<div class="section-cart">
						    <form class="product-cart-form">
						        <table class="cart shop-table shop-table-responsive">
						            <thead>
						                <tr>
											<th class="product-remove  text-aligncenter"></th>
											<th class="product-subtotal text-aligncenter">المجموع</th>
											<th class="product-quantity  text-aligncenter">الكمية</th>
											<th class="product-price  text-aligncenter">السعر</th>
						                    <th class="product-name  text-aligncenter">تفاصيل المنتج</th>
						                </tr>
						            </thead>
						            <tbody>
									@foreach($carts as $cart)
						                <tr class="cart-item">
										<td class="product-remove  text-aligncenter" data-title="Remove">
						                        <a href="#" class="remove" title="Remove this item">
						                            <i class="fa fa-times" aria-hidden="true"></i>
						                        </a>
											</td>
											<td class="product-subtotal text-aligncenter" data-title="Total">
						                        <span class="product-Price-amount amount ">
												@if($cart->product['isdiscount'] == 1)
													{{$cart->product['new_price'] * $cart->quantity}}
												@else
													{{$cart->product['price'] * $cart->quantity }}
												@endif	
						                       </span>
											</td>
											<td class="product-quantity text-aligncenter" data-title="Quantity">
						                        <div class="quantity">
						                            <input type="number" class="input-text" disabled step="1" min="1" value="{{$cart->quantity}}">
						                        </div>
											</td>
											<td class="product-price  text-aligncenter" data-title="Price">
						                       <span class="product-Price-amount amount">
												@if($cart->product['isdiscount'] == 1)
													{{$cart->product['new_price']}}
												@else
													{{$cart->product['price']}}
												@endif	   
						                       </span>
						                    </td>
						                    <td class="product-name " data-title="Product">
						                        <a href="#" class="cart-product-thumb">
													@foreach($cart->product['images'] as $images)
														<img src="images/{{$images->image}}" alt="Product Thumbnail">
													@endforeach
						                        </a>
						                        <div class="product-info">
						                            <h3>{{$cart->product['name_ar']}}</h3>
						                            <ul>
						                                <li> التصنيف : {{$cart->product['category']['name']}}  </li>
						                            </ul>
						                        </div>
						                    </td>
										</tr>
										@endforeach
						            </tbody>
						        </table>
						    </form> <!-- .product-cart-form -->
						    <div class="cart-collaterals">
						       <div class="cart-totals calculated-shipping">
						            <h2>Cart Totals</h2>
						            <!-- <table class="shop-table shop-table-responsive">
						                <tbody>
						                    <tr class="order-total">
						                        <td data-title="Total">
						                            <strong>
						                                <span class="product-Price-amount amount">
															<?php 
															$GLOBALS['total'] = 0;
															foreach($carts as $cart){
																if($cart->product['isdiscount'] == 1){
																	$price = $cart->product['new_price'];
																}else{
																	$price = $cart->product['price'];
																}
																$GLOBALS['total'] +=  $cart->product['quantity'] * $price;
															}
															echo $GLOBALS['total'];
															?>
						                                </span>
						                            </strong>
												</td>
						                        <th>المجموع</th>
											</tr>
						                </tbody>
									</table> -->
									@if(\auth::user())
						            <div class="wc-proceed-to-checkout">
						                <a href="#" class="checkout-button custom-button"> Proceed to checkout</a>
									</div>
									@else
										<div class="wc-proceed-to-checkout">
											<a href="#" class="checkout-button custom-button"> تسجيل دخول </a>
											<a href="#" class="checkout-button custom-button"> تسجيل </a>
										</div>
									@endif
						        </div> <!-- .cart_totals -->
						    </div> <!-- .cart-collaterals -->
						</div>
                    </main> <!-- #main -->
                  </div> <!-- #primary -->
                </div> <!-- #inner-wrapper -->
              </div><!-- .container -->
            </div> <!-- #content-->
@endsection