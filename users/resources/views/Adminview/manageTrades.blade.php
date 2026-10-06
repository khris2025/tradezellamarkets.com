@extends('Adminview.layout.app')
@section('content')
@error('message')
   <script>
         Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: @json($message),
      });
   </script>
@enderror
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
                  <h4 class="mb-sm-0 font-size-18">Manage Trades</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Manage Trades</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Manage Trades</h4>
                     <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">
                              Withdrawals 
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
                                        <th>Email</th>
                                        <th>Order type</th>
                                        <th>Type</th>
                                        <th>Symbol</th>
                                        <th>Volume</th>
                                        <th>S/L</th>
                                        <th>T/P</th>
                                        <th>Profit ($)</th>
                                        <th>Status</th>
                                        <th>Transaction-ID</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allTrades as $trade)
                                    <tr>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->id }}</td>
                                        <td>{{ $trade->created_at->format('F j, Y') }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->email }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->order }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->type }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->symbol }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->volume }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->sl }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->tp }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">
                                            <form action="{{ route('update_trade_profit', ['id' => $trade->id]) }}" method="POST" class="d-flex align-items-center">
                                                @csrf
                                                <input type="number" step="any" name="profit" value="{{ $trade->profit }}" class="form-control form-control-sm me-2" style="width: 100px;">
                                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                            </form>
                                        </td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->status }}</td>
                                        <td style="font-size: 16px;" class="font-w400 ">{{ $trade->transaction_id }}</td>
                                        <td style="font-size: 16px;" class="font-w400 "><a href="{{ route('end_trade', ['id' => $trade->id]) }}" class="btn btn-rounded btn-danger">End</a></td>
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