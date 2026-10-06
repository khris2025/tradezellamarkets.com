@extends('Userview.layouts.app')
@section('content')
@if(session('success'))
<script>
   Swal.fire({
      icon: 'success',
      title: 'Success',
      text: @json(session('success')),
   });
</script>
@endif
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">
          <div class="row">
             <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                   <h4 class="mb-sm-0 font-size-18">Trade History</h4>
                   <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="javascript: void(0);">User</a></li>
                         <li class="breadcrumb-item active">Trade History</li>
                      </ol>
                   </div>
                </div>
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container mb-3">
                   <div class="tradingview-widget-container__widget"></div>
                   <script type="text/javascript" src="https://account.tradeverseltd.com/s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
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
                      "colorTheme": "light",
                      "isTransparent": false,
                      "displayMode": "regular",
                      "locale": "en"
                      }
                   </script>
                </div>
             </div>
          </div>
         
          <!-- end row-->
          <div class="row">
             <div class="col-xl-12">
                <div class="card">
                   <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Trade History</h4>
                      <div class="flex-shrink-0">
                         <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                            <li class="nav-item">
                               <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                               Trade History 
                               </a>
                            </li>
                         </ul>
                         <!-- end nav tabs -->
                      </div>
                   </div>
                   <!-- end card header -->
                   <div class="card-body px-0">
                      <div class="tab-content">
                         <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                            <div class="table-responsive px-3" data-simplebar >
                                 <table id="datatable" class="table nowrap w-100">
                                    <thead>
                                       <tr>
                                          <th>ID</th>
                                          <th>Date</th>
                                          <th>Order type</th>
                                          <th>Type</th>
                                          <th>Symbol</th>
                                          <th>Volume</th>
                                          <th>S/L</th>
                                          <th>T/P</th>
                                          <th>Profit</th>
                                          <th>Status</th>
                                          <th>Transaction-ID</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($myTrades as $myTrade)
                                          <tr>
                                             <td>{{ $myTrade->id }}</td>
                                             <td>{{ $myTrade->created_at->format('F j, Y') }}</td>
                                             <td>{{ $myTrade->order }}</td>
                                             <td>{{ $myTrade->type }}</td>
                                             <td>{{ $myTrade->symbol }}</td>
                                             <td>{{ $myTrade->volume }}</td>
                                             <td>{{ $myTrade->sl }}</td>
                                             <td>{{ $myTrade->tp }}</td>
                                             <td>{{ $myTrade->profit }}</td>
                                             <td style="font-size: 16px;">
                                                @if($myTrade->status == 'Active')
                                                   <button type="button" class="btn btn-rounded btn-sm btn-outline-warning">
                                                      <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i>
                                                      {{ $myTrade->status }}
                                                   </button>
                                                @else
                                                   <button class="btn btn-danger">{{ $myTrade->status }}</button>
                                                   
                                                @endif
                                             </td>
                                             
                                             <td>{{ $myTrade->transaction_id }}</td>
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
            

             







          </div>
       </div>
    </div>
</div>
@endsection