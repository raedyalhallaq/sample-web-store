@extends('layouts.website')
@section('content')
<div id="custom-header">
			  <div class="custom-header-content">
			    <div class="container">
			      <h1 class="page-title">تفاصيل المنتج</h1>
			      <div id="breadcrumb">
			        <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
			          <ul class="trail-items">
									 <li class="trail-item trail-end"><span>تفاصيل المنتج</span></li>
			          </ul>
			        </div> 
			      </div> 
			    </div>
			  </div> 
			</div>
		<div id="content" class="site-content global-layout-right-sidebar">
			<div class="container">
				<div class="inner-wrapper">
					<div id="primary" class="content-area">
						<main id="main" class="site-main">
						  <div class="product-single">
						  <div class="inner-wrapper text-alignright">
							<div class="col-grid-6">
								@foreach($product as $prod)
								<div class="summary entry-summary">
									<div class="product-item-details">
										<h2 class="product-title"><a href="#" title="title">{{$prod->name_ar}}</a></h2>
										<div class="rating-wrapper clear-fix">
											</div>
										<div class="product-price-container">
											@if($prod->isdiscount == 1)
											<del class="dis-price">{{$prod->price}}</del>
											<span class="fix-price">{{$prod->new_price}}</span>
											@else
												<span class="fix-price">{{$prod->price}}</span>
											@endif
										</div>
									</div>
									<div class="item-content">
											<p>{{$prod->description_ar}}</p>
									</div>
								   <form class="single-cart" method="post">
										 	@csrf
								        <input type="number" name="quantity" class="input-text" step="1" min="1" value="1">
								        <button type="submit" class="custom-button button-small addcart" name="add-ro-cart" data-id="{{$prod->id}}" @if(\auth::user()) {{"data-user=".\auth::user()->id}}@endif> اضف إلى العربة </button>
								        <button type="submit" name="add-ro-cart" data-id="{{$prod->id}}" @if(\auth::user()) {{"data-user=".\auth::user()->id}} @endif class="custom-button custom-secondary-button button-small addwishlist"> المفضلة </button>
									 </form>
									 <img src="/images/measure.png" width="150px" alt=""><br>
										<small>يمكنك استخدام متر اليدوي او تطبيق المسطرة **</small><br>
									 <div class="row">
										 <div class="col-grid-12">
													<form class="property text-alignright" method="post">
														@csrf
															<input type="text" name="size" disabled><label for=""><b> المقاس الذي يناسبك من هذا المنتج هو</b></label><br><br>
															<div class="row">
																<div class="col-grid-6">
																			<input type="number" name="length" class="input-text size-num" step="1" min="1" value="1">
																			<label for="" style="margin-left:8px"> طول البلوزة</label><br><br>
																			<input type="number" name="bust" class="input-text size-num" step="1" min="1" value="1">
																			<label for=""  style="margin-left:8px">	عرض الصدر</label><br>
																</div>	
																<div class="col-grid-6">
																			<input type="number" name="shoulder" class="input-text size-num" step="1" min="1" value="1">
																			<label for=""  style="margin-left:8px">المسافة بين الكتفين</label><br><br>
																			<input type="number" name="sleeve" class="input-text size-num" step="1" min="1" value="1">
																			<label for=""  style="margin-left:8px">طول الذراع</label><br>
																</div>	<br>
															</div><br>	
															<button type="submit" class="custom-button button-small top-space addvalue" style="margin-top:20px;" name="add-value"> اضف القيم </button>
												</form>
										 </div>
									 </div>
								   <div class="col-grid-12">
									 <div class="entry-meta product-meta">
								       <h4>التصنيفات :</h4>
								       <span class="cat-links">
													 <a href="/category/{{$prod->category['id']}}/subcategory/{{$prod->subCategory['id']}}" rel="tag">{{$prod->subCategory['name_ar']}}</a>
								            <a href="/category/{{$prod->category['id']}}" rel="tag">{{$prod->category['name']}},</a>
								       </span>
									 </div>
									 </div>
									 @endforeach
								</div>
						  	</div>
							<div class="col-grid-6">
								<div class="single-thumb-detail" style="margin:0 auto;">
									<div class="pager-thumbnail">
										@foreach($product as $prod)
											@foreach($prod->images as $image)
											<div class="pager-thumb active" style="margin: 0 auto;"><img src="/images/{{$image->image}}"></div>
												@break
											@endforeach
											  @break
										@endforeach
									</div> 
								</div>
								<div class="sizes text-aligncenter">
										<ul>
											<li id="4XL">4XL</li>
											<li id="3XL">3XL</li>
											<li id="2XL">2XL</li>
											<li id="XL">XL</li>
											<li id="L">L</li>
											<li id="M">M</li>
											<li id="S">S</li>
										</ul>
								</div>
							</div>
						  </div>
						 </div> 
						 <div id="tabs" class="product-tabs wc-tabs-wrapper">
						 	<ul class="tabs wc-tabs nav-tabs pull-right" role="tablist">
						 		<li class="nav-item"><a href="#description">Description</a></li>
						 	</ul>
						 	<div class="tab-content text-alignright">
						 		<div class="tab-pane active" id="description">
									@foreach($product as $prod)
						 				<p>{{$prod->description_ar}}</p>
									@endforeach								 
									</div>
						 		</div>
						 	</div>
						 </div>
						</main>
					</div> 
