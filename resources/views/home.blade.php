@extends('layouts.app')

@section('content')
<div class="page-header">
<div class="row">
</div>
</div>
<div class="container">
    <div class="row g-2">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    Hello {{ucfirst(Auth::user()->name)}}, Welcome to suki spares. your home for genuine spare parts
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2">
        @if(isset(Auth::user()->is_admin))
        <div class="col-sm-3">
            <div  class="card">
                <div class="card-body">
                    <h5 style="font-weight: 500;">Users</h5>
                    <h6 style="font-weight: 300;">Registered today: {{$usersToday}}</h6>
                    <h2 style="font-weight: 800">{{$users}}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div  class="card">
                <div class="card-body">
                    <h5 style="font-weight: 500;">Products</h5>
                    <h6 style="font-weight: 300;">Added Today: {{$productsToday}}</h6>
                    <h2 style="font-weight: 800">{{$products}}</h2>
                </div>
            </div>
        </div>
        @endif
        <div class="col-sm-3">
            <div  class="card">
                <div class="card-body">
                    <h5 style="font-weight: 500;">OrdersToday</h5>
                    <h6 style="font-weight: 300;">Amount: Kes. {{number_format($ordersToday->amount)}}</h6>
                    <h2 style="font-weight: 800">{{$ordersToday->count}}</h2>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div  class="card">
                <div class="card-body">
                    <h5 style="font-weight: 500;">Orders This month</h5>
                    <h6 style="font-weight: 300;">Amount: Kes. {{number_format($ordersThisMonth->amount)}}</h6>
                    <h2 style="font-weight: 800">{{$ordersThisMonth->count}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-2">
            <div class="card mb-5">
                <div class="card-body">
                    <h5 style="font-weight: 800;">Orders Trend</h5>
                    <canvas id="myChart" width="500" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6"></div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var orders= new Array();

orders[0]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==1){ $x++;}}  echo $x; ?>;
orders[1]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==2){ $x++; }} echo $x; ?>;
orders[2]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==3){ $x++; }} echo $x; ?>;
orders[3]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==4){ $x++; }} echo $x; ?>;
orders[4]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==5){ $x++; }} echo $x; ?>;
orders[5]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==6){ $x++; }} echo $x; ?>;
orders[6]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==7){ $x++; }} echo $x; ?>;
orders[7]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==8){ $x++; }} echo $x; ?>;
orders[8]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==9){ $x++; }} echo $x; ?>;
orders[9]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==10){ $x++; }} echo $x; ?>;
orders[10]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==11){ $x++; }} echo $x; ?>;
orders[11]=<?php $x=0; foreach($orders as $order){ if($order->monthNum==12){ $x++; }} echo $x; ?>;




var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"],
        datasets: [
        {
            label: 'Last year number of cases',
            data:orders,
            fill: false,
            backgroundColor: [
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)',
                'rgba(0, 0, 0, .7)'
            ],
            borderColor: [
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1
        },
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },

        plugins: {
          labels: false
          /*labels: {
            render: 'percentage',
            position: 'border',
            fontColor: '#000',
            showZero: false
          }*/
  },
  scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Months'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Number of orders'
                        }
                    }]
                }

    }
});
</script>
@endsection
