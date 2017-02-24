@extends('layouts.app')

@section('content')       
<section style="margin-top: 80px" id="slider"><!--slider-->
    <div class="container" style="padding-top: 10px">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span style="color: red">FH</span>-Workout</h1>
                                <h2>Workout Program</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get" onclick="window.location = '{{url('/login')}}'">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('images/home/workoutsample.jpg')}}" class="program img-responsive" alt="" />
                                <img src="{{asset('images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span style="color: red">FH</span>-Nutrition</h1>
                                <h2>Nutrition Program</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get" onclick="window.location = '{{url('/login')}}'">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('images/home/nutritionsample.jpg')}}" class="program img-responsive" alt="" />
                                <img src="{{asset('images/home/pricing.png')}}"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span style="color: red">FH</span>-Info</h1>
                                <h2>Info Program</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get"  onclick="window.location = '{{url('/login')}}'">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('images/home/infosample.jpg')}}" class="program img-responsive" alt="" />
                                <img src="{{asset('images/home/pricing.png')}}" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
@endsection