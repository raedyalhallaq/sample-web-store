@extends('layouts.website')
@section('content')
	<div id="custom-header">
		<div class="custom-header-content">
			<div class="container">
				<h1 class="page-title">التصنيقات الفرعية</h1>
				<div id="breadcrumb">
					<div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
						<ul class="trail-items">
							<li class="trail-item trail-begin"><a href="" rel="home"><span>Home</span></a></li>
							<li class="trail-item trail-end"><span>التصنيقات الفرعية</span></li>
						</ul>
					</div>
				</div> 
			</div>
		</div>
	</div>
	<div class="container">
		<div class="inner-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
	<div class="section-products">
		<div class="inner-wrapper">
			<div class="products-inner-wrapper clear-fix">
				@foreach($subcategories as $subcategory)
				<div class="product-item col-grid-3 top-space">
					<div class="product-item-wrapper zoom-effect-hover-container box-shadow-block">
						<div class="product-thumb zoom-effect">
								<a class="thumbnail" href="/category/{{$subcategory->category_id}}/subcategory/{{$subcategory->id}}/products">
										@foreach($subcategory->images as $img)
												<img alt="product" class="category-image" src="/images/{{$img['image']}}">
										@endforeach
								</a>
						</div>
						<div class="product-item-details">
							<h3 class="product-title"><a href="/category/{{$subcategory->category_id}}/subcategory/{{$subcategory->id}}/products" title="title">{{$subcategory->name_ar}}</a></h3>
						</div>
					</div>
					</div>
					@endforeach
			</div>
		</div>
		<div class="text-aligncenter top-space"> {{ $subcategories->links() }} </div>
				</div>
			</div>
		</div>
	</div>
@endsection