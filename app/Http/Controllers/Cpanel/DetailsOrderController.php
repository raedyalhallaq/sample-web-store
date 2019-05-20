<?php

namespace App\Http\Controllers\Cpanel;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use Illuminate\Http\Request;
use Alert;
use App\detailsOrder;
use Validator;
use Yajra\DataTables\DataTables;

class DetailsOrderController extends Controller{

    public function index($id){
        return view('cpanel.order.details',compact('id'));
    }

    public function datatable($id){
        $detailsOrder = detailsOrder::with(['product','order','order.user','order.currency','order.status'])->where('order_id',$id)->get();
        return DataTables::of($detailsOrder)
        
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='order/details/$model->id'><i class='flaticon-search-1'></i>تفاصيل</a>
                                        <a class='dropdown-item delete' href='' data-id=".$model->id."><i class='flaticon-like'></i>حالة الطلب</a>
                                </div>
                        </span>";
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }
}