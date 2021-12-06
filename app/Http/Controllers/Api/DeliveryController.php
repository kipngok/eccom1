<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Resources\DeliveryResource;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deliveries = Delivery::all();
         $date=['startDate'=>date('Y', strtotime('-1 year')).'-01-01', 'startTime'=>'00:00:00', 'endDate'=>date('Y-m').'-'.date('t',strtotime('today')), 'endTime'=>'23:59:00'];
        $corporates=Corporate::all();
        $riders=Rider::all();
        $corporate_id=Auth::user()->corporate_id;
        if(Auth::user()->role->name=='Rider'){$rider_id=Auth::user()->id;}else{$rider_id=null;}
        $deliveries=Delivery::select('deliveries.*','orders.corporate_id')
                            ->join('orders','orders.id','deliveries.order_id')
                            ->when($corporate_id, function ($query, $corporate_id) {
                                return $query->where('orders.corporate_id', '=', $corporate_id);
                            })
                            ->when($rider_id, function ($query, $rider_id) {
                                return $query->where('rider_id', '=', $rider_id);
                            })
                            ->orderBy('created_at','desc')
                            ->paginate(20);
        $filters=['status'=>'All','corporate_id'=>'All','rider_id'=>'All'];
        return response(['deliveries' => DeliveryResource::collection($deliveries), 'message' => 'Retrieved successfully']);
       


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

           $input=$request->all();
        $input['status']='Scheduled';
        $delivery=Delivery::create($input);
        if($delivery->order->payment_type == 'Cash On Delivery'){
            $remittanceD=array();
            $remittanceD['order_id']=$delivery->order_id;
            $remittanceD['rider_id']=$delivery->rider_id;
            $remittanceD['delivery_id']=$delivery->id;
            $remittanceD['date']=date("Y-m-d");
            $remittanceD['amount']=$delivery->order->value;
            $remittanceD['status']='Pending';
            Remittance::create($remittanceD);

            $billD=['order_id'=>$delivery->order_id, 'corporate_id'=>$delivery->order->corporate_id, 'status'=>'Unpaid', 'amount'=>$remittanceD['amount'], 'balance'=>$remittanceD['amount'], 'date'=>date('Y-m-d'), 'due_date'=>date('Y-m-d'), 'narrative'=>'Generated from remittance'];
            Bill::create($billD);
        }

       return response()->json($delivery);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
        return response()->json($delivery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
         $delivery->update($request->all());
         return response()->json($delivery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
        $delivery->delete();
        return response(['message' => 'Deleted']);
    }
}
