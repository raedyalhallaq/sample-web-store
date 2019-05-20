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
                    {{trans('properties.add_properties')}}
                </h3>
            </div>
        </div>
    </div>
    <form class="m-form" action="/cpanel/properties" method="POST">
        @csrf
        <div class="m-portlet__body">
            <div class="m-form__section m-form__section--first">
                <div class="form-group m-form__group">
                    <label for="example_input_full_name"> {{trans('properties.name')}}</label>
                    <input type="text" class="form-control m-input" placeholder="{{trans('properties.name')}}" name="name" autocomplete='off'>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <button type="submit" class="btn btn-success">{{trans('properties.add_properties')}}</button>
                <a href="/cpanel/properties" class="btn btn-secondary">{{trans('properties.back')}}</a>
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