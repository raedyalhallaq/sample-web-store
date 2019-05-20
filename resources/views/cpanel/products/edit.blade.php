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
                       {{trans('products.show_products')}}
                     </h3>
                  </div>
               </div>
            </div>
            <!--begin::Form-->
               <div class="m-portlet__body row">
                  <div class="col-md-12 col-md-offset-2 col-sm-5">
                  <div class="form">
                        {!! Form::open(['url' => "cpanel/products/$product->id", 'method' => 'post']) !!}
                        @method('PATCH')
                        <div class="form-group">
                            <div class="image text-center">
                            @foreach($product->images as $image)
                                <img src="/images/{{$image->image}}" alt="" class="cate-image">
                            @endforeach    
                            </div>
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.name_ar'))}}
                           {{Form::text('name_ar', $product->name_ar, ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.name_ar'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.name_en'))}}
                           {{Form::text('name_en', $product->name_en, ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.name_en'),'autocomplete' => 'off' ])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.description_ar'))}}
                           {{Form::textarea('description_ar', $product->description_ar, ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('products.description_ar'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.description_en'))}}
                           {{Form::textarea('description_en', $product->description_en, ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('products.description_en'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.category'))}}
                           {{Form::select('category_id', $category, $product->category_id,['class' => 'category form-control mb-3 awesome','placeholder' => trans('products.category')])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.subCategory'))}}
                           {{Form::select('sub_category_id', $subCategory, $product->sub_category_id,['class' => 'subCategory form-control mb-3 awesome'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.system'))}}
                           {{Form::select('system_id', $system, $product->system_id,['class' => 'form-control mb-3 category awesome','placeholder' => trans('products.system'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-6">
                                 {{Form::label('text', trans('products.price'))}}
                                 {{Form::number('price', $product->price, ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.price'), 'autocomplete' => 'off'])}}
                              </div>
                              <div class="col-md-6">
                                 {{Form::label('text', trans('products.currency'))}}
                                 {{Form::select('currency_id', $currency,$product->sub_category_id, ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.currency'), 'autocomplete' => 'off'])}}
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.isdiscount'))}}
                           {{Form::checkbox('isdiscount', '1',$product->isdiscount,['class' => 'isdiscount'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('products.new_price'))}}
                           {{Form::number('new_price', $product->new_price, ['class' => 'form-control mb-3 awesome newprice','placeholder' => trans('products.price'), 'autocomplete' => 'off','disabled'])}}
                        </div>
                        <br>
                        <span>
                        {{Form::submit(trans('products.edit_products') ,['class' => 'btn btn-success awesome'])}}
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

        $(document).ready(function(){  
            $("select.category").on('change', function(){
               var id = $(this).children("option:selected").val();
               // console.log(id);
                  $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: "get",
                     url: "/cpanel/subCategory/" + id + "/getsubCategory",
                     data: {id: id},
                     success: function (data) {
                        // console.log(data);
                        var options = [];
                        $.each(data, function(i, item){
                           // alert(data[i].name_ar);
                           options += "<option value='" + data[i].id + "'>" + data[i].name_ar + "</option>";
                        });
                        // alert(options);
                        $('.subCategory').html(options);
                     }
               });
            });      
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
        .image .cate-image{
            width:200px;
            height:200px;
            margin:0 5px;
        }
        h3 , input , a ,button ,select,textarea,.m-dropzone__msg-title{font-family: 'Cairo', sans-serif !important;}
        .m-portlet .m-form.m-form--fit>.m-portlet__body {
            padding: 2.2rem 2.2rem;
        }
    </style>

@stop()