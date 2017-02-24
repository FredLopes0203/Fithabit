@extends('layouts.app')

@section('content')

    <div class="dashboardBackground">
        <div class="dashboardContent">
            <div><!--header-->
                <div class="row">
                    <div class="col-sm-4">
                        <p style="margin-bottom:10px;margin-top:20px;margin-left:40px;font-size: 30px; font-weight: bold"><b>Client Overview</b></p>
                    </div>
                    <div class="col-sm-8">
                        <a href=""  class="btnViewWholeData">View full user workout, nutrition data and more on the Fithabit App</a>
                    </div>
                </div>
                <!--split-->
                <div style="border-width: 1px; border-style: solid; margin-left: 30px; margin-right: 30px">
                </div><!--split-->
            </div><!--header-->
            <div><!--Contents-->
                <div class="row">
                    <div class="col-sm-3"><!--profile picture div-->
                        <div style="text-align:center;margin-top:30px;margin-bottom:20px;">
                            <a class="bigProfile" href="{{ url('/') }}"><img class="clientprofile img-circle" src="{{asset('images/dashboard/profile1.png')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-5"><!--status div-->
                        <div style="margin-top: 20px">
                            <p style="font-size: 18px; font-weight: bold; vertical-align: bottom"><b>UserName</b></p>
                            <p style="font-size: 15px; vertical-align: top; margin-top: -10px">Bio</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-3" style="padding-top: 20px">
                                <p style="font-size: 18px; font-weight: bold;"><b>Weight</b></p>
                                <p style="font-size: 32px; font-weight: bold;"><b>130</b></p>
                            </div>
                            <div class="col-sm-3" style="padding-top: 20px; text-align: center">
                                <p style="font-size: 18px; font-weight: bold;"><b>Body Fat</b></p>
                                <p style="font-size: 32px; font-weight: bold;"><b>93%</b></p>
                            </div>
                            <div class="col-sm-3" style="text-align: center;">
                                <p style="font-size: 15px;">workout</p>
                                <div class="workoutchart" data-percent="{{$workoutpercent}}"></div>
                            </div>
                            <div class="col-sm-3" style="text-align: center;">
                                <p style="font-size: 15px;">nutrition</p>
                                <div class="nutritionchart" data-percent="{{$nutritionpercent}}"></div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 30px">
                            <div class="col-sm-3" style="padding-top: 40px">
                                <p style="font-size: 18px; font-weight: bold;"><b>Accuracy</b></p>
                                <p style="font-size: 28px; font-weight: bold;"><b>11.1%</b></p>
                            </div>
                            <div class="col-sm-3" style="padding-top: 40px; text-align: center">
                                <p style="font-size: 18px; font-weight: bold;"><b>FitDays</b></p>
                                <p style="font-size: 28px; font-weight: bold;"><b>12</b></p>
                            </div>
                            <div class="col-sm-3" style="padding-top: 40px; text-align: center">
                                <p style="font-size: 18px; font-weight: bold;"><b>Missed</b></p>
                                <p style="font-size: 28px; font-weight: bold;"><b>0</b></p>
                            </div>
                            <div class="col-sm-3" style="padding-top: 40px; text-align: center">
                                <p style="font-size: 18px; font-weight: bold;"><b>Rest</b></p>
                                <p style="font-size: 28px; font-weight: bold;"><b>103</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding-left: 20px"><!--weekview div-->
                        <div style="padding-left:10px;margin-top: 20px">
                            <p style="font-size: 18px; font-weight: bold; vertical-align: bottom"><b>This Week</b></p>
                        </div>
                        <div style="text-align:center;margin-top:30px;margin-bottom:20px; margin-right: 30px;">
                            <button class="weekview completedday" href="{{ url('/') }}">Mo</button>
                            <button class="weekview missedday" href="{{ url('/') }}">Tu</button>
                            <button class="weekview completedday" href="{{ url('/') }}">We</button>
                            <button class="weekview currentday" href="{{ url('/') }}">Th</button>
                            <button class="weekview futureday" href="{{ url('/') }}">Fr</button>
                            <button class="weekview restday" href="{{ url('/') }}">Sa</button>
                            <button class="weekview restday" href="{{ url('/') }}">Su</button>
                        </div>

                        <div style="margin-top:30px; margin-right: 30px;">
                            <div style="text-align: left" class="col-sm-8">
                                <p style="font-size: 18px; font-weight: bold;"><b>Programs</b></p>
                                <p style="font-size: 18px;">Accelerated Cuts</p>
                            </div>

                            <div class="col-sm-4" style="padding-top:5px; text-align: right;">
                                <p style="font-size: 15px; font-weight: bold;"><b>Start Date</b></p>
                                <p style="font-size: 15px; padding-top:3px; font-weight: bold;"><b>Jan/28/2017</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--scripts-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{asset('js/jquery.circlechart.js')}}"></script>

    <script>
        //$('.demo').percentcircle();

        $('.workoutchart').percentcircle({
            animate : true,
            diameter : 100,
            guage: 2,
            coverBg: '#fff',
            bgColor: '#efefef',
            fillColor: '#27bF61',
            percentSize: '15px',
            percentWeight: 'normal',
        });

        $('.nutritionchart').percentcircle({
            animate : true,
            diameter : 100,
            guage: 2,
            coverBg: '#fff',
            bgColor: '#efefef',
            fillColor: '#27bF61',
            percentSize: '15px',
            percentWeight: 'normal',
        });
    </script>

@endsection