@extends('dashboard.layout')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-md-4">
                        <div class="card card-bordered card-full">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-0">
                                    <div class="card-title">
                                        <h6 class="subtitle">Total Companies</h6>
                                    </div>
                                    <div class="card-tools">
                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Deposited"></em>
                                    </div>
                                </div>
                                <div class="card-amount">
                                    <span class="amount">{{$companies}} <span class="currency currency-usd">Company</span>
                                    </span>
                                    <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                </div>
                                <div class="invest-data">
                                    <div class="invest-data-amount g-2">
                                        <div class="invest-data-history">
                                            <div class="title">This Month</div>
                                            <div class="amount">2,940.59 <span class="currency currency-usd">USD</span></div>
                                        </div>
                                        <div class="invest-data-history">
                                            <div class="title">This Week</div>
                                            <div class="amount">1,259.28 <span class="currency currency-usd">USD</span></div>
                                        </div>
                                    </div>
                                    <div class="invest-data-ck">
                                        <canvas class="iv-data-chart" id="totalDeposit"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="card card-bordered card-full">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-0">
                                    <div class="card-title">
                                        <h6 class="subtitle">Total Employee</h6>
                                    </div>
                                    <div class="card-tools">
                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Withdraw"></em>
                                    </div>
                                </div>
                                <div class="card-amount">
                                    <span class="amount">{{$employies}} <span class="currency currency-usd">Employee</span>
                                    </span>
                                    <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                </div>
                                <div class="invest-data">
                                    <div class="invest-data-amount g-2">
                                        <div class="invest-data-history">
                                            <div class="title">This Month</div>
                                            <div class="amount">2,940.59 <span class="currency currency-usd">USD</span></div>
                                        </div>
                                        <div class="invest-data-history">
                                            <div class="title">This Week</div>
                                            <div class="amount">1,259.28 <span class="currency currency-usd">USD</span></div>
                                        </div>
                                    </div>
                                    <div class="invest-data-ck">
                                        <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-4">
                        <div class="card card-bordered  card-full">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-0">
                                    <div class="card-title">
                                        <h6 class="subtitle">Projects</h6>
                                    </div>
                                    <div class="card-tools">
                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total Balance in Account"></em>
                                    </div>
                                </div>
                                <div class="card-amount">
                                    <span class="amount"> {{ $projects }} <span class="currency currency-usd">Project</span>
                                    </span>
                                </div>
                                <div class="invest-data">
                                    <div class="invest-data-amount g-2">
                                        <div class="invest-data-history">
                                            <div class="title">This Month</div>
                                            <div class="amount">2,940.59 <span class="currency currency-usd">USD</span></div>
                                        </div>
                                        <div class="invest-data-history">
                                            <div class="title">This Week</div>
                                            <div class="amount">1,259.28 <span class="currency currency-usd">USD</span></div>
                                        </div>
                                    </div>
                                    <div class="invest-data-ck">
                                        <canvas class="iv-data-chart" id="totalBalance"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-xxl-4">
                        <div class="card card-bordered card-full">
                            <div class="card-inner">
                                <div class="card-title-group mb-1">
                                    <div class="card-title">
                                        <h6 class="title">Investment Overview</h6>
                                        <p>The investment overview of your platform. <a href="#">All Investment</a></p>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#overview">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#thisyear">This Year</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#alltime">All Time</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-0">
                                    <div class="tab-pane active" id="overview">
                                        <div class="invest-ov gy-2">
                                            <div class="subtitle">Currently Actived Investment</div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Amount</div>
                                                </div>
                                                <div class="invest-ov-stats">
                                                    <div><span class="amount">56</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                    <div class="title">Plans</div>
                                                </div>
                                            </div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Paid Profit</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invest-ov gy-2">
                                            <div class="subtitle">Investment in this Month</div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">49,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Amount</div>
                                                </div>
                                                <div class="invest-ov-stats">
                                                    <div><span class="amount">23</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                    <div class="title">Plans</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="thisyear">
                                        <div class="invest-ov gy-2">
                                            <div class="subtitle">Currently Actived Investment</div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">89,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Amount</div>
                                                </div>
                                                <div class="invest-ov-stats">
                                                    <div><span class="amount">96</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                    <div class="title">Plans</div>
                                                </div>
                                            </div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">99,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Paid Profit</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invest-ov gy-2">
                                            <div class="subtitle">Investment in this Month</div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Amount</div>
                                                </div>
                                                <div class="invest-ov-stats">
                                                    <div><span class="amount">83</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                    <div class="title">Plans</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="alltime">
                                        <div class="invest-ov gy-2">
                                            <div class="subtitle">Currently Actived Investment</div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Amount</div>
                                                </div>
                                                <div class="invest-ov-stats">
                                                    <div><span class="amount">556</span><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>1.93%</span></div>
                                                    <div class="title">Plans</div>
                                                </div>
                                            </div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">149,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Paid Profit</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invest-ov gy-2">
                                            <div class="subtitle">Investment in this Month</div>
                                            <div class="invest-ov-details">
                                                <div class="invest-ov-info">
                                                    <div class="amount">249,395.395 <span class="currency currency-usd">USD</span></div>
                                                    <div class="title">Amount</div>
                                                </div>
                                                <div class="invest-ov-stats">
                                                    <div><span class="amount">223</span><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span></div>
                                                    <div class="title">Plans</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xxl-4">
                        <div class="card card-bordered card-full">
                            <div class="card-inner d-flex flex-column h-100">
                                <div class="card-title-group mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Top Invested Plan</h6>
                                        <p>In last 30 days top invested schemes.</p>
                                    </div>
                                    <div class="card-tools mt-n4 mr-n1">
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>15 Days</span></a></li>
                                                    <li><a href="#" class="active"><span>30 Days</span></a></li>
                                                    <li><a href="#"><span>3 Months</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-list gy-3">
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Strater Plan</div>
                                            <div class="progress-amount">58%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar" data-progress="58"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Silver Plan</div>
                                            <div class="progress-amount">18.49%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-orange" data-progress="18.49"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Dimond Plan</div>
                                            <div class="progress-amount">16%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-teal" data-progress="16"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Platinam Plan</div>
                                            <div class="progress-amount">29%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-pink" data-progress="29"></div>
                                        </div>
                                    </div>
                                    <div class="progress-wrap">
                                        <div class="progress-text">
                                            <div class="progress-label">Vibranium Plan</div>
                                            <div class="progress-amount">33%</div>
                                        </div>
                                        <div class="progress progress-md">
                                            <div class="progress-bar bg-azure" data-progress="33"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invest-top-ck mt-auto">
                                    <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
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