@endsection
@section('js')
<script>
        $(document).on('click', '.addwishlist', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
						var user = $(this).data('user');
						$.ajax({
								headers: {
										'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
								},
								type: "post",
								url: "{{url('/addwishlist')}}",
								data: {id: id,user: user},
								success: function (data) {
										alert('تمت الإضافة بنجاح');
								}
						})
        });

				$(document).on('click', '.addcart', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
						var user = $(this).data('user');
						var quantity = $('[name = "quantity"]').val();
						$.ajax({
								headers: {
										'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
								},
								type: "post",
								url: "{{url('/addcart')}}",
								data: {id: id,user: user,quantity:quantity},
								success: function (data) {
										alert('تمت الإضافة بنجاح');
								}
						})
        });

				$(document).on('click', '.addvalue', function (e) {
            e.preventDefault();
						var bust = $('[name = "bust"]').val();
						var length = $('[name = "length"]').val();
						var shoulder = $('[name = "shoulder"]').val();
						var sleeve = $('[name = "sleeve"]').val();
						$.ajax({
								headers: {
										'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
								},
								type: "post",
								url: "{{url('/addvalue')}}",
								data: {bust: bust,length: length, shoulder:shoulder, sleeve:sleeve},
								success: function(data){
										$('[name = "size"]').val(data);
										if(data == 'S'){
											console.log('ho');
										}
										if(data == 'S'){
											$('.sizes #S').css({"border-color":"#ce1648", "background-color": "#ce1648" ,"color":"#fff"});
										}
										if(data == 'M'){
											$('.sizes #M').css({'border-color':'#ce1648','background-color': '#ce1648','color':'#fff'});
										}
										if(data == 'L'){
											$('.sizes #L').css({'border-color':'#ce1648','background-color': '#ce1648','color':'#fff'});
										}
										if(data == 'XL'){
											$('.sizes #XL').css({'border-color':'#ce1648','background-color': '#ce1648','color':'#fff'});
										}
										if(data == '2XL'){
											$('.sizes #2XL').css({'border-color':'#ce1648','background-color': '#ce1648','color':'#fff'});
										}
										if(data == '3XL'){
											$('.sizes #3XL').css({'border-color':'#ce1648','background-color': '#ce1648','color':'#fff'});
										}
										if(data == '4XL'){
											$('.sizes #4XL').css({'border-color':'#ce1648','background-color': '#ce1648','color':'#fff'});
										}
								}
						})
        });

    </script>
@endsection