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
                           {{Form::select('category_id', $category, '',['class' => 'form-control mb-3 category awesome','placeholder' => trans('products.category'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.subCategory'))}}
                           {{Form::select('sub_category_id', [null=>trans('products.subCategory')],'',['class' => 'subCategory form-control subCategory mb-3 awesome','autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('products.system'))}}
                           {{Form::select('system_id', $system, '',['class' => 'form-control mb-3 awesome','placeholder' => trans('products.system'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-6">
                                 {{Form::label('text', trans('products.price'))}}
                                 {{Form::number('price', '', ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.price'), 'autocomplete' => 'off'])}}
                              </div>
                              <div class="col-md-6">
                                 {{Form::label('text', trans('products.currency'))}}
                                 {{Form::select('currency_id', $currency,'', ['class' => 'form-control mb-3 awesome','placeholder' => trans('products.currency'), 'autocomplete' => 'off'])}}
                              </div>
                           </div>
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
                        <div class="form-group properties">
                           <div class="row property">
                              <!-- <label class='col-md-12 label'>{{trans('products.properties')}}</label> -->
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
        $(document).ready(function(){
           var row = '';  
            $("select.category").on('change', function(){
               var id = $(this).children("option:selected").val();
               // console.log(id);
                  $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: "get",
                     url: "/cpanel/subCategory/getsubCategory/"+ id,
                     // data: {id: id},
                     success: function (data) {
                        var options = [];
                        $.each(data, function(i, item){
                           options += "<option value='" + data[i].id + "'>" + data[i].name_ar + "</option>";
                        });
                        // alert(options);
                        $('.subCategory').html(options);
                     }
               });

               $.ajax({
                     headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     type: "get",
                     url: "/cpanel/properties/getproperties/"+ id ,
                     // data: {id: id},
                     success: function (data) {
                        var row = " <label class='col-md-12 label'>{{trans('products.properties')}}</label>";
                        $.each(data, function(i, item) {
                           $.each(data[i],function(j, item){
                              row += `<div class='col-md-3'>
                                          <div class='d-flex proudct-property'>
                                                <div class='mx-2'>
                                                <span class='m-switch m-switch--outline m-switch--icon m-switch--success'>
                                                   <label>
                                                         <input type='checkbox' value='`+ data[i][j].id +`' name='proudct_property_id[]'>
                                                         <span></span>
                                                   </label>
                                                </span>
                                                </div>
                                                <label class='col-form-label'>`+ data[i][j].name +`</label>
                                          </div>
                                    </div>`
                           });
                        });
                        $('.property').html(row);
                     }
               });
            });      
        });   
    </script>
@stop()

@section('css')
    <style>
        h3 , input , a ,button ,select,textarea,.m-dropzone__msg-title{font-family: 'Cairo', sans-serif !important;}
        .m-portlet .m-form.m-form--fit>.m-portlet__body {
            padding: 2.2rem 2.2rem;
        }
    </style>

@stop()