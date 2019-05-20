@extends('layouts.layout')
@section('content')
<div class="m-content">
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    {{trans('permission.add_permission')}}
                </h3>
            </div>
        </div>
    </div>
    <form class="m-form" action="/cpanel/permissions" method="POST">
        @csrf
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group">
                    <label for="example_input_full_name"> {{trans('permission.permission_name')}}</label>
                    <input type="text" class="form-control m-input" placeholder="{{trans('permission.permission_name')}}" name="name" autocomplete='off'>
                </div>
                <div class="form-group m-form__group">
                    <label>{{trans('permission.display_name')}}</label>
                    <input type="text" class="form-control m-input" placeholder="{{trans('permission.display_name')}}" name="display_name" autocomplete='off'>
                </div>
                <div class="form-group m-form__group">
                    <label>{{trans('permission.description')}}</label>
                    <div class="input-group">
                        <textarea name="description" id="" cols="30" rows="5" class="form-control m-input" ></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <button type="submit" class="btn btn-success">{{trans('permission.add_permission')}}</button>
                <button type="reset" class="btn btn-secondary">{{trans('permission.back')}}</button>
            </div>
        </div>
</div>
</div>
@endsection
@section('js')
    <script src="/assets/demo/default/custom/crud/forms/widgets/dropzone.js"></script>
@endsection
@section('css')
    <style>
        h3 , input , a ,button ,select,textarea,.m-dropzone__msg-title{font-family: 'Cairo', sans-serif !important;}
        .m-portlet .m-form.m-form--fit>.m-portlet__body {
            padding: 2.2rem 2.2rem;
        }
    </style>
@stop()