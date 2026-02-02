@extends('admin.partials.master')
@section('admin_content')
<section id="dashboard-ecommerce">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title d-flex justify-content-between">
                        <div>{{ $title }} Withdraw Lists</div>
                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>User Info</th>
                                        <th>Withdraw Info</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>AutoPay</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($withdraws as $key => $row)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <small>
                                                Username: {{ $row->user->realname ?? '--' }} <br>
                                                Mobile No.: {{ $row->user->phone ?? '--' }} <br>
                                                Ref ID: {{ $row->user->ref_id ?? '--' }}
                                            </small>
                                        </td>
                                        <td>
                                            <small>
                                                Name: {{ $row->user->realname ?? '--' }} <br>
                                                Bank Name: {{ $row->user->bank_name ?? '--' }} <br>
                                                Account Number: {{ $row->user->gateway_number ?? '--' }} <br>
                                                IFSC Code: {{ $row->user->ifsc ?? '--' }} <br>
                                                Order ID: {{ $row->oid ?? '--' }}
                                            </small>
                                        </td>
                                        <td>
                                            <small>
                                                Withdraw Amount: {{ price($row->amount) }} <br>
                                                Withdraw Charge: {{ price($row->charge) }} <br>
                                                Return Amount: {{ price($row->final_amount) }}
                                            </small>
                                        </td>
                                        <td>
                                            <small>
                                                @php
                                                    $badge = match($row->status) {
                                                        'pending' => 'badge-warning',
                                                        'approved' => 'badge-success',
                                                        'rejected' => 'badge-danger',
                                                        'processing' => 'badge-primary',
                                                        default => 'badge-secondary'
                                                    };
                                                @endphp
                                                <span class="badge {{ $badge }}" style="font-size: 8px;">
                                                    {{ $row->status }}
                                                </span>
                                            </small>
                                        </td>
                                        <td>
                                            @if($row->status == 'pending' || $row->status == 'processing')
                                                <a href="#" data-toggle="modal" data-target="#myModal{{ $row->id }}" class="btn btn-success btn-sm">Action</a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal{{ $row->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('withdraw.status.change', $row->id) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Action for Withdraw</h4>
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="status">Status <small class="text-info">Change withdraw status: approved, rejected, pending, or processing</small></label>
                                                                        <select name="status" required class="form-control">
                                                                            <option value="approved" @if($row->status == 'approved') selected @endif>Approved</option>
                                                                            <option value="rejected" @if($row->status == 'rejected') selected @endif>Rejected</option>
                                                                            <option value="pending" @if($row->status == 'pending') selected @endif>Pending</option>
                                                                            <option value="processing" @if($row->status == 'processing') selected @endif>Processing</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="submit" value="Submit" class="btn btn-primary">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-info">Action already taken</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->status == 'approved')
                                                <span class="text-success font-weight-bold">Success</span>
                                            @elseif($row->status == 'processing')
                                                <span class="text-primary font-weight-bold">Processing...</span>
                                            @elseif($row->status == 'pending')
                                                <form action="/services/payout/withdrawal.php" method="POST" class="mb-1">
                                                    @csrf
                                                    <input type="hidden" name="trx" value="{{ $row->oid }}">
                                                    <input type="hidden" name="account_number" value="{{ $row->user->gateway_number }}">
                                                    <input type="hidden" name="amount" value="{{ $row->final_amount }}">
                                                    <input type="hidden" name="account_name" value="{{ $row->user->realname }}">
                                                    <input type="hidden" name="ifsc_code" value="{{ $row->user->ifsc }}">
                                                    <button type="submit" class="btn btn-primary btn-sm">Watchpay</button>
                                                </form>
                                            @elseif($row->status == 'rejected')
                                                <span class="text-danger font-weight-bold">Rejected</span>
                                            @endif
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
</section>
@endsection
