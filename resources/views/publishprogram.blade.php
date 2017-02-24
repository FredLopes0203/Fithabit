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
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div style="margin-top: 10px">
                            <p style="margin-bottom:20px;margin-left:20px;font-size: 22px; font-weight: bold"><b>Product Image</b></p>
                        </div>
                        <div style="text-align:center;margin-bottom:20px;">

                            <div id="imgdiv" style="border-style:solid; border-width:1px;display: block;
                                                                          width: 100%;
                                                                          height: auto;
                                                                          position: relative;
                                                                          overflow: hidden;
                                                                          padding: 75% 0 0 0; text-align: center">
                                <img class="product-image" style="width: 400px; height: 300px; display: block;
                                                                          max-width: 100%;
                                                                          max-height: 100%;
                                                                          position: absolute;
                                                                          top: 0;
                                                                          bottom: 0;
                                                                          left: 0;
                                                                          right: 0; margin-right: auto; margin-left: auto" src="{{asset($program->program_image)}}" alt="" />

                            </div>
                        </div>
                        <!--<div style="text-align:center;margin-bottom:20px;">
                            <p style="margin-top:20px;font-size: 20px; font-weight: bold"><b>upload</b></p>                           
                        </div>-->
                    </div>

                    <div class="col-sm-5 col-md-5 col-lg-5">                        
                        <div style="margin-top: 10px">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 20px; vertical-align: bottom">Program Name</p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <p style="text-align:right;margin-left:20px;font-size: 20px; font-weight: bold"><b>Price</b></p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <p style="text-align:right;margin-left:20px;font-size: 20px; font-weight: bold"><b>Type</b></p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 10px">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 20px; vertical-align: bottom">{{$program->program_name}}</p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <p style="text-align:right;margin-left:20px;font-size: 20px; font-weight: bold"><b>{{($program->program_isfree == 1 ? "Free": "$ ".$program->program_price)}}</b></p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <p style="text-align:right;margin-left:20px;font-size: 20px; font-weight: bold"><b>{{($program->program_type == 1 ? "Public": ($program->program_type == 2 ? "Custom":"Internal"))}}</b></p>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 20px">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 20px; vertical-align: bottom">Product Description</p>
                                
                                    <p style="margin-left:20px;font-size: 16px;">{{$program->program_description}}</p>
                                </div>
                            </div>
                        </div>
                                               
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div>
                            <form id="publishForm" action="{{url($publishurl)}}" method="post">
                                {!! csrf_field() !!}
                                <button type="submit" id="btnPublish" class="product-but publish-but">Publish</button>
                            </form>

                            <button type="button" class="product-but edit-but" onclick="window.location='{{ url($backurl) }}'">Edit</button>

                            <form id="DeleteForm" action="{{url($deleteurl)}}" method="post">
                                {!! csrf_field() !!}
                                <button type="submit" name="btnDelete" id="btnDelete" class="product-but delete-but">Delete</button>
                            </form>
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
    <script>
        $('#publishForm').submit(function(event) {
            var publishable = "<?php echo $publishable;?>";
            event.preventDefault();
            var box = bootbox.confirm({
                title: "Publish Program?",
                message: "Do you want to publish program?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> OK'
                    }
                },
                callback: function (result) {
                    if(result == true)
                    {
                        if(publishable == "no")
                        {
                            $("#publishForm")[0].submit();
                        }
                        else
                        {
                            showAlert("Not complete exercise info yet.");
                            event.preventDefault();
                        }
                    }
                    else
                    {
                        event.preventDefault();
                    }
                }
            });
            box.find('.modal-content').css({'background-color': '#efe4b0', 'text-align':'center', 'font-weight' : 'bold', color: '#F00', 'font-size': '25px'} );
            box.find('.modal-footer').css({'text-align':'center', 'height':'70px'});
            box.find(".btn-default").removeClass("btn-default").css({'width':'100px', 'height':'40px', 'background-color': 'white', 'font-weight' : 'bold', color: '#F00', 'font-size': '20px'});
            box.find(".btn-primary").removeClass("btn-primary").css({'width':'100px', 'height':'40px', 'margin-left':'50px', 'background-color': '#61ce7b', 'font-weight' : 'bold', color: '#F00', 'font-size': '20px'});
        });


        $('#DeleteForm').submit(function(event) {
            var publishable = "<?php echo $publishable;?>";
            event.preventDefault();
            var box = bootbox.confirm({
                title: "Remove Program?",
                message: "Do you want to delete program?",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> OK'
                    }
                },
                callback: function (result) {
                    if(result == true)
                    {
                        $("#DeleteForm")[0].submit();
                    }
                    else
                    {
                        event.preventDefault();
                    }
                }
            });

            box.find('.modal-content').css({'background-color': '#efe4b0', 'text-align':'center', 'font-weight' : 'bold', color: '#F00', 'font-size': '25px'} );
            box.find('.modal-footer').css({'text-align':'center', 'height':'70px'});
                box.find(".btn-default").removeClass("btn-default").css({'width':'100px', 'height':'40px', 'background-color': 'white', 'font-weight' : 'bold', color: '#F00', 'font-size': '20px'});
            box.find(".btn-primary").removeClass("btn-primary").css({'width':'100px', 'height':'40px', 'margin-left':'50px', 'background-color': '#61ce7b', 'font-weight' : 'bold', color: '#F00', 'font-size': '20px'});
        });

    </script>
@endsection
