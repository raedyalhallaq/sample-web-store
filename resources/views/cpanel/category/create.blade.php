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
                        {{trans('category.add_category')}}
                     </h3>
                  </div>
               </div>
            </div>
            <!--begin::Form-->
               <div class="m-portlet__body row">
                  <div class="col-md-12 col-md-offset-2 col-sm-5">
                     <div class="form">
                        {!! Form::open(['url' => 'cpanel/category', 'method' => 'post','files' => true]) !!}
                        <div class="form-group">
                           {{Form::label('text', trans('category.name_ar'))}}
                           {{Form::text('name_ar', '', ['class' => 'form-control mb-3 awesome','placeholder' => trans('category.name_ar'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('category.name_en'))}}
                           {{Form::text('name_en', '', ['class' => 'form-control mb-3 awesome','placeholder' => trans('category.name_en'),'autocomplete' => 'off' ])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('category.description_ar'))}}
                           {{Form::textarea('description_ar', '', ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('category.description_ar'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('category.description_en'))}}
                           {{Form::textarea('description_en', '', ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('category.description_en'), 'autocomplete' => 'off'])}}
                        </div>
                        <div class="form-group m-form__group">
                           <label class="" style="display:block;">{{trans('category.properties')}}</label>
                           <div class="row">
                              @foreach($properties as $property)
                                    <div class="d-flex permission-check">
                                       <div class="mx-2">
                                                <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                   <label>
                                                         <input type="checkbox" value="{{$property->id}}" name="property_id[]">
                                                         <span></span>
                                                   </label>
                                                </span>
                                             </div>
                                       <label class="col-form-label">{{$property->name}}</label>
                                    </div>
                                  @endforeach
                              </div>
                        </div>
                        <div class="form-group">
                           <div class="m-dropzone dropzone m-dropzone--success dz-clickable" action="/cpanel/category/upload" id="m-dropzone-three">
                              <div class="m-dropzone__msg dz-message needsclick">
                                 <h3 class="m-dropzone__msg-title">{{trans('category.image_uplode')}}</h3>
                                 <span class="m-dropzone__msg-desc">Only image, pdf and psd files are allowed for upload</span>
                              </div>
                           </div>
                           <input type="hidden" id="images" class="form-control images m-input" name="image" value="">
                        </div>
                        <br>
                        <span>
                        {{Form::submit(trans('category.add_category') ,['class' => 'btn btn-success awesome'])}}
                        {{link_to_action('Cpanel\CategoryController@index', $title =trans('category.back'),$attributes = [],$parameters = ['class' => 'btn btn-secondary awesome'])}}
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
        #images{
         visibility: hidden;
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