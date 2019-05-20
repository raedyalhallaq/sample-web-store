@extends('layouts.website')
@section('content')
			<div id="custom-header">
			  <div class="custom-header-content">
			    <div class="container">
			      <h1 class="page-title">المفضلة</h1>
			      <div id="breadcrumb">
			        <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
			          <ul class="trail-items">
			            <li class="trail-item trail-end"><a href="" rel="home"><span>الرئيسية</span></a></li>
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
											<th class="product-price  text-aligncenter">السعر</th>
						                    <th class="product-name  text-aligncenter">تفاصيل المنتج</th>
						                </tr>
						            </thead>
						            <tbody>
									@foreach($wishlists as $wishlist)
						                <tr class="cart-item">
										<td class="product-remove  text-aligncenter" data-title="Remove">
						                        <a href="#" class="remove" title="Remove this item">
						                            <i class="fa fa-times" aria-hidden="true"></i>
						                        </a>
											</td>
											<td class="product-price  text-aligncenter" data-title="Price">
						                       <span class="product-Price-amount amount">
												@if($wishlist->product['isdiscount'] == 1)
													{{$wishlist->product['new_price']}}
												@else
													{{$wishlist->product['price']}}
												@endif	   
						                       </span>
						                    </td>
						                    <td class="product-name " data-title="Product">
						                        <a href="#" class="cart-product-thumb">
													@foreach($wishlist->product['images'] as $images)
														<img src="images/{{$images->image}}" alt="Product Thumbnail">
													@endforeach
						                        </a>
						                        <div class="product-info">
						                            <h3>{{$wishlist->product['name_ar']}}</h3>
						                            <ul>
						                                <li> التصنيف : {{$wishlist->product['category']['name']}}  </li>
						                            </ul>
						                        </div>
						                    </td>
										</tr>
										@endforeach
						            </tbody>
						        </table>
						    </form> <!-- .product-cart-form -->
						</div>
                    </main> <!-- #main -->
                  </div> <!-- #primary -->
                </div> <!-- #inner-wrapper -->
              </div><!-- .container -->
            </div> <!-- #content-->
@endsection