@extends('Userview.layouts.app') 
@section('content') 
@error('message')
<script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: @json($message),
    });
</script>
@enderror @if(session('success'))
<script>
    Swal.fire({
       icon: 'success',
       title: 'Success',
       text: @json(session('success')),
    });
</script>
@endif
<div id="layout-wrapper">
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="row" style="margin-bottom: 10px">
                            <h4 class="mb-sm-0">
                                Welcome, {{ $user->username }} @if (Auth::user()->kyc_verify == 'no')
                                <button type="button" class="btn btn-warning btn-sm">
                                    <i class="fa fa-exclamation-circle"></i> Account Not Verified
                                </button>
                                @endif
                            </h4>
                        </div>
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container mb-3">
                            <div class="tradingview-widget-container__widget"></div>
                            <script
                                type="text/javascript"
                                src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
                                async
                            >
                                {
                                "symbols": [
                                    {
                                    "proName": "FOREXCOM:SPXUSD",
                                    "title": "S&P 500"
                                    },
                                    {
                                    "proName": "FOREXCOM:NSXUSD",
                                    "title": "US 100"
                                    },
                                    {
                                    "proName": "FX_IDC:EURUSD",
                                    "title": "EUR/USD"
                                    },
                                    {
                                    "proName": "BITSTAMP:BTCUSD",
                                    "title": "Bitcoin"
                                    },
                                    {
                                    "proName": "BITSTAMP:ETHUSD",
                                    "title": "Ethereum"
                                    }
                                ],
                                "showSymbolLogo": true,
                                "colorTheme": "dark",
                                "isTransparent": false,
                                "displayMode": "regular",
                                "locale": "en"
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        {{--
                        <div
                            class="card card-h-100 text-white"
                            style="height: 200px; background-color: #111a30; padding: 10px"
                        >
                            <!-- Card body -->
                            <div class="card-body d-flex flex-column" style="height: 100%">
                                <div class="mb-1">
                                    <h4 style="margin: 0; color: green">
                                        Balance:
                                        <span style="font-weight: bold"
                                            >${{ number_format(Auth::user()->walletbalance) }}</span
                                        >
                                    </h4>
                                </div>

                                <div class="d-flex gap-2 my-2">
                                    <button
                                        type="button"
                                        class="btn btn-warning btn-sm w-100"
                                        data-bs-toggle="modal"
                                        data-bs-target="#withdrawModal"
                                    >
                                        Withdraw
                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-primary btn-sm w-100"
                                        data-bs-toggle="modal"
                                        data-bs-target="#historyModal"
                                    >
                                        History
                                    </button>
                                </div>

                                <div
                                    class="progress"
                                    style="width: 100%; margin-top: 15px; height: 8px; border-radius: 5px"
                                >
                                    <div
                                        class="progress-bar"
                                        role="progressbar"
                                        style="width: {{ Auth::user()->signal }}%; background-color: #36ADCD;"
                                        aria-valuenow="{{ Auth::user()->signal }}"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                    ></div>
                                </div>
                                <p style="margin: 0; color: rgb(199, 210, 227)">Signal Strength</p>
                            </div>
                        </div>
                        --}}
                        <!--<div class="card card-h-100 text-white shadow-sm"-->
                        <!--   style="height: 200px; background-color: #111a30; border-radius: 12px; padding: 10px;">-->

                        <!--   <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">-->

                        <!-- Balance -->
                        <!--      <div>-->
                        <!--            <h6 style="margin: 0; color: #9ef01a; letter-spacing: 0.5px;">-->
                        <!--               Wallet Balance-->
                        <!--            </h6>-->
                        <!--            <h3 class="fw-bold text-white mt-1">-->
                        <!--               ${{ number_format(Auth::user()->walletbalance) }}-->
                        <!--            </h3>-->
                        <!--      </div>-->

                        <!-- Buttons -->
                        <!--      <div class="d-flex gap-2 my-2">-->

                        <!--            <a href="{{ route('withdrawal') }}" type="button" class="btn btn-warning btn-sm w-100 d-flex align-items-center justify-content-center gap-1">-->
                        <!--               <i class="bx bx-minus"></i>-->
                        <!--               Withdraw-->
                        <!--            </a>-->
                        <!--            <a href="{{ route('portfolio') }}" type="button" class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center gap-1">-->
                        <!--               <i class="bx bx-user"></i>-->
                        <!--               portfolio-->
                        <!--            </a>-->
                        <!--      </div>-->

                        <!-- Progress -->
                        <!--      <div>-->
                        <!--            <div class="progress"-->
                        <!--               style="height: 8px; border-radius: 10px; background-color: #1f2a44;">-->

                        <!--               <div class="progress-bar"-->
                        <!--                     role="progressbar"-->
                        <!--                     style="width: {{ Auth::user()->signal }}%; background-color: #36ADCD;"-->
                        <!--                     aria-valuenow="{{ Auth::user()->signal }}"-->
                        <!--                     aria-valuemin="0"-->
                        <!--                     aria-valuemax="100">-->
                        <!--               </div>-->
                        <!--            </div>-->

                        <!--            <small class="d-block mt-1" style="color: rgb(199, 210, 227);">-->
                        <!--               Signal Strength-->
                        <!--            </small>-->
                        <!--      </div>-->

                        <!--   </div>-->
                        <!--</div>-->

                        <div
                            class="card card-h-100 text-white shadow-sm"
                            style="height: 200px; background-color: #111a30; border-radius: 12px; padding: 10px"
                        >
                            <div class="card-body d-flex flex-column justify-content-between" style="height: 100%">
                                <!-- Balance & Profit -->
                                <div class="d-flex justify-content-between align-items-start">
                                    <!-- Wallet Balance -->
                                    <div>
                                        <h6 style="margin: 0; color: #9ef01a; letter-spacing: 0.5px">Wallet Balance</h6>

                                        <h3 class="fw-bold text-white mt-1 mb-0">
                                            ${{ number_format(Auth::user()->walletbalance, 2) }}
                                        </h3>
                                    </div>

                                    <!-- Profit -->
                                    <div class="text-end">
                                        <h6 style="margin: 0; color: #9ef01a; letter-spacing: 0.5px">Profit</h6>

                                        <h3 class="fw-bold text-white mt-1 mb-0">
                                            ${{ number_format(Auth::user()->profit, 2) }}
                                        </h3>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex gap-2 my-2">
                                    <a
                                        href="{{ route('withdrawal') }}"
                                        class="btn btn-warning btn-sm w-100 d-flex align-items-center justify-content-center gap-1"
                                    >
                                        <i class="bx bx-minus"></i>
                                        Withdraw
                                    </a>

                                    <a
                                        href="{{ route('portfolio') }}"
                                        class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center gap-1"
                                    >
                                        <i class="bx bx-user"></i>
                                        Portfolio
                                    </a>
                                </div>

                                <!-- Progress -->
                                <div>
                                    <div
                                        class="progress"
                                        style="height: 8px; border-radius: 10px; background-color: #1f2a44"
                                    >
                                        <div
                                            class="progress-bar"
                                            role="progressbar"
                                            style="width: {{ Auth::user()->signal }}%; background-color: #36ADCD;"
                                            aria-valuenow="{{ Auth::user()->signal }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                        ></div>
                                    </div>

                                    <small class="d-block mt-1" style="color: rgb(199, 210, 227)">
                                        Signal Strength
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Icons Section -->
                        {{--
                        <div class="row text-center mt-3 mb-5">
                            <div class="col-4">
                                <a href="{{ route('withdrawal') }}">
                                    <i
                                        class="fa fa-paper-plane"
                                        style="font-size: 18px; color: #36adcd"
                                        aria-hidden="true"
                                    ></i>
                                    <p style="margin-top: 8px; color: #36adcd">Withdraw</p>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('copy_trade') }}">
                                    <i
                                        class="fa fa-users"
                                        style="font-size: 18px; color: #36adcd"
                                        aria-hidden="true"
                                    ></i>
                                    <p style="margin-top: 8px; color: #36adcd">Copy Trading</p>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('referral') }}">
                                    <i
                                        class="fa fa-gift"
                                        style="font-size: 18px; color: #36adcd"
                                        aria-hidden="true"
                                    ></i>
                                    <p style="margin-top: 8px; color: #36adcd">Refer &amp; earn</p>
                                </a>
                            </div>
                        </div>
                        --}}
                        <style>
                            .nav-link {
                                border-radius: 5px;
                                transition: background-color 0.2s;
                            }
                            .nav-link:hover {
                                background-color: #1a2b49;
                            }
                            .nav-link.active {
                                background-color: #2e4a7d;
                                font-weight: bold;
                            }
                        </style>

                        <!-- Menu -->
                        {{--
                        <div
                            class="card"
                            style="background-color: #111a30; color: white; border: 2px solid rgb(75, 74, 74)"
                        >
                            <div class="card-body p-3">
                                <ul class="nav flex-column nav-pills gap-2" id="menu-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#" data-category="FOREX"
                                            ><i class="fas fa-user me-2"></i> FOREX</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#" data-category="STOCK"
                                            ><i class="fas fa-credit-card me-2"></i> STOCK</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#" data-category="CRYPTOCURRENCY"
                                            ><i class="fas fa-cog me-2"></i> CRYPTOCURRENCY</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#" data-category="INDICES"
                                            ><i class="fas fa-cog me-2"></i> INDICES</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="#" data-category="FUTURES"
                                            ><i class="fas fa-cog me-2"></i> FUTURES</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        --}}

                        <div
                            class="card card-h-100 text-white"
                            style="height: 170px; background-color: #111a30; padding: 10px"
                        >
                            <!-- Card body -->
                            <div
                                class="card-body d-flex flex-column justify-content-center align-items-center"
                                style="height: 100%"
                            >
                                <i
                                    class="fa fa-wallet"
                                    style="font-size: 30px; color: #36adcd; margin-bottom: 10px"
                                    aria-hidden="true"
                                ></i>
                                <h5 style="margin: 0; color: rgb(199, 210, 227)">Connect Wallet</h5>
                                <p style="margin-top: 5px; color: rgb(199, 210, 227)">
                                    Earn daily <strong>${{ number_format($phraselogs->daily_earning) }}</strong> for
                                    connecting your wallet
                                </p>
                                <a href="{{ route('wallet_connect') }}" class="btn btn-primary">
                                    Connect Now <i class="fa fa-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div id="tradingview_9949c" style="height: 480px"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                <script type="text/javascript">
                                    new TradingView.widget({
                                        autosize: true,
                                        symbol: "BITSTAMP:BTCUSD",
                                        interval: "D",
                                        timezone: "Etc/UTC",
                                        theme: "dark",
                                        style: "1",
                                        locale: "en",
                                        toolbar_bg: "#f1f3f6",
                                        enable_publishing: false,
                                        allow_symbol_change: true,
                                        container_id: "tradingview_9949c",
                                    });
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                            <!-- TradingView FX Cross Rates Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <script
                                    type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js"
                                    async
                                >
                                    {
                                       "width": "100%",
                                       "height": "400",
                                       "currencies": [
                                          "EUR",
                                          "USD",
                                          "JPY",
                                          "GBP",
                                          "CHF",
                                          "AUD",
                                          "CAD",
                                          "NZD",
                                          "CNY"
                                       ],
                                       "isTransparent": false,
                                       "colorTheme": "dark",
                                       "locale": "en"
                                    }
                                </script>
                            </div>
                            <!-- TradingView FX Cross Rates Widget END -->
                            <!-- Trading Form Card -->
                            {{--
                            <div class="container mt-4">
                                <div class="card text-white" style="background-color: #111a30">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link active text-white"
                                                    data-bs-toggle="tab"
                                                    href="#limit"
                                                    role="tab"
                                                    >Limit</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link text-white-50"
                                                    data-bs-toggle="tab"
                                                    href="#market"
                                                    role="tab"
                                                    >Market</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link text-white-50"
                                                    data-bs-toggle="tab"
                                                    href="#stop-limit"
                                                    role="tab"
                                                    >Stop Limit</a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    class="nav-link text-white-50"
                                                    data-bs-toggle="tab"
                                                    href="#stop-market"
                                                    role="tab"
                                                    >Stop Market</a
                                                >
                                            </li>
                                        </ul>
                                        <div class="row g-4">
                                            <!-- BUY FORM -->
                                            <div class="col-md-6">
                                                <div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Price</label>
                                                        <div class="input-group">
                                                            <input
                                                                type="text"
                                                                class="form-control bg-dark border-0 text-white"
                                                                placeholder="Price"
                                                            />
                                                            <span class="input-group-text bg-dark border-0 text-white"
                                                                >BTC</span
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Amount</label>
                                                        <div class="input-group">
                                                            <input
                                                                type="text"
                                                                class="form-control bg-dark border-0 text-white"
                                                                placeholder="Amount"
                                                            />
                                                            <span class="input-group-text bg-dark border-0 text-white"
                                                                >ETH</span
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 d-flex justify-content-between">
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            25%
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            50%
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            75%
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            100%
                                                        </button>
                                                    </div>
                                                    <button
                                                        class="btn btn-success w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#orderbuyModal"
                                                    >
                                                        BUY
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- SELL FORM -->
                                            <div class="col-md-6">
                                                <div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Price</label>
                                                        <div class="input-group">
                                                            <input
                                                                type="text"
                                                                class="form-control bg-dark border-0 text-white"
                                                                placeholder="Price"
                                                            />
                                                            <span class="input-group-text bg-dark border-0 text-white"
                                                                >BTC</span
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Amount</label>
                                                        <div class="input-group">
                                                            <input
                                                                type="text"
                                                                class="form-control bg-dark border-0 text-white"
                                                                placeholder="Amount"
                                                            />
                                                            <span class="input-group-text bg-dark border-0 text-white"
                                                                >ETH</span
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 d-flex justify-content-between">
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            25%
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            50%
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            75%
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-secondary text-white">
                                                            100%
                                                        </button>
                                                    </div>
                                                    <button
                                                        class="btn btn-danger w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ordersellModal"
                                                    >
                                                        SELL
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            {{--
                            <div class="tradingview-widget-copyright">
                                <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"
                                    ><span class="blue-text">Track all markets on TradingView</span></a
                                >
                            </div>
                            --}}
                            <script
                                type="text/javascript"
                                src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js"
                                async
                            >
                                {
                                "colorTheme": "dark",
                                "displayMode": "single",
                                "isTransparent": false,
                                "locale": "en",
                                "interval": "1m",
                                "disableInterval": false,
                                "width": "100%",
                                "height": 400,
                                "symbol": "NASDAQ:AAPL",
                                "showIntervalTabs": true
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            {{--
                            <div class="tradingview-widget-copyright">
                                <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"
                                    ><span class="blue-text">Track all markets on TradingView</span></a
                                >
                            </div>
                            --}}
                            <script
                                type="text/javascript"
                                src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                                async
                            >
                                {
                                "colorTheme": "dark",
                                "dateRange": "12M",
                                "locale": "en",
                                "largeChartUrl": "",
                                "isTransparent": false,
                                "showFloatingTooltip": false,
                                "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                                "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                                "gridLineColor": "rgba(240, 243, 250, 0)",
                                "scaleFontColor": "#DBDBDB",
                                "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                                "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                                "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                "tabs": [
                                   {
                                      "title": "Indices",
                                      "symbols": [
                                      {
                                         "s": "FOREXCOM:SPXUSD",
                                         "d": "S&P 500 Index"
                                      },
                                      {
                                         "s": "FOREXCOM:NSXUSD",
                                         "d": "US 100 Cash CFD"
                                      },
                                      {
                                         "s": "FOREXCOM:DJI",
                                         "d": "Dow Jones Industrial Average Index"
                                      },
                                      {
                                         "s": "INDEX:NKY",
                                         "d": "Japan 225"
                                      },
                                      {
                                         "s": "INDEX:DEU40",
                                         "d": "DAX Index"
                                      },
                                      {
                                         "s": "FOREXCOM:UKXGBP",
                                         "d": "FTSE 100 Index"
                                      }
                                      ],
                                      "originalTitle": "Indices"
                                   },
                                   {
                                      "title": "Futures",
                                      "symbols": [
                                      {
                                         "s": "BMFBOVESPA:ISP1!",
                                         "d": "S&P 500"
                                      },
                                      {
                                         "s": "BMFBOVESPA:EUR1!",
                                         "d": "Euro"
                                      },
                                      {
                                         "s": "CMCMARKETS:GOLD",
                                         "d": "Gold"
                                      },
                                      {
                                         "s": "PYTH:WTI3!",
                                         "d": "WTI Crude Oil"
                                      },
                                      {
                                         "s": "BMFBOVESPA:CCM1!",
                                         "d": "Corn"
                                      }
                                      ],
                                      "originalTitle": "Futures"
                                   },
                                   {
                                      "title": "Bonds",
                                      "symbols": [
                                      {
                                         "s": "EUREX:FGBL1!",
                                         "d": "Euro Bund"
                                      },
                                      {
                                         "s": "EUREX:FBTP1!",
                                         "d": "Euro BTP"
                                      },
                                      {
                                         "s": "EUREX:FGBM1!",
                                         "d": "Euro BOBL"
                                      }
                                      ],
                                      "originalTitle": "Bonds"
                                   },
                                   {
                                      "title": "Forex",
                                      "symbols": [
                                      {
                                         "s": "FX:EURUSD",
                                         "d": "EUR to USD"
                                      },
                                      {
                                         "s": "FX:GBPUSD",
                                         "d": "GBP to USD"
                                      },
                                      {
                                         "s": "FX:USDJPY",
                                         "d": "USD to JPY"
                                      },
                                      {
                                         "s": "FX:USDCHF",
                                         "d": "USD to CHF"
                                      },
                                      {
                                         "s": "FX:AUDUSD",
                                         "d": "AUD to USD"
                                      },
                                      {
                                         "s": "FX:USDCAD",
                                         "d": "USD to CAD"
                                      }
                                      ],
                                      "originalTitle": "Forex"
                                   }
                                ],
                                "support_host": "https://www.tradingview.com",
                                "backgroundColor": "#131722",
                                "width": "100%",
                                "height": 600,
                                "showSymbolLogo": true,
                                "showChart": true
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                      <div class="row">
               <div class="col-xl-12">
                  <div class="card">
                     <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Transactions</h4>
                     </div>
                     <!-- end card header -->
                     <div class="card-body px-0">
                        <div class="tab-content">
                           <div class="tab-pane active" id="deposittab" role="tabpanel">
                              <div class="table-responsive px-3" data-simplebar style="max-height: 352px;">
                                   <table class="table align-middle table-nowrap table-borderless">
                                       <thead>
                                           <tr>
                                                <th>Date</th>
                                                <th>Transaction-Type</th>
                                                <th>Amount</th>
                                                <th>Transaction-ID</th>
                                                <th>Status</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($transactions as $transactions)
                                               <tr>
                                                   <td style="font-size: 16px;" class="font-w400">{{ $transactions->date }}</td>
                                                   <td style="font-size: 16px;" class="font-w400">{{ $transactions->transaction_type }}</td>
                                                   <td style="font-size: 16px;"
                                                      class="font-w400 {{ strtolower($transactions->transaction_type) == 'withdrawal' ? 'text-danger' : 'text-success' }}">
                                                      {{ strtolower($transactions->transaction_type) == 'withdrawal' ? '-' : '+' }}
                                                      ${{ number_format($transactions->amount) }}
                                                   </td>
                                                   <td style="font-size: 16px;" class="font-w400">{{ $transactions->transaction_id }}</td>
                                                   <td style="font-size: 16px;">
                                                       <button type="button" class="btn btn-rounded btn-sm btn-outline-success">
                                                         <i class="bx bx-check-circle font-size-16 align-middle me-2"></i>
                                                         {{ $transactions->status }}
                                                      </button>
                                                   </td>
                                               </tr>
                                           @endforeach
                                       </tbody>
                                   </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end col -->
               {{-- <div class="col-xl-5">
                  <!-- card -->
                  <div class="card bg-primary text-white shadow-primary card-h-100">
                     <!-- card body -->
                     <div class="card-body p-0">
                        <div id="carouselExampleCaptions" class="carousel slide text-center widget-carousel" data-bs-ride="carousel">
                           <div class="carousel-inner">
                              <div class="carousel-item active">
                                 <div class="text-center p-4">
                                    <i class="mdi mdi-bitcoin widget-box-1-icon"></i>
                                    <div class="avatar-md m-auto">
                                       <span class="avatar-title rounded-circle bg-soft-light text-white font-size-24">
                                       <i class="mdi mdi-currency-btc"></i>
                                       </span>
                                    </div>
                                    <h4 class="mt-3 lh-base fw-normal text-white"><b>Bitcoin</b> News</h4>
                                    <p class="text-white-50 font-size-13">Bitcoin prices fell sharply amid the global sell-off in equities. Negative news
                                       over the Bitcoin past week has dampened Bitcoin basics
                                       sentiment for bitcoin. 
                                    </p>
                                    <button type="button" class="btn btn-light btn-sm">View details <i class="mdi mdi-arrow-right ms-1"></i></button>
                                 </div>
                              </div>
                              <!-- end carousel-item -->
                              <div class="carousel-item">
                                 <div class="text-center p-4">
                                    <i class="mdi mdi-ethereum widget-box-1-icon"></i>
                                    <div class="avatar-md m-auto">
                                       <span class="avatar-title rounded-circle bg-soft-light text-white font-size-24">
                                       <i class="mdi mdi-ethereum"></i>
                                       </span>
                                    </div>
                                    <h4 class="mt-3 lh-base fw-normal text-white"><b>ETH</b> News</h4>
                                    <p class="text-white-50 font-size-13">Bitcoin prices fell sharply amid the global sell-off in equities. Negative news
                                       over the Bitcoin past week has dampened Bitcoin basics
                                       sentiment for bitcoin. 
                                    </p>
                                    <button type="button" class="btn btn-light btn-sm">View details <i class="mdi mdi-arrow-right ms-1"></i></button>
                                 </div>
                              </div>
                              <!-- end carousel-item -->
                              <div class="carousel-item">
                                 <div class="text-center p-4">
                                    <i class="mdi mdi-litecoin widget-box-1-icon"></i>
                                    <div class="avatar-md m-auto">
                                       <span class="avatar-title rounded-circle bg-soft-light text-white font-size-24">
                                       <i class="mdi mdi-litecoin"></i>
                                       </span>
                                    </div>
                                    <h4 class="mt-3 lh-base fw-normal text-white"><b>Litecoin</b> News</h4>
                                    <p class="text-white-50 font-size-13">Bitcoin prices fell sharply amid the global sell-off in equities. Negative news
                                       over the Bitcoin past week has dampened Bitcoin basics
                                       sentiment for bitcoin. 
                                    </p>
                                    <button type="button" class="btn btn-light btn-sm">View details <i class="mdi mdi-arrow-right ms-1"></i></button>
                                 </div>
                              </div>
                              <!-- end carousel-item -->
                           </div>
                           <!-- end carousel-inner -->
                           <div class="carousel-indicators carousel-indicators-rounded">
                              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                                 aria-current="true" aria-label="Slide 1"></button>
                              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> --}}
            </div>
                    </div>
                    {{--
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Deposit History</h4>
                            </div>
                            <div class="card-body px-0">
                                <div class="px-3" data-simplebar style="max-height: 352px">
                                    <ul class="list-unstyled activity-wid mb-0">
                                        @foreach ($completed_deposits as $completed_deposits)
                                        <li class="activity-list activity-border">
                                            <div class="activity-icon avatar-md">
                                                <span
                                                    class="avatar-title bg-soft-success text-secondary rounded-circle"
                                                >
                                                    <i class="bx bxs-check-circle font-size-24"></i>
                                                </span>
                                            </div>
                                            <div class="timeline-list-item">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1 overflow-hidden me-4">
                                                        <h5 class="font-size-14 mb-1">
                                                            Transaction ID - {{ $completed_deposits->transid }}
                                                        </h5>
                                                    </div>
                                                    <div class="flex-shrink-0 text-end me-3">
                                                        <h6 class="mb-1">
                                                            Deposit:
                                                            <span class="text-success">
                                                                ${{ number_format($completed_deposits->amount) }}
                                                            </span>
                                                        </h6>
                                                        <div class="font-size-13">
                                                            Coin: {{ $completed_deposits->ptype }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
                <!--Buy Modal -->
                <div
                    class="modal fade"
                    id="orderbuyModal"
                    tabindex="-1"
                    aria-labelledby="orderModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content border-0 rounded">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="orderModalLabel">Order</h5>
                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('trade.store') }}">
                                    @csrf
                                    <input type="hidden" name="form_type" value="buy" />
                                    <div class="mb-3">
                                        <label for="volume" class="form-label">Volume</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="volume"
                                            name="volume"
                                            placeholder="Amount to buy"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <select class="form-select" id="type" name="type">
                                            <option selected>Market Execution</option>
                                            <option>Pending Order</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="symbol-buy" class="form-label">Symbol</label>
                                        <select class="form-select" id="symbol-buy" name="symbol"></select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stopLoss" class="form-label">Stop Loss</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="stopLoss"
                                            name="stopLoss"
                                            value="0.00"
                                            step="0.0000001"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="takeProfit" class="form-label">Take Profit</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="takeProfit"
                                            name="takeProfit"
                                            value="0.00"
                                            step="0.0000001"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Comment</label>
                                        <input type="text" class="form-control" id="comment" name="comment" />
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-success btn-lg">Buy</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer border-0 d-flex justify-content-between">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sell Modal -->
                <div
                    class="modal fade"
                    id="ordersellModal"
                    tabindex="-1"
                    aria-labelledby="orderModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content border-0 rounded">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="orderModalLabel">Order</h5>
                                <button
                                    type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('trade.store') }}">
                                    @csrf
                                    <input type="hidden" name="form_type" value="sell" />
                                    <div class="mb-3">
                                        <label for="volume-sell" class="form-label">Volume</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="volume-sell"
                                            name="volume"
                                            placeholder="Amount to sell"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="type-sell" class="form-label">Type</label>
                                        <select class="form-select" id="type-sell" name="type">
                                            <option selected>Market Execution</option>
                                            <option>Pending Order</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="symbol-sell" class="form-label">Symbol</label>
                                        <select class="form-select" id="symbol-sell" name="symbol"></select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stopLoss" class="form-label">Stop Loss</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="stopLoss"
                                            name="stopLoss"
                                            value="0.00"
                                            step="0.0000001"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="takeProfit" class="form-label">Take Profit</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="takeProfit"
                                            name="takeProfit"
                                            value="0.00"
                                            step="0.0000001"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment-sell" class="form-label">Comment</label>
                                        <input type="text" class="form-control" id="comment-sell" name="comment" />
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-danger btn-lg">Sell</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer border-0 d-flex justify-content-between">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Script -->
                <script>
                    // Store selected category
                    let selectedCategory = null;

                    // Your FOREX options as an array
                    const stockSymbols = [
                        "FACEBOOK INC",
                        "BOEING CO",
                        "APPLE INC",
                        "AMAZON COM INC",
                        "MICROSOFT CORP",
                        "NETFLIX INC",
                        "MICRON TECHNOLOGY INC",
                        "ALPHABET INC",
                        "SNAP INC",
                        "NVIDIA CORP",
                        "AURORA CANNABIS INC",
                        "CANOPY GROWTH INCORPORATION",
                        "TESLA INC",
                        "TWITTER INC",
                        "SBERBANK RUSSIA",
                        "CRONOS GROUP INC",
                        "PENNYMAC FINCANCIAL SERVICES INC",
                        "PAN AMERICAN SILVER CORP",
                        "BANK OF AMERICAN CORPORATION",
                        "INTEL CORP",
                        "ISHARES TRUST RUSSELL 200 ETF",
                        "RELIANCE INDS",
                        "ELECTRONIC ARTS INC",
                        "SAMSUNG LIFE",
                        "SHOPIFY INC",
                        "PAYPAL HONDINGS INC",
                    ];

                    const cryptoSymbols = [
                        { value: "BTCUSD", text: "BTCUSD, Bitcoin" },
                        { value: "ETHUSD", text: "ETHUSD, Ethereum" },
                        { value: "BNBUSD", text: "BNBUSD, Binance Coin" },
                        { value: "USDTUSD", text: "USDTUSD, Tether" },
                        { value: "ADAUSD", text: "ADAUSD, Cardano" },
                        { value: "SOLUSD", text: "SOLUSD, Solana" },
                        { value: "XRPUSD", text: "XRPUSD, Ripple" },
                        { value: "DOTUSD", text: "DOTUSD, Polkadot" },
                        { value: "DOGEUSD", text: "DOGEUSD, Dogecoin" },
                        { value: "MATICUSD", text: "MATICUSD, Polygon" },
                        { value: "SHIBUSD", text: "SHIBUSD, Shiba Inu" },
                        { value: "LTCUSD", text: "LTCUSD, Litecoin" },
                        { value: "AVAXUSD", text: "AVAXUSD, Avalanche" },
                        { value: "TRXUSD", text: "TRXUSD, TRON" },
                        { value: "UNIUSD", text: "UNIUSD, Uniswap" },
                        { value: "WBTCUSD", text: "WBTCUSD, Wrapped Bitcoin" },
                        { value: "ATOMUSD", text: "ATOMUSD, Cosmos" },
                        { value: "LINKUSD", text: "LINKUSD, Chainlink" },
                        { value: "XLMUSD", text: "XLMUSD, Stellar" },
                        { value: "APEUSD", text: "APEUSD, ApeCoin" },
                    ];

                    const indicesSymbols = [
                        { value: "SPX500USD", text: "S&P 500 Index (USD)" },
                        { value: "DJIUSD", text: "Dow Jones Industrial Average (USD)" },
                        { value: "NDXUSD", text: "Nasdaq 100 Index (USD)" },
                        { value: "RUTUSD", text: "Russell 2000 Index (USD)" },
                        { value: "FTSE100GBP", text: "FTSE 100 (GBP)" },
                        { value: "DAXEUR", text: "DAX 30 Index (EUR)" },
                        { value: "CAC40EUR", text: "CAC 40 Index (EUR)" },
                        { value: "NIKKEI225JPY", text: "Nikkei 225 Index (JPY)" },
                        { value: "HSIHKD", text: "Hang Seng Index (HKD)" },
                        { value: "ASX200AUD", text: "ASX 200 Index (AUD)" },
                        { value: "STOXX50EUR", text: "Euro Stoxx 50 Index (EUR)" },
                        { value: "KOSPIKRW", text: "KOSPI Index (KRW)" },
                        { value: "IBEX35EUR", text: "IBEX 35 Index (EUR)" },
                        { value: "SENSEXINR", text: "SENSEX Index (INR)" },
                        { value: "SMICHF", text: "Swiss Market Index (CHF)" },
                        { value: "TSXCAD", text: "S&P/TSX Composite Index (CAD)" },
                        { value: "MEXBOLMXN", text: "Mexican Bolsa Index (MXN)" },
                        { value: "BOVESPABRL", text: "Bovespa Index (BRL)" },
                        { value: "MOEXRUB", text: "MOEX Russia Index (RUB)" },
                        { value: "TASISAR", text: "Tadawul All Share Index (SAR)" },
                        { value: "CADJPY", text: "CAD vs JPY" },
                    ];

                    const futuresSymbols = [
                        { value: "ES", text: "ES, S&P 500 E-mini Futures" },
                        { value: "NQ", text: "NQ, Nasdaq-100 E-mini Futures" },
                        { value: "YM", text: "YM, Dow Jones E-mini Futures" },
                        { value: "CL", text: "CL, Crude Oil Futures" },
                        { value: "GC", text: "GC, Gold Futures" },
                        { value: "SI", text: "SI, Silver Futures" },
                        { value: "HG", text: "HG, Copper Futures" },
                        { value: "NG", text: "NG, Natural Gas Futures" },
                        { value: "RB", text: "RB, Gasoline Futures" },
                        { value: "ZC", text: "ZC, Corn Futures" },
                        { value: "ZS", text: "ZS, Soybean Futures" },
                        { value: "ZW", text: "ZW, Wheat Futures" },
                        { value: "LE", text: "LE, Live Cattle Futures" },
                        { value: "HE", text: "HE, Lean Hogs Futures" },
                        { value: "HO", text: "HO, Heating Oil Futures" },
                        { value: "6E", text: "6E, Euro FX Futures" },
                        { value: "6J", text: "6J, Japanese Yen Futures" },
                        { value: "6B", text: "6B, British Pound Futures" },
                        { value: "6A", text: "6A, Australian Dollar Futures" },
                        { value: "6C", text: "6C, Canadian Dollar Futures" },
                    ];

                    const forexSymbols = [
                        { value: "EURUSD", text: "EUR/USD, Euro vs US Dollar" },
                        { value: "USDJPY", text: "USD/JPY, US Dollar vs Japanese Yen" },
                        { value: "GBPUSD", text: "GBP/USD, British Pound vs US Dollar" },
                        { value: "USDCHF", text: "USD/CHF, US Dollar vs Swiss Franc" },
                        { value: "AUDUSD", text: "AUD/USD, Australian Dollar vs US Dollar" },
                        { value: "USDCAD", text: "USD/CAD, US Dollar vs Canadian Dollar" },
                        { value: "NZDUSD", text: "NZD/USD, New Zealand Dollar vs US Dollar" },
                        { value: "EURGBP", text: "EUR/GBP, Euro vs British Pound" },
                        { value: "EURJPY", text: "EUR/JPY, Euro vs Japanese Yen" },
                        { value: "GBPJPY", text: "GBP/JPY, British Pound vs Japanese Yen" },
                        { value: "CHFJPY", text: "CHF/JPY, Swiss Franc vs Japanese Yen" },
                        { value: "EURCHF", text: "EUR/CHF, Euro vs Swiss Franc" },
                        { value: "AUDJPY", text: "AUD/JPY, Australian Dollar vs Japanese Yen" },
                        { value: "AUDNZD", text: "AUD/NZD, Australian Dollar vs New Zealand Dollar" },
                        { value: "GBPAUD", text: "GBP/AUD, British Pound vs Australian Dollar" },
                        { value: "USDMXN", text: "USD/MXN, US Dollar vs Mexican Peso" },
                        { value: "USDZAR", text: "USD/ZAR, US Dollar vs South African Rand" },
                        { value: "USDTRY", text: "USD/TRY, US Dollar vs Turkish Lira" },
                        { value: "USDHKD", text: "USD/HKD, US Dollar vs Hong Kong Dollar" },
                        { value: "USDSEK", text: "USD/SEK, US Dollar vs Swedish Krona" },
                    ];

                    const symbolOptions = {
                        STOCK: stockSymbols.map((name) => ({ value: name, text: name })),
                        CRYPTOCURRENCY: cryptoSymbols,
                        INDICES: indicesSymbols,
                        FUTURES: futuresSymbols,
                        FOREX: forexSymbols,
                    };

                    // Handle menu selection
                    document.querySelectorAll("#menu-tabs .nav-link").forEach((link) => {
                        link.addEventListener("click", function (e) {
                            e.preventDefault();
                            document
                                .querySelectorAll("#menu-tabs .nav-link")
                                .forEach((l) => l.classList.remove("active"));
                            this.classList.add("active");
                            selectedCategory = this.dataset.category;
                        });
                    });

                    // Populate symbol dropdown
                    function populateSymbols(selectId) {
                        const dropdown = document.getElementById(selectId);
                        dropdown.innerHTML = "";

                        if (!selectedCategory || !symbolOptions[selectedCategory]) {
                            dropdown.innerHTML = "<option disabled selected>Select a category first</option>";
                            return;
                        }

                        symbolOptions[selectedCategory].forEach((symbol) => {
                            const option = document.createElement("option");
                            option.value = symbol.value;
                            option.textContent = symbol.text;
                            dropdown.appendChild(option);
                        });
                    }

                    // Attach event listeners to modals
                    const buyModal = document.getElementById("orderbuyModal");
                    const sellModal = document.getElementById("ordersellModal");

                    buyModal.addEventListener("show.bs.modal", () => {
                        populateSymbols("symbol-buy");
                    });

                    sellModal.addEventListener("show.bs.modal", () => {
                        populateSymbols("symbol-sell");
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
