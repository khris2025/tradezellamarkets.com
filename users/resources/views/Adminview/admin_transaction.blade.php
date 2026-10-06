@extends('Adminview.layout.app') @section('content') @error('message')
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
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Transaction</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Admin</a>
                                </li>
                                <li class="breadcrumb-item active">Add Transaction</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Transaction</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_transaction_action') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="text-secondary">Email</label>
                                            <input type="text" name="email" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="text-secondary">Amount</label>
                                            <input type="text" name="amount" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="text-secondary">Transaction Type</label>
                                            <select name="transactionType" class="form-control">
                                                <option value="">Select Transaction Type</option>
                                                <option value="deposit">Deposit</option>
                                                <option value="withdrawal">Withdrawal</option>
                                                <option value="profit">Profit</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="text-secondary">Date and Time</label>
                                            <input
                                                type="datetime-local"
                                                name="transaction_datetime"
                                                class="form-control"
                                            />
                                        </div>
                                    </div>
                                    {{--
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="text-secondary">USDT Address (Network ~ TRC20)</label>
                                            <input type="text" name="usdt_address_trc20" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="text-secondary">USDT Address (Network ~ BEP20)</label>
                                            <input type="text" name="usdt_address_bep20" class="form-control" />
                                        </div>
                                    </div>
                                    --}}
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body px-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                        <div class="table-responsive px-3" data-simplebar>
                            <table id="datatable" class="table nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Transaction Type</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($alltransactions as $transaction)

                                    <tr>
                                        <td style="font-size: 16px" class="font-w400">{{ $transaction->email }}</td>

                                        <td style="font-size: 16px" class="font-w400">
                                            ${{ number_format($transaction->amount, 2) }}
                                        </td>

                                        <td style="font-size: 16px" class="font-w400">
                                            {{ $transaction->transaction_type }}
                                        </td>

                                        <td style="font-size: 16px" class="font-w400">
                                            {{ $transaction->created_at->format('F j, Y') }}
                                        </td>

                                        <td style="font-size: 16px" class="font-w400">
                                            {{ $transaction->created_at->format('g:i A') }}
                                        </td>

                                        <td>
                                            <form action="{{ route('update_transaction_status') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $transaction->id }}" />

                                                <select name="status" class="form-control">
                                                    <option value="pending" {{ $transaction->
                                                        status == 'pending' ? 'selected' : '' }}> Pending
                                                    </option>

                                                    <option value="success" {{ $transaction->
                                                        status == 'success' ? 'selected' : '' }}> Success
                                                    </option>

                                                    <option value="failed" {{ $transaction->
                                                        status == 'failed' ? 'selected' : '' }}> Failed
                                                    </option>
                                                </select>

                                                <td>
                                                    <button type="submit" class="btn btn-rounded btn-primary">
                                                        Update
                                                    </button>
                                                </td>
                                            </form>
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

    @endsection
</div>
