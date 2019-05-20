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
                       {{trans('subCategory.show_subCategory')}}
                     </h3>
                  </div>
               </div>
            </div>
            <!--begin::Form-->
               <div class="m-portlet__body row">
                  <div class="col-md-12 col-md-offset-2 col-sm-5">
                        <div class="form-group">
                            <div class="image text-center">
                            @foreach($subCategory->images as $image)
                                <img src="/images/{{$image->image}}" alt="" class="cate-image">
                            @endforeach    
                            </div>
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('subCategory.name_ar'))}}
                           {{Form::text('name_ar', $subCategory->name_ar, ['class' => 'form-control mb-3 awesome','placeholder' => trans('subCategory.name_ar'), 'autocomplete' => 'off', 'disabled'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('text', trans('subCategory.name_en'))}}
                           {{Form::text('name_en', $subCategory->name_en, ['class' => 'form-control mb-3 awesome','placeholder' => trans('subCategory.name_en'),'autocomplete' => 'off', 'disabled' ])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('subCategory.description_ar'))}}
                           {{Form::textarea('description_ar', $subCategory->description_ar, ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('subCategory.description_ar'), 'autocomplete' => 'off', 'disabled'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('subCategory.description_en'))}}
                           {{Form::textarea('description_en', $subCategory->description_en, ['rows' => '5', 'class' => 'form-control mb-3 awesome','placeholder' => trans('subCategory.description_en'), 'autocomplete' => 'off', 'disabled'])}}
                        </div>
                        <div class="form-group">
                           {{Form::label('body', trans('subCategory.category_id'))}}
                           {{Form::select('category_id', $category, $subCategory->category_id,['class' => 'form-control mb-3 awesome','placeholder' => trans('subCategory.category_id'), 'disabled'])}}
                        </div>
                        <br>
                        <span>
                        {{link_to_action('Cpanel\SubCategoryController@index', $title =trans('subCategory.back'),$attributes = [],$parameters = ['class' => 'btn btn-primary awesome'])}}
                        </span>
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