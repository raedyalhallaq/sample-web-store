@extends('layouts.layout')

@section('content')
<div class="m-content">
   <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
         <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
               <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                     <span class="m-portlet__head-icon m--hide">
                     <i class="la la-gear"></i>
                     </span>
                     <h3 class="m-portlet__head-text">
                        {{trans('products.add_products')}}
                     </h3>
                  </div>
               </div>
            </div>
            <!--begin::Form-->
               <div class="m-portlet__body row">
                  <div class="col-md-12 col-md-offset-2 col-sm-5">
                     <div class="form">
                        {!! Form::open(['url' => 'cpanel/products', 'method' => 'post']) !!}
                        <div class="form-group">
                           {{Form::label('text', trans('products.name_ar'))}}
                           {{Form::text('name_ar', '', ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.name_ar'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.name_en'))}}
                           {{Form::text('name_en', '', ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.name_en'),'autocomplete' => 'off' ])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.description_ar'))}}
                           {{Form::textarea('description_ar', '', ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('products.description_ar'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.description_en'))}}
                           {{Form::textarea('description_en', '', ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('products.description_en')])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.category'))}}
                           {{Form::select('category_id', $category, '',['class' => 'form-control mb-3 awesome','placeholder' => trans('products.category'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.subCategory'))}}
                           {{Form::select('sub_category_id', $subCategory, '',['class' => 'form-control mb-3 awesome','placeholder' => trans('products.subCategory'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.price'))}}
                           {{Form::number('price', '', ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.price'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.isdiscount'))}}
                           {{Form::checkbox('isdiscount', '1','',['class' => 'isdiscount'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.new_price'))}}
                           {{Form::number('new_price', '', ['class' => 'form-control mb-3 awesome newprice','placeholder' => trans('products.price'), 'autocomplete' => 'off','disabled'])}}
                        </div>
                        <div class="form-group">
                           <div class="m-dropzone dropzone m-dropzone--success dz-clickable" action="/cpanel/products/upload" id="m-dropzone-three">
                              <div class="m-dropzone__msg dz-message needsclick">
                                 <h3 class="m-dropzone__msg-title">{{trans('products.image_uplode')}}</h3>
                                 <span class="m-dropzone__msg-desc">Only image, pdf and psd files are allowed for upload</span>
                                 <input type="hidden" id="images" class="form-control m-input" name="image" value="">
                              </div>
                           </div>
                        </div>
                        <br>
                        <span>
                        {{Form::submit(trans('products.add_products') ,['class' => 'btn btn-success awesome'])}}
                        {{link_to_action('Cpanel\ProductController@index', $title =trans('products.back'),$attributes = [],$parameters = ['class' => 'btn btn-secondary awesome'])}}
                        </span>
                        {!! Form::close() !!}
                     </div>
                  </div>
               </div>
         </div>
      </div>
   </div>
</div>
@stop()

@section('js')
    <script src="/assets/demo/default/custom/crud/forms/widgets/dropzone.js"></script>
    <script>
        $('.isdiscount').change(function() {
            if($(this).is(":checked")) {
                $('.newprice').prop("disabled",false);
            }else{
                $('.newprice').prop("disabled",true);
            } 
        });
    </script>
@stop()
@section('css')
    <style>
        .cam-image {
            background-image: url('/cpanel/assets/app/media/img/445x200.png');
        }
        .imag_tab2 .cam-image {
            display: block;
            margin: auto;
            width: 275px;
            height: 275px;
            max-width: 100%;
            margin-bottom: 0px;
            overflow: hidden;
        }
        .upload_imag {
            display: block;
            width: 150px;
            max-width: 100%;
            background: #6b6b6b;
            margin: 15px auto;
            font-size: 14px;
            color: #fff;
            padding: 5px 5px 7px;
            border-radius: 30px;
            cursor: pointer;
            text-align: center;
        }
        h3 , input , a ,button ,select,textarea,.m-dropzone__msg-title{font-family: 'Cairo', sans-serif !important;}
        .m-portlet .m-form.m-form--fit>.m-portlet__body {
            padding: 2.2rem 2.2rem;
        }
    </style>
@stop()