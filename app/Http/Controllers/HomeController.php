<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Banner;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::select(DB::raw('id, MONTH(created_at) as monthNum'))
                    ->when(!isset(Auth::user()->is_admin), function ($query) {
                                                    return $query->where('user_id','=',Auth::user()->id);
                                                })
                     ->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
                     ->where('status','!=','Created')
                     ->get();
        $ordersToday=Order::select(DB::raw(" COUNT('id') as count, SUM(total) as amount"))
                            ->when(!isset(Auth::user()->is_admin), function ($query) {
                                                    return $query->where('user_id','=',Auth::user()->id);
                                                })
                            ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
                            ->where('status','!=','Created')
                            ->first();
        $ordersThisWeek=Order::select(DB::raw(" COUNT('id') as count, SUM(total) as amount"))->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status','!=','Created')->first();
        $ordersThisMonth=Order::select(DB::raw(" COUNT('id') as count, SUM(total) as amount"))
                                ->when(!isset(Auth::user()->is_admin), function ($query) {
                                                    return $query->where('user_id','=',Auth::user()->id);
                                                })
                                ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('status','!=','Created')->first();
        $ordersThisYear=Order::select(DB::raw(" COUNT('id') as count, SUM(total) as amount"))->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->where('status','!=','Created')->first();
        $products=Product::count();
        $users=User::count();
        $usersToday=User::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count();
        $productsToday=Product::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count();
        $stretchBanner=Banner::where('location','=','Stretch Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();
        $topstretchBanner=Banner::where('location','=','Top Banner')->where('status','=','Active')->orderBy('created_at','desc')->first();

        return view('home',compact('orders', 'ordersToday', 'ordersThisWeek', 'ordersThisMonth', 'ordersThisYear', 'products', 'users','productsToday','usersToday','stretchBanner','topstretchBanner'));
    }
}
