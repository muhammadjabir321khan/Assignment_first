@extends('dashboard.layout')
@section('content')
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-md-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group mb-4">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Client Payment Report</h6>
                        </div>
                        <div class="card-tools">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">30 Days</a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>7 Days</span></a></li>
                                        <li><a href="#"><span>15 Days</span></a></li>
                                        <li><a href="#"><span>30 Days</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-report">
                        <div class="payment-doughnut-ck">
                            <canvas class="analytics-doughnut" id="PaymentDoughnutData"></canvas>
                        </div>
                        <div class="traffic-channel-group">
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span> Paid </span></div>
                                <div class="amount">$4,305.00 <small>58.63%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#b8acff"></span><span> Due </span></div>
                                <div class="amount">$859.25 <small>23.94%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffa9ce"></span><span> Invoice </span></div>
                                <div class="amount">$482.15 <small>12.94%</small></div>
                            </div>
                            <div class="traffic-channel-data">
                                <div class="title"><span class="dot dot-lg sq" data-bg="#f9db7b"></span><span> Estimate </span></div>
                                <div class="amount">$138.70 <small>4.49%</small></div>
                            </div>
                        </div><!-- .traffic-channel-group -->
                    </div><!-- .payment report -->
                    <!--  -->
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group mb-4">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Client Payment Status</h6>
                        </div>
                        <div class="card-tools">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">30 Days</a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>7 Days</span></a></li>
                                        <li><a href="#"><span>15 Days</span></a></li>
                                        <li><a href="#"><span>30 Days</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-status">
                        <div class="nk-ck-md">
                            <canvas class="polar-chart" id="polarChartData"></canvas>
                        </div>
                        <ul class="traffic-channel-group mt-4">
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#9cabff"></span>
                                    <span>Started</span>
                                </div>
                            </li>
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#f4aaa4"></span>
                                    <span>Inprogress</span>
                                </div>
                            </li>
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#9785FF"></span>
                                    <span>Completed</span>
                                </div>
                            </li>
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#E85347"></span>
                                    <span>Cencel</span>
                                </div>
                            </li>
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#8feac5"></span>
                                    <span>Success</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-6 col-xl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group mb-4">
                        <div class="card-title card-title-sm">
                            <h6 class="title">Client Project Reports</h6>
                        </div>
                        <div class="card-tools">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">30 Days</a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>7 Days</span></a></li>
                                        <li><a href="#"><span>15 Days</span></a></li>
                                        <li><a href="#"><span>30 Days</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="projects-report">
                        <div class="nk-ck-md">
                            <canvas class="doughnut-chart" id="doughnutChartData"></canvas>
                        </div>
                        <ul class="traffic-channel-group mt-4">
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#9cabff"></span>
                                    <span>Started</span>
                                </div>
                            </li>
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#f4aaa4"></span>
                                    <span>Inprogress</span>
                                </div>
                            </li>
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#9785FF"></span>
                                    <span>Completed</span>
                                </div>
                            </li>
                            <li class="m-1">
                                <div class="title">
                                    <span class="dot dot-lg sq" data-bg="#E85347"></span>
                                    <span>Cencel</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
    </div>
</div>
@endsection