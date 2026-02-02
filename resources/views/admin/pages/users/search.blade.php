@extends('admin.partials.master')
@section('admin_content')
<section id="dashboard-ecommerce">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h4 class="card-title">Get A User Using Referral Or Phone Number</h4>
                    <a href="{{route('admin.customer.index')}}" class="btn btn-primary btn-sm">
                        <i class="bx bx-plus"></i> Customer List
                    </a>
                </div>
                <div class="card-body card-dashboard">
                    <form action="{{route('admin.search.submit')}}" method="get">
                        @csrf
                        <div class="form-group">
                            <label for="ref_id">Search a user using referral code or phone</label>
                            <input type="text" id="ref_id" name="search" class="form-control" placeholder="Enter referral code Or Phone number">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Go for Search</button>
                        </div>
                    </form>
                </div>
            </div>

            @if(isset($user) && !empty($user))
            <div class="card mt-2">
                <div class="card-header pb-0">
                    <h4 class="card-title">User Details</h4>
                </div>
                <div class="card-body card-dashboard">
                    <table class="table table-bordered">
                        <tr><td>User Name</td><td>{{$user->name}}</td></tr>
                        <tr><td>ID</td><td>{{$user->id}}</td></tr>
                        <tr><td>Username</td><td>{{$user->username}}</td></tr>
                        <tr><td>Referral Id</td><td>{{$user->ref_id}}</td></tr>
                        <tr><td>Phone</td><td>{{$user->phone}}</td></tr>
                        <tr><td>Referral By</td><td>{{$user->ref_by ?? '--'}}</td></tr>
                        <tr><td>Email</td><td>{{$user->email}}</td></tr>
                        <tr><td>Status</td><td>{{$user->status}}</td></tr>
                        <tr><td>Created At</td><td>{{$user->created_at}}</td></tr>

                        {{-- BAN/UNBAN --}}
                        <tr>
                            <td>User BAN/UNBAN</td>
                            <td>
                                @if($user->ban_unban == 'unban')
                                    <a href="{{route('admin.user.ban', $user->id)}}" class="btn btn-danger btn-sm" title="Account Ban">
                                        <i class="bx bx-user-minus"></i>
                                    </a>
                                    <span class="text-success">UnBan <i class="bx bx-check"></i></span>
                                @else
                                    <a href="{{route('admin.user.unban', $user->id)}}" class="btn btn-success btn-sm" title="Account UnBan">
                                        <i class="bx bx-user-plus"></i>
                                    </a>
                                    <span class="text-danger">Ban <i class="bx bx-x"></i></span>
                                @endif
                            </td>
                        </tr>

                        {{-- BALANCE ADD --}}
                        <tr>
                            <td>Deposit Balance Add</td>
                            <td>
                                <form action="{{route('admin.user.balance.add')}}" method="GET" class="d-flex gap-2">
                                    @csrf
                                    <span class="mr-2">Rs. {{$user->balance}} </span>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="number" name="balance" placeholder="0" class="form-control w-25">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </form>
                            </td>
                        </tr>

                        {{-- BALANCE CUT --}}
                        <tr>
                            <td>Deposit Balance Cut</td>
                            <td>
                                <form action="{{route('admin.user.balance.minus')}}" method="GET" class="d-flex gap-2">
                                    @csrf
                                    <span class="mr-2">Rs. {{$user->balance}}</span>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="number" name="balance" placeholder="0" class="form-control w-25">
                                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                </form>
                            </td>
                        </tr>

                        {{-- INCOME ADD --}}
                        <tr>
                            <td>Withdrawal Balance Add</td>
                            <td>
                                <form action="{{route('admin.user.add_income')}}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    <span class="mr-2">Rs. {{$user->income}} </span>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="number" name="income" placeholder="0" class="form-control w-25">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </form>
                            </td>
                        </tr>

                        {{-- INCOME CUT --}}
                        <tr>
                            <td>Withdrawal Balance cut</td>
                            <td>
                                <form action="{{route('admin.user.minus_income')}}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    <span class="mr-2">Rs. {{$user->income}} </span>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="number" name="income" placeholder="0" class="form-control w-25">
                                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                </form>
                            </td>
                        </tr>

                        {{-- PASSWORD --}}
                        <tr>
                            <td>Password</td>
                            <td>
                                <form action="{{route('admin.user.ppss')}}" method="GET" class="d-flex gap-2">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="text" name="ppss" placeholder="*****" class="form-control w-25">
                                    <button type="submit" class="btn btn-warning btn-sm">Submit</button>
                                </form>
                            </td>
                        </tr>

                        {{-- WITHDRAW PASSWORD --}}
                        <tr>
                            <td>Withdraw Password</td>
                            <td>
                                <form action="{{route('admin.user.wppss')}}" method="GET" class="d-flex gap-2">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="text" name="wppss" placeholder="*****" class="form-control w-25">
                                    <button type="submit" class="btn btn-warning btn-sm">Submit</button>
                                </form>
                            </td>
                        </tr>

                        {{-- LOGIN USER PANEL --}}
                        <tr>
                            <td>Login Into User Panel</td>
                            <td>
                                <a href="{{route('admin.customer.login', $user->id)}}" target="_blank" class="btn btn-info btn-sm" title="Login Into User Account">
                                    <i class="bx bx-user"></i> Login
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
