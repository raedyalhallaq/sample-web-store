@extends('layouts.website')
@section('content')
			<div id="custom-header">
			  <div class="custom-header-content">
			    <div class="container">
			      <h1 class="page-title">المنتجات</h1>
			      <div id="breadcrumb">
			        <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
			          <ul class="trail-items">
			            <li class="trail-item trail-begin"><a href="" rel="home"><span>الرئيسية</span></a></li>
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
							<div class="pruduct-filter-row clear-fix">
							   <div class="row text-alignright">
										 <div class="col-grid-2">
										 <label for="">: التصنيفات</label>
											<select name="category" id="" class="category text-alignright">
												<option value="">اختر التصنيف</option>
												@foreach($categories as $category)
													<option value="{{$category->id}}">{{$category->name_ar}}</option>
												@endforeach
											</select>
									 </div>
									 <div class="col-grid-2">
										 <label for="">: التصنيفات الفرعية</label>
											<select name="" id="" class="text-alignright subcategory">
												<option value="">اختر التصنيف الفرعي</option>
											</select>
									 </div>
								 </div>
							</div>
							<div class="inner-wrapper">
								<div class="products-inner-wrapper clear-fix products-page">
								</div>
							</div>
							<div class="pruduct-filter-row clear-fix top-space">
							   <div class="filter-row-box pull-left">
							   		</div>
							</div>
						</div><!-- .section-products -->
                    </main> <!-- #main -->
                  </div> <!-- #primary -->
                </div> <!-- #inner-wrapper -->
              </div><!-- .container -->
            </div> <!-- #content-->
@endsection
@section('js')
	<script>
		$(document).ready(function(){

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
						var quantity = 1;
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
			// $("select.category").on('change', function(){
      //     var categoryId = $(this).children("option:selected").val();
			// });	
			// $("select.subcategory").on('change', function(){
      //     var subId = $(this).children("option:selected").val();
			// });	
			$.ajax({
							headers: {
									'X-CSRF-TOKEN': $('[name="_token"]').attr('value')
							},
							type: "post",
							url: "/shop/shopProducts",
							data: {},
							success: function(data){
								$('.products-page').html(data);
							}
					})
			});

		$(document).ready(function(){
			$("select.category").on('change', function(){
          var id = $(this).children("option:selected").val();
					$.ajax({
                     type: "get",
                     url: "/category/subcategories/"+id,
                     success: function (data) {
                        var options = `<option value=''>اختر التصنيف الفرعي</option>`;
                        $.each(data, function(i, item){
                           options += "<option value='" + data[i].id + "'>" + data[i].name_ar + "</option>";
                        });
                        $('.subcategory').html(options);
                     }
               });
			});		

		});	
	</script>
@endsection