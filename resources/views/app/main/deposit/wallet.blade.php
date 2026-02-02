<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recharge confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('pay')}}/index.css">
    <style>
        input.form-control {
            padding: 28px 8px !important;
            font-size: 26px;
        }
        ul.final_depo a.copy {
            background: #0fdd0f;
            color: #fff;
            padding: 9px 23px;
            border-radius: 0px;
            font-size: 15px;
        }
    </style>
</head>
<body style="background: #10db10;">
<div class="app" style="">
    <div class="header" style="background: transparent">
        <div></div>
        <div></div>
        <div><h3>

            </h3></div>
    </div>

    <?php $ref = strtoupper(\Str::random(3).rand(0,9990).\Str::random(3)) ;?>

    <div class="app_container">
        <ul class="final_depo" style="background: #fff3ec;">
            <li style="display: unset">
                <div>
                    <h3>Bank Name</h3>
                    <input type="text" class="form-control" value="{{$channel->channel}}" disabled>
                </div>
            </li>
            <li style="display: unset;">
                <div>
                    <h3 style="margin-top: 50px;margin-bottom: 20px;">Please copy the account information to transfer.</h3>
                </div>
            </li>

            <li>
                <div><h3>Receipient : <span style="color: #e58305">{{$channel->receiver}}</span></h3></div>
                <div><h3> <a href="javascript:void(0)" class="copy" onclick="copyLink('{{$channel->receiver}}')">Copy</a></h3></div>
            </li>
            <li>
                <div><h3>Account : <span style="color: #e58305">{{$channel->address}}</span></h3></div>
                <div><h3> <a href="javascript:void(0)" class="copy" onclick="copyLink('{{$channel->address}}')">Copy</a></h3></div>
            </li>
            <li>
                <div><h3>Reference : <span style="color: #e58305">{{$ref}}</span> </h3></div>
                <div><h3><a href="javascript:void(0)" class="copy" onclick="copyLink('{{$ref}}')">Copy</a></h3></div>
            </li>
            <li>
                <div><h3>Amount : <span style="color: #e58305">{{price($amount)}}</span></h3></div>
                <div><h3> <a href="javascript:void(0)" class="copy" onclick="copyLink('{{$amount}}')">Copy</a></h3></div>
            </li>
            <li style="display: unset;">
                <div>
                    <form action="{{route('payment_confirmation')}}" method="post">
                        @csrf
                        <input type="hidden" name="amount" value="{{$amount}}">
                        <input type="hidden" name="ref" value="{{$ref}}">
                        <input type="hidden" name="channel_id" value="{{$channel->id}}">


                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="address" placeholder="" name="address">
                            <label for="address">enter your address: </label>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="transaction_id" placeholder="" name="transaction_id">
                            <label for="transaction_id">enter your reference: </label>
                        </div>

                        <div class="form-floating mb-3 mt-3" style="text-align: center">
                            <a href="javascript:void(0)" onclick="confirmPaid()" class="copy">Paid and Submit</a>
                        </div>

                    </form>
                </div>
                <div></div>
            </li>
        </ul>

        <div style="margin-top: 30px;">
            <h4 style="color: #e56405;text-align: left;margin-bottom: 15px;">Payment Guide</h4>
            <p style="color: #FFFFFF;">1. Please Copy the required information and select payment channel for successfully payment.</p>
            <p style="color: #FFFFFF;">2. Go to your e-wallet payment app and payment which is selected amount.</p>
        </div>
    </div>
</div>


<!-- Vertically centered modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="position: relative;">
                <h5 class="modal-title" id="exampleModalLabel">Payment Operating Systems</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWelcomeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalSlider">
                <h3>Note: Ensure you copy the receiver account number before open this system. </h3>


            </div>
            <div class="modal-footer text-center" style="display: unset;" onclick="closeWelcomeModal()">
                <button type="button" class="btn btn-success" data-dismiss="modal">Set All</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="load" style="    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    display: none;
    background: #00000014;">
    <img style="width: 25px;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" src="{{asset('ZKZg.gif')}}" alt="">
</div>

@include('alert-message')
<script>
    function confirmPaid(){
        var address = document.querySelector('input[name="transaction_id"]').value;
        var transaction_id = document.querySelector('input[name="transaction_id"]').value;

        if (address == ''){
            message('Please your payment address.');
            return 0;
        }

        if (transaction_id == ''){
            message('Please enter payment transaction id');
            return 0;
        }

        document.querySelector('.load').style.display='block';
        document.querySelector('form').submit();
    }

    function paymentModal(){
        $('#exampleModal').modal('show');
    }

    function closeWelcomeModal(){
        $('#exampleModal').modal('hide');
    }

    function goCancel(){
        document.querySelector('.load').style.display='block';
        window.location.href='{{route('user.deposit')}}';
    }

    function copyLink(text)
    {
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Copied success..')
    }
</script>

</body>
</html>
