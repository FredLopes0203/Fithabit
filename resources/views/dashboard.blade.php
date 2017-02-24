@extends('layouts.app')

@section('content')

    <style>
        video {
            margin-top: 10px;
            max-width: 100%;
            height: auto;
            background-color: #0a97b9;
            border-style: solid;
            border-width: 1px;
            margin-bottom: 20px;
        }
    </style>

    <div class="dashboardBackground">
        <div class="dashboardContent">
                <div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 20px">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <div>
                            <p style="margin-bottom:20px;margin-left:20px;font-size: 30px; font-weight: bold"><b>DashBoard</b></p>
                        </div>
                        <div style="margin-bottom:20px;">

                                {!! $chartjs->render() !!}

                        </div>
                        <div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-left:20px;font-size: 20px; font-weight: bold"><b>YTD SignUps</b></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-left:20px;font-size: 20px; font-weight: bold"><b>YTD Revenue</b></p>
                                </div>
                            </div>
                            <div  class="row rowdivider">

                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-left:20px;font-size: 30px; font-weight: bold"><b>2351</b></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-left:20px;font-size: 30px; font-weight: bold"><b>$9511</b></p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div style="margin-top: 10px">
                            <p style="margin-bottom:20px;margin-left:20px;font-size: 18px; font-weight: bold; vertical-align: bottom"><b>This Month</b></p>
                        </div>
                        <div style="margin-top: 40px">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 16px; vertical-align: bottom">Sign Ups</p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="text-align:right;margin-left:20px;font-size: 30px; font-weight: bold"><b>35</b></p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 16px; vertical-align: bottom">Revenue</p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="text-align:right;margin-left:20px;font-size: 30px; font-weight: bold"><b>$9511</b></p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 50px">
                            <p style="margin-bottom:20px;margin-left:20px;font-size: 18px; font-weight: bold; vertical-align: bottom"><b>OverView</b></p>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 16px; vertical-align: bottom">Workout Programs</p>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <p style="text-align:right;margin-left:20px;font-size: 16px;"><b>12</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 16px; vertical-align: bottom">Nutrition Programs</p>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <p style="text-align:right;margin-left:20px;font-size: 16px;"><b>5</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 16px; vertical-align: bottom">Information Programs</p>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <p style="text-align:right;margin-left:20px;font-size: 16px;"><b>80</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <video width="400" controls>
                            <source src="{{asset('videos/test.mp4')}}" type="video/mp4">
                        </video>

                        <div style="margin-bottom: 20px">
                        <label style="word-wrap: break-word; width: 100%">asdfaerkaweir wueroiuqw eoriuqwe oasdawer werqwe rqwerqwerqw eriuqow ieruqowier uoq wieuro qweuroq wiue roqweu roqweiuroqwieruoweiurqowieruqoweiur</label>
                        </div>

                        <div>
                            <label style="word-wrap: break-word; width: 100%">asdfa erkawei rwueroiuqw eoriuqw eoriuqo  wieruqowieruoqwieur oqweuroqw iueroqweuroq weiuroqwieru oweiu rqowieruqoweiur</label>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div id="myModal" name="myModal" class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content" style="background-color: #f3f1f5">
                <button type="button" class="close customed" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="registerModalTitle" id="lineModalLabel">STEP 2 OF 2: <p class="lead"><b>START YOUR FREE 14 DAY TRIAL!</b></p></h3>
                <h3 class="registerModalTitleDescription" id="linemodeldescription"><strong>No contracts, downgrade or cancel your account anytime<br>with a single click from your dashboard...</strong></h3>

                <div class="modal-body">
                    <!-- content goes here -->
                    <form >

                        <div class="modal-form" style="padding: 30px 30px 15px 30px">
                            <label style="margin-bottom:20px; font-size:15px;" for="exampleInputEmail1"><b>Add Credit Card</b></label>
                            <a style="float:right; color: #2a6496" href="#">Why do we ask for your credit card?</a>
                            <div class="form-group">

                                <input type="firstname" class="form-control" id="firstname" placeholder="First name">
                            </div>
                            <div class="form-group">
                                <input type="lastname" class="form-control" id="lastname" placeholder="Last name">
                            </div>
                            <div class="form-group">
                                <input type="cardnum" class="form-control" id="cardnum" placeholder="Credit Card Number">
                            </div>
                            <div class="form-group">
                                <input style="width:69%;" type="expdate" class="form-control" id="expdate" placeholder="Expiration Date">

                                <input style="width:30%; float: right" type="cvvcode" class="form-control" id="cvvcode" placeholder="CVV Code...">
                            </div>
                            <div class="form-group">
                                <input type="zip" class="form-control" id="zip" placeholder="Zip">
                            </div>
                            <label style="width:100%;font-size:15px;margin-top: 15px;text-align: center">Free for 14 days then $0.00 a month until cancelled.</label>
                        </div>
                        <label style="color:#3b366f; font-size:15px;margin-top: 20px; width: 100%; text-align: center">By clicking the button below you agree to our <a href="#" style="color: red">Terms of Service</a></label>
                        <div>
                            <button type="submit" style="width: 99%; height: 50px; background-color: #EE5D4F;color: white; font-weight: bold" class="btn btn-default">CREATE MY FITHABIT PERSONAL TRAINER ACCOUNT NOW</button>
                        </div>
                    </form>
                    <div>
                        <label style="width:100%; text-align:center;color:#3b366f; font-size:15px;margin-top: 30px;" for="exampleInputEmail1">Logged in as {{ Auth::user()->email }}</php><br>Not your user? <a style="color:#3b366f; font-style: italic; font-weight: bold"> Logout</a></label>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        var showmodal = "<?php echo $showmodal;?>";

        if(showmodal == "yes")
        {
            $('#myModal').modal('show');
        }
    </script>
@endsection
