<?php

namespace App\Http\Controllers\Cpanel;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;
use Illuminate\Http\Request;
use Alert;
use App\order;
use Validator;
use Yajra\DataTables\DataTables;

class UnderApprovalOrderController extends Controller
{

    public function index()
    {
        return view('cpanel.order.underApproval');
    }

    public function datatable(){

        if(\Auth::user()->type == 1){
            $order = order::with(['user','status','currency'])->where('status_id',1)->get();
        }else{
            $order = order::with(['user','status','currency','detailsOrder'])
            ->whereHas('detailsOrder.product',function($q){
                $q->where('user_id',\Auth::user()->id);
            })->where('status_id',1)->get();
        }
        return DataTables::of($order)
        
        ->editColumn('Actions',function ($model){
                return "<span class='dropdown center-block'>
                                <a href='#' class='btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown' aria-expanded='true'>
                                            <i class='flaticon-signs-1'></i>
                                </a>
                                <div class='dropdown-menu dropdown-menu-right'>
                                        <a class='dropdown-item' href='/cpanel/order/details/$model->id'><i class='flaticon-search-1'></i>تفاصيل</a>
                                        <a class='dropdown-item success' href='' data-id=".$model->id."><i class='flaticon-right'></i>موافقة على الطلب</a>

                                </div>
                        </span>";
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function agreeOrder(Request $request){

        $id = $request['id'];
        order::find($id)->update([
            'status_id' => 2
        ]);
        return redirect()->back()->with('success',' تمت الموافقة بنجاح ');
    }

}
