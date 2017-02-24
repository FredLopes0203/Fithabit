@extends('layouts.app')

@section('content')
    <div class="finderfirstBackgrounda">
        <div style="width:100%; display: table; vertical-align: bottom">
            <p style="font-size: 26px; width: 50%; color: black; float: left; font-weight: bold;">{{$programtype}} Program</p>
        </div>
        <div class="row">
            <div class="cols-sm-6 col-md-6 col-lg-6" style="padding-left:10px; padding-top: 10px; padding-bottom: 10px; padding-right: 20px">
                <form id="purchaseform" action="{{url('/purchasefinish')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" id="purchaseProgramid" name="purchaseProgramid" value="{{$program->program_id}}">
                    <div class="workoutPanel" style="padding: 30px; height: 360px;">
                        <div style="margin-top: 10px; padding-left: 10px; padding-right: 7px">
                            <div style="display: table; width: 100%">
                                <p style="font-size: 30px; color: black; font-weight: bold; float: left">{{$program->program_name}}</p>
                                <p style="font-size: 22px; margin-top: 10px; color: black; font-weight: bold; float: right">
                                    @if ($program->program_isfree == 1)
                                        FREE
                                    @else
                                        $ {{$program->program_price}}
                                    @endif
                                </p>
                            </div>
                            <div>
                                <img class="img-circle" style="width: 70px;" src="{{asset('images/dashboard/profile2.png')}}" alt="" />
                                <label style="vertical-align: bottom; font-weight: bold; margin-left: 10px; font-size: 20px; margin-top: 5px; padding-top: 5px">by Empire Fitness</label>
                                    @if($program->program_isfree == 1)
                                        <button type="submit" id="btnPurchasefree" style="float: right; margin-top: 16px; margin-bottom: 20px; width: 55px; height: 30px" class="finder-but">ADD</button>
                                    @else
                                        <button type="submit" id="btnPurchase" style="float: right; margin-top: 16px; margin-bottom: 20px; width: 55px; height: 30px" class="finder-but">ADD</button>
                                    @endif

                            </div>
                            <div>
                                <label style="vertical-align: bottom; height: 150px; overflow: auto; margin-left: 10px; margin-right:10px; font-size: 15px; margin-top: 15px; padding-top: 5px">{{$program->program_description}}</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>



            <div class="cols-sm-6 col-md-6 col-lg-6" style="padding-left:10px; padding-top: 10px; padding-bottom: 10px; padding-right: 20px">
                <div class="workoutPanel" style="padding: 30px; height: 360px;">
                    <div style="margin-top: 10px; padding-left: 10px; padding-right: 7px">
                        <div style="width: 100%; text-align: center">
                            <img  style="width: 200px;" src="{{asset('images/home/phone.png')}}" alt="" />
                            <p style="font-size: 30px; color: black; font-weight: bold; margin-top: 20px">Add a program to send<br>to the FitHabit App.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var handler = StripeCheckout.configure({
            key: 'pk_test_HLAbQ2boPjWleS2jINDIr8I5',
            image: 'https://s3.amazonaws.com/stripe-uploads/acct_19q9jgCzyzzCXQlHmerchant-icon-1487810294055-261880392327149.2Rrf78trypZ4EQekAFeW_height640.png',
            locale: 'auto',
            token: function(token) {
                $("#purchaseform").submit();
            }
        });

        document.getElementById('btnPurchase').addEventListener('click', function(e) {
            // Open Checkout with further options:
            handler.open({
                name: 'FitHabit.io',
                description: 'Purchase <?php echo $program->program_name;?>',
                amount: '<?php echo $program->program_price * 100;?>'
            });
            e.preventDefault();
        });

        // Close Checkout on page navigation:
        window.addEventListener('popstate', function() {
            handler.close();
        });
    </script>

@endsection
