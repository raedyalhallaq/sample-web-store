@extends('layouts.layout')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{trans('products.products')}}</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">{{trans('products.products')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                                {{trans('products.products')}}
                            </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{asset('cpanel/products/create')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                        <i class="la la-plus"></i>
                                        <span> {{trans('products.add_products')}}</span>
                                </span>
                            </a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('products.name')}}</th>
                            <th> {{trans('products.description')}}</th>
                            <th> {{trans('products.price')}} </th>
                            <th> {{trans('products.system')}} </th>
                            <th> {{trans('products.currency')}} </th>
                            <th> {{trans('products.subCategory')}}</th>
                            <th> {{trans('products.user')}}</th>
                            <th> {{trans('products.isdiscount')}}</th>
                            <th> {{trans('products.new_price')}} </th>
                            <th>{{trans('products.action')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop()


@section('js')
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            var lastIdx = null;

            var table = $('#m_table_1').DataTable({
                processing: true,

                ajax: '{!! URL::asset('/cpanel/products/datatable') !!}',
                columns : [
                    { data: 'id'              , name:'id'},
                    { data: 'name_ar'           , name:'name_ar'},
                    { data: 'description_ar'      , name:'description_ar'},
                    { data: 'price'      , name:'price'},
                    { data: 'system.name'      , name:'system.name'},
                    { data: 'currency.name'      , name:'currency.name'},
                    { data: 'sub_category.name_ar'      , name:'sub_category.name_ar'},
                    { data: 'user.fname'      , name:'user.fname'},
                    { data: 'isdiscount'      , name:'isdiscount'},
                    { data: 'new_price'      , name:'new_price'},
                    { data: 'Actions'         , name:'Actions'},
                ]
                ,
                "stateSave": false,
                "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                "pagingType": "full_numbers",
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'print',
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'direction', 'rtl' )
                        },
                        exportOptions: {
                            columns: [ 0,1,2,3 ]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [ 3,2,1,0 ]
                        }
                    },
                    {
                        extend: 'pdf',

                        exportOptions: {
                            columns: [ 0,1,2,3 ]
                        }
                    },
                    {
                        extend: 'csv',

                        exportOptions: {
                            columns: [ 3,2,1,0 ]
                        }
                    }
                ],
                "dom": "<'row' <'col-md-1'l><'col-md-8'f> <'col-md-3'B>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            swal({
                title: "هل تريد حذف هدا العنصر",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم !",
                showCancelButton: true,
                cancelButtonText: "لا",
            }).then(
                function(result) {

                    if (result.value) {

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "post",
                            url: "{{url('/cpanel/products/delete')}}",
                            data: {id: id},
                            success: function (data) {
                                swal({
                                    title: "تم الحذف !",
                                    text: "تم الحذف بنجاح .",
                                    type: "success",
                                    timer: 3000
                                }).then(
                                    function () {
                                        location.reload(true);
                                        tr.hide();
                                    }).catch(swal.noop)
                            }
                        })
                    }
                })
        });
    </script>
@endsection

@section('css')
    <style>
        h3{font-family: 'Cairo', sans-serif !important;}
    </style>
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
@endsection