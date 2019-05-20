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
                        {{trans('user.users_role_permission')}}
                     </h3>
                  </div>
               </div>
            </div>
            <!--begin::Form-->
               <div class="m-portlet__body row">
                  <div class="col-md-12 col-md-offset-2 col-sm-5">
                     <div class="form">
                        {!! Form::open(['url' => "cpanel/users/$id/update_role", 'method' => 'post']) !!}
                        @method('patch')
                        <div class="m-form__group form-group">
                            <label for="">{{trans('user.users_role')}}</label>
                            <div class="m-radio-inline">
                                @foreach($roles as $role)
                                <label class="m-radio">
                                    <input type="radio" name="role_id" value="{{$role->id}}" @if($role->id == $user_role->role_id){{'checked'}}@endif>
                                        {{$role->display_name}}
                                    <span></span>
                                </label>
                              @endforeach   
                            </div>						
                        </div>
                        <br>
                        <span>
                        {{Form::submit(trans('user.edit_user_role') ,['class' => 'btn btn-success awesome'])}}
                        {{link_to_action('Cpanel\UserController@index', $title =trans('user.back'),$attributes = [],$parameters = ['class' => 'btn btn-secondary awesome'])}}
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
        h3 , input , a ,button ,select,textarea,.m-dropzone__msg-title{font-family: 'Cairo', sans-serif !important;}
        .m-portlet .m-form.m-form--fit>.m-portlet__body {
            padding: 2.2rem 2.2rem;
        }
    </style>

@stop()