
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
                                    {{trans('user.show_one_user')}}
                                </h3>
                            </div>
                        </div>

                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="{{asset('cpanel/admin/profile/edit')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
												<span>
													<span>  {{trans('user.edit_user')}}</span>
												</span>
                                    </a>
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">

                            <div class="form-group m-form__group">
                                <label for="exampleInputName"> {{trans('user.fname')}}</label>
                                <input type="text" class="form-control m-input m-input--solid" id="exampleInputName"  disabled value="{{auth()->user()->fname}}">
                            </div>

                            <div class="form-group m-form__group">
                                <label for="exampleInputName"> {{trans('user.lname')}}</label>
                                <input type="text" class="form-control m-input m-input--solid" id="exampleInputName"  disabled value="{{auth()->user()->lname}}">
                            </div>

                            <div class="form-group m-form__group">
                                <label for="exampleInputEmail"> {{trans('user.user_email')}}</label>
                                <input type="text" class="form-control m-input m-input--solid" id="exampleInputEmail" disabled value="{{auth()->user()->email}}">
                            </div>

                            <div class="form-group m-form__group">
                                <label for="exampleInputPhone"> {{trans('user.user_phone')}}</label>
                                <input type="text" class="form-control m-input m-input--solid" id="exampleInputPhone" disabled value="{{auth()->user()->phone}}">
                            </div>

                            <div class="form-group m-form__group">
                                <label for="exampleInputPhone"> {{trans('user.user_type')}}</label>
                                <input type="text" class="form-control m-input m-input--solid" id="exampleInputPhone" aria-describedby="emailHelp" disabled value=<?php if(auth()->user()->type == 1){ echo'Admin';} else {echo'مستخدم';}?>>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop()


@section('js')


@stop()

@section('css')
    <style>
        h3 , input , a{font-family: 'Cairo', sans-serif !important;}
    </style>

@stop()