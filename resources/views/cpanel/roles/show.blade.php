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
                         {{trans('role.add_role')}}
                     </h3>
                  </div>
               </div>
            </div>
               <div class="m-portlet__body row">
                  <div class="col-md-12 col-md-offset-2 col-sm-5">
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group">
                                    <label for="example_input_full_name"> {{trans('role.role_name')}}</label>
                                    <input type="text" class="form-control m-input" value=" {{$role->name}}" disabled>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>{{trans('role.display_name')}}</label>
                                    <input type="text" class="form-control m-input" value="{{$role->display_name}}" disabled>
                                </div>
                                <div class="form-group m-form__group">
                                    <label>{{trans('role.description')}} </label>
                                    <div class="input-group">
                                        <textarea cols="30" rows="5" disabled class="form-control m-input">{{$role->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label class="" style="display:block;">{{trans('permission.permission')}}</label>
                                        <div class="row">
                                        @foreach($permissions as $permission)
                                            <div class="d-flex permission-check">
                                                <div class="mr-2">
                                                        <span class="m-switch m-switch--outline m-switch--icon m-switch--success">
                                                            <label>
                                                                <input type="checkbox" disabled value="{{$permission->id}}" 
                                                                @foreach($permissionRole as $perRole)
                                                                    @if($permission['id'] == $perRole['permission_id']){{'checked'}}@endif
                                                                @endforeach>
                                                                <span></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                <label class="col-form-label">{{$permission->display_name}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <a href="/cpanel/roles" class="btn btn-info"> {{trans('role.back')}}</a>
                            </div>
                        </div>
                    </div>
                  </div>
               </div>
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
        .permission-check{
            margin:5px 15px;
        }
    </style>
@stop()