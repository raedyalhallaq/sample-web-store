@extends('layouts.layout')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{trans('order.order')}}</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">{{trans('order.order')}}</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">{{trans('order.doneOrder')}}</span>
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
                                {{trans('order.order')}}
                            </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <!-- <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{asset('cpanel/order/create')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                        <i class="la la-plus"></i>
                                        <span> {{trans('order.add_order')}}</span>
                                </span>
                            </a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul> -->
                </div>
            </div>
            <div class="m-portlet__body">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('order.user')}}</th>
                            <th> {{trans('order.status')}}</th>
                            <th> {{trans('order.price')}} </th>
                            <th> {{trans('order.currency')}} </th>
                            <th> {{trans('order.address')}}</th>
                            <th> {{trans('order.date')}}</th>
                            <th>{{trans('order.action')}}</th>
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

                ajax: '{!! URL::asset('/cpanel/order/done/datatable') !!}',
                columns : [
                    { data: 'id'              , name:'id'},
                    { data: "user.fname"           , name:'user'},
                    { data: 'status.name'           , name:'status.name'},
                    { data: 'price'      , name:'price'},
                    { data: 'currency.name'      , name:'currency.name'},
                    { data: 'address'      , name:'address'},
                    { data: 'created_at'      , name:'created_at'},
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
                            columns: [ 0,1,2,3 ]
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
        $(document).on('click', '.success', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            console.log(id);
            swal({
                title: "هل تم الاستلام",
                type: "success",
                confirmButtonClass: "btn-success",
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
                            url: "{{url('/cpanel/order/done/deliveredOrder')}}",
                            data: {id: id},
                            success: function (data) {
                                swal({
                                    title: "تم الاستلام !",
                                    text: "تم الاستلام بنجاح .",
                                    type: "success",
                                    timer: 2000
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