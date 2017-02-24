@extends('layouts.app')

@section('content')
    <div class="finderfirstBackgrounda">
        <div style="width:100%; display: table; vertical-align: bottom">
            <p style="font-size: 26px; width: 50%; color: black; float: left; font-weight: bold;">Workout Programs</p>
            <a href="{{url('/finder/workout')}}" style="font-size:18px; color:blue; float: right; margin-top: 15px">Show all</a>
        </div>
        <div class="row">
            @foreach($workoutprograms as $workout)
                <form action='/purchaseprogram' method="POST">
                    {{csrf_field()}}
                    <input type="hidden" id="purchaseProgramid" name="purchaseProgramid" value="{{$workout->program_id}}">
                <div class="cols-sm-2 col-md-2 col-lg-2" style="padding:10px; margin-bottom: 30px">
                    <div class="workoutPanel" style="padding: 0px">
                        <div style="display: block;
                                      width: 100%;
                                      height: auto;
                                      position: relative;
                                      overflow: hidden;
                                      padding: 75% 0 0 0; text-align: center">
                        <img style="width: 400px; height: 300px; display: block;
                                      max-width: 100%;
                                      max-height: 100%;
                                      position: absolute;
                                      top: 0;
                                      bottom: 0;
                                      left: 0;
                                      right: 0;"
                             @if($workout->program_image == "")
                                src="{{asset('images/dashboard/workoutprogram.png')}}"
                             @else
                                src="{{asset($workout->program_image)}}"
                             @endif
                             alt=""/>
                        </div>
                        <div style="margin-top: 5px; padding-left: 10px; padding-right: 7px">
                            <p style="font-size: 15px; color: black; font-weight: bold;">{{$workout->program_name}}</p>
                            <img class="img-circle" style="width: 15%;" src="{{asset('images/dashboard/profile2.png')}}" alt="" />
                            <label style="vertical-align: bottom; font-weight: bold; margin-left: 10px; font-size: 14px; margin-top: 5px; padding-top: 5px">Empire Fitness</label>
                            <br>
                            <label style="vertical-align: bottom; overflow: auto; margin-left: 10px; margin-right:10px; font-size: 12px; height: 100px; margin-top: 15px; padding-top: 5px">{{$workout->program_description}}</label>

                            <div style="width: 100%; display: table">
                                <p style="font-size: 11px; float:left; color: black; font-weight: bold; margin-top: 20px">Program Length: <?php echo $workout->program_weeks*7;?>days</p>
                                <button type="submit" style="float: right; margin-top: 16px; margin-right: 10px; margin-bottom: 20px" class="finder-but">
                                    @if ($workout->program_isfree == 1)
                                        FREE
                                    @else
                                        $ {{$workout->program_price}}
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            @endforeach
        </div>
    </div>




    <div class="finderfirstBackground">
        <div style="width:100%; display: table; vertical-align: bottom">
            <p style="font-size: 26px; width: 50%; color: black; float: left; font-weight: bold;">Nutrition Programs</p>
            <a href="{{url('/finder/nutrition')}}" style="font-size:18px; color:blue; float: right; margin-top: 15px">Show all</a>
        </div>
        <div class="row">
            @foreach($nutritionprograms as $nutrition)
                <form action='/purchaseprogram' method="POST">
                    {{csrf_field()}}
                    <input type="hidden" id="purchaseProgramid" name="purchaseProgramid" value="{{$nutrition->program_id}}">
                    <div class="cols-sm-2 col-md-2 col-lg-2" style="padding:10px; margin-bottom: 30px">
                        <div class="workoutPanel" style="padding: 0px">
                            <div style="display: block;
                                      width: 100%;
                                      height: auto;
                                      position: relative;
                                      overflow: hidden;
                                      padding: 75% 0 0 0; text-align: center">
                                <img style="width: 400px; height: 300px; display: block;
                                      max-width: 100%;
                                      max-height: 100%;
                                      position: absolute;
                                      top: 0;
                                      bottom: 0;
                                      left: 0;
                                      right: 0;"
                                     @if($nutrition->program_image == "")
                                     src="{{asset('images/dashboard/workoutprogram.png')}}"
                                     @else
                                     src="{{asset($nutrition->program_image)}}"
                                     @endif
                                     alt=""/>
                            </div>
                            <div style="margin-top: 5px; padding-left: 10px; padding-right: 7px">
                                <p style="font-size: 15px; color: black; font-weight: bold;">{{$nutrition->program_name}}</p>
                                <img class="img-circle" style="width: 15%;" src="{{asset('images/dashboard/profile2.png')}}" alt="" />
                                <label style="vertical-align: bottom; font-weight: bold; margin-left: 10px; font-size: 14px; margin-top: 5px; padding-top: 5px">Empire Fitness</label>
                                <br>
                                <label style="vertical-align: bottom; overflow: auto; margin-left: 10px; margin-right:10px; font-size: 12px; height: 100px; margin-top: 15px; padding-top: 5px">{{$nutrition->program_description}}</label>

                                <div style="width: 100%; display: table">
                                    <p style="font-size: 11px; float:left; color: black; font-weight: bold; margin-top: 20px">Program Length: <?php echo $nutrition->program_weeks*7;?>days</p>
                                    <button type="submit" style="float: right; margin-top: 16px; margin-right: 10px; margin-bottom: 20px" class="finder-but">
                                        @if ($nutrition->program_isfree == 1)
                                            FREE
                                        @else
                                            $ {{$nutrition->program_price}}
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <div class="finderfirstBackground">
        <div style="width:100%; display: table; vertical-align: bottom">
            <p style="font-size: 26px; width: 50%; color: black; float: left; font-weight: bold;">Infodoc Programs</p>
            <a href="{{url('/finder/infodoc')}}" style="font-size:18px; color:blue; float: right; margin-top: 15px">Show all</a>
        </div>
        <div class="row">
            @foreach($infodocprograms as $infodoc)
                <form action='/purchaseprogram' method="POST">
                    {{csrf_field()}}
                    <input type="hidden" id="purchaseProgramid" name="purchaseProgramid" value="{{$infodoc->program_id}}">
                    <div class="cols-sm-2 col-md-2 col-lg-2" style="padding:10px; margin-bottom: 30px">
                        <div class="workoutPanel" style="padding: 0px">
                            <div style="display: block;
                                      width: 100%;
                                      height: auto;
                                      position: relative;
                                      overflow: hidden;
                                      padding: 75% 0 0 0; text-align: center">
                                <img style="width: 400px; height: 300px; display: block;
                                      max-width: 100%;
                                      max-height: 100%;
                                      position: absolute;
                                      top: 0;
                                      bottom: 0;
                                      left: 0;
                                      right: 0;"
                                     @if($infodoc->program_image == "")
                                     src="{{asset('images/dashboard/workoutprogram.png')}}"
                                     @else
                                     src="{{asset($infodoc->program_image)}}"
                                     @endif
                                     alt=""/>
                            </div>
                            <div style="margin-top: 5px; padding-left: 10px; padding-right: 7px">
                                <p style="font-size: 15px; color: black; font-weight: bold;">{{$infodoc->program_name}}</p>
                                <img class="img-circle" style="width: 15%;" src="{{asset('images/dashboard/profile2.png')}}" alt="" />
                                <label style="vertical-align: bottom; font-weight: bold; margin-left: 10px; font-size: 14px; margin-top: 5px; padding-top: 5px">Empire Fitness</label>
                                <br>
                                <label style="vertical-align: bottom; overflow: auto; margin-left: 10px; margin-right:10px; font-size: 12px; height: 100px; margin-top: 15px; padding-top: 5px">{{$infodoc->program_description}}</label>

                                <div style="width: 100%; display: table">
                                    <p style="font-size: 11px; float:left; color: black; font-weight: bold; margin-top: 20px">Program Length: <?php echo $infodoc->program_weeks*7;?>days</p>
                                    <button type="submit" style="float: right; margin-top: 16px; margin-right: 10px; margin-bottom: 20px" class="finder-but">
                                        @if ($infodoc->program_isfree == 1)
                                            FREE
                                        @else
                                            $ {{$infodoc->program_price}}
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

@endsection
