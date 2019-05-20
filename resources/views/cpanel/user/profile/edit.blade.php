
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
                                    {{trans('user.edit_user')}}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right" action="{{asset('cpanel/admin/profile/update')}}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                                <label for="exampleInputName"> {{trans('user.fname')}}</label>
                                <input type="text" name="fname" class="form-control m-input m-input--solid" id="exampleInputName" value="{{auth()->user()->fname}}" autocomplete = 'off'>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="exampleInputName"> {{trans('user.lname')}}</label>
                                <input type="text" name="lname" class="form-control m-input m-input--solid" id="exampleInputName" value="{{auth()->user()->lname}}" autocomplete = 'off'>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="exampleInputEmail"> {{trans('user.user_email')}}</label>
                                <input type="text" name="email"  value="{{auth()->user()->email}}" class="form-control m-input m-input--solid" id="exampleInputEmail" aria-describedby="emailHelp"  placeholder=""  autocomplete = 'off'>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="exampleInputPhone"> {{trans('user.user_phone')}}</label>
                                <input type="text" name="phone" value="{{auth()->user()->phone}}" class="form-control m-input m-input--solid" id="exampleInputPhone" aria-describedby="emailHelp"  placeholder=""  autocomplete = 'off'>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="exampleInputPhone"> {{trans('user.user_password')}}</label>
                                <input type="password" name="password" value="" class="form-control m-input m-input--solid"  id="exampleInputPhone" aria-describedby="emailHelp"  placeholder=""  autocomplete = 'off'>
                            </div>
                            <div class="form-group m-form__group">
                                <label for="exampleInputPhone"> {{trans('user.user_confirm_password')}}</label>
                                <input type="password" name="password_confirmation" value="" class="form-control m-input m-input--solid" id="exampleInputPhone" aria-describedby="emailHelp"  placeholder=""  autocomplete = 'off'>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="submit" class="btn btn-success">{{trans('user.edit_user')}}</button>
                                <a href="{{asset('cpanel/admin/profile')}}"  class="btn btn-secondary">{{trans('user.back')}}</a>
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
        h3 , input , a , button{font-family: 'Cairo', sans-serif !important;}
    </style>

@stop()