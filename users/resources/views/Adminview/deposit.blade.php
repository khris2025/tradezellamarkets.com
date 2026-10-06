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
               <h4 class="mb-sm-0 font-size-18">Add deposit</h4>
               <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                     <li class="breadcrumb-item active">Add deposit</li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-sm-12 mt-4">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title">Add deposit</h5>
               </div>
               <div class="card-body">
                  <form method="post" action="{{ route('admin_deposit_action') }}">
                     @csrf
                     <div class="form-row">
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="text-secondary">Email</label>
                              <input type="text" name="email" class="form-control">
                           </div>
                           <div class="form-group col-md-6 ">
                              <label class="text-secondary">Amount</label>
                              <input type="text" name="amount" class="form-control">
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="text-secondary">Payment Type</label>
                              <select name="paymentType" class="form-control">
                                 <option value="">Select Payment Type</option>
                                 <option value="crypto">Crypto</option>
                                 <option value="bank">Bank</option>
                                 <option value="zelle">Zelle</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="text-secondary">Date and Time</label>
                              <input type="datetime-local" name="deposit_datetime" class="form-control">
                           </div>
                        </div>
                        {{-- <div class="row">
                           <div class="form-group col-md-6">
                              <label class="text-secondary">USDT Address (Network ~ TRC20)</label>
                              <input type="text" name="usdt_address_trc20" class="form-control">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="text-secondary">USDT Address (Network ~ BEP20)</label>
                              <input type="text" name="usdt_address_bep20" class="form-control">
                           </div>
                        </div> --}}
                     </div>
                     <div class=" mt-3">
                        <button type="submit" name="" class="btn btn-primary">Update</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection