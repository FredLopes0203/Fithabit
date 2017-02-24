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
        .imageupload {
            margin: 20px 0;
        }

    </style>

    <div class="dashboardBackground">
        <div class="dashboardContent">

            <form id="newProgramForm" action="{{url($formurl)}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @if (count($errors) > 0)
                    <script>
                        showAlert("An exist program name! Please Input another.");
                    </script>
                @endif
                <div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom: 20px">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div style="text-align:center;margin-bottom:20px;">
                            <div style="margin-top: 10px">
                                <p style="margin-bottom:20px;font-size: 22px; font-weight: bold"><b>Product Image</b></p>
                            </div>
                            <div class="imageupload panel panel-default" style="border-style: none">
                                <div class="file-tab panel-body">
                                        <div class="file-tab panel-body">
                                            <div id="imgdiv" style="border-style:solid; border-width:1px;display: block;
                                                                          width: 100%;
                                                                          height: auto;
                                                                          position: relative;
                                                                          overflow: hidden;
                                                                          padding: 75% 0 0 0; text-align: center">
                                                <img id="imgPreview" style="width: 400px; height: 300px; display: block;
                                                                          max-width: 100%;
                                                                          max-height: 100%;
                                                                          position: absolute;
                                                                          top: 0;
                                                                          bottom: 0;
                                                                          left: 0;
                                                                          right: 0; margin-right: auto; margin-left: auto"
                                                     @if ($newprogram == 0)
                                                     src = "{{asset($programdata->program_image)}}"
                                                        @endif
                                                     alt="Program Image">
                                            </div>

                                            <label class="btn btn-default btn-file" style="margin-top: 20px">
                                                <span id="btnName">
                                                    @if ($newprogram == 1)
                                                        Browse
                                                    @else
                                                        Change
                                                    @endif
                                                </span>
                                                <!-- The file is stored here. -->
                                                <input type="file" style="width: 40px; height: 40px" name="imageprogram" onchange="readImgFromURL(this);" id="imageprogram"
                                                       @if ($newprogram == 1)
                                                        required
                                                       @else

                                                       @endif
                                                >
                                            </label>
                                        </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6 new-program">
                        <div style="margin: 10px 10px 0 0;">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">

                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 20px; vertical-align: bottom"><b>Program Name</b></p>
                                    <div style="margin-left:20px;">
                                        @if (count($errors) > 0)
                                            <input type="text" name="program_name" autocomplete="off" size="40" class="form-control" aria-invalid="false" value="{{old('program_name')}}" required>
                                        @else
                                            @if ($newprogram == 1)
                                                <input type="text" name="program_name" autocomplete="off" size="40" class="form-control" aria-invalid="false" value="" required>
                                            @else
                                                <input type="text" name="program_name" autocomplete="off" size="40" class="form-control" aria-invalid="false" value="{{$programdata->program_name}}" required>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <p style="font-size: 20px; font-weight: bold"><b>Price</b></p>
                                    <div>
                                        <div style="margin-left:7px; padding-top: 7px">
                                            <span>
                                                <input type="radio" name="paymethod"  style="margin-top: 15px"

                                                       @if (count($errors) > 0)
                                                            @if(old('paymethod') == "free")
                                                                <?php echo "checked"; ?>
                                                            @endif
                                                       @else
                                                            @if ($newprogram == 0)
                                                                @if($programdata->program_isfree == 1)
                                                                    <?php echo "checked"; ?>
                                                                @endif
                                                            @else
                                                                <?php echo "checked"; ?>
                                                            @endif
                                                       @endif
                                                       value="free" onchange="paymethodselected()"><span class="wpcf7-list-item-label"><b>Free</b></span>
                                            </span>
                                            <span style="margin-left: 30px">
                                                <input type="radio" name="paymethod"
                                                        @if (count($errors) > 0)
                                                            @if(old('paymethod') == "paid")
                                                                <?php echo "checked"; ?>
                                                            @endif
                                                        @else
                                                            @if ($newprogram == 0)
                                                                @if($programdata->program_isfree == 0)
                                                                    <?php echo "checked"; ?>
                                                                @endif
                                                            @endif
                                                        @endif
                                                       value="paid" onchange="paymethodselected()" ><span class="wpcf7-list-item-label"><b>Paid</b></span>



                                                @if (count($errors) > 0)
                                                    <input type="text" name="programprice" value="{{old('programprice')}}" autocomplete="off" pattern="[0-9]+([\.,][0-9]+)?" onkeypress="pricevalidate(event)" id="programprice" size="40" class="form-control" style=" margin-right:10px;margin-top:8px; float:right;width:80px;" aria-invalid="false" required>
                                                @else
                                                    @if ($newprogram == 1)
                                                        <input type="text" name="programprice" autocomplete="off" pattern="[0-9]+([\.,][0-9]+)?" onkeypress="pricevalidate(event)" id="programprice" value="" size="40" class="form-control" style=" margin-right:10px;margin-top:8px; float:right;width:80px;" aria-invalid="false" required>
                                                    @else
                                                        <input type="text" name="programprice" value="{{$programdata->program_price}}" autocomplete="off" pattern="[0-9]+([\.,][0-9]+)?" onkeypress="pricevalidate(event)" id="programprice" size="40" class="form-control" style=" margin-right:10px;margin-top:8px; float:right;width:80px;" aria-invalid="false" required>
                                                    @endif
                                                @endif

                                                <span style="font-size:16px; float: right; margin-top: 12px; margin-right: 10px"><b>$</b></span>
                                            </span>

                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>

                        <div style="margin-top:20px;">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <p style="margin-bottom:20px;margin-left:20px;font-size: 20px; vertical-align: bottom"><b>Product Description</b></p>
                                    <div style="margin:0 20px 0 20px;">
                                        @if (count($errors) > 0)
                                            <textarea name="productdescription" cols="40" rows="8" class="form-control textarea" aria-invalid="false" required>{{old('productdescription')}}</textarea>
                                        @else
                                            @if ($newprogram == 1)
                                                <textarea name="productdescription" cols="40" rows="8" class="form-control textarea" aria-invalid="false" required></textarea>
                                            @else
                                                <textarea name="productdescription" cols="40" rows="8" class="form-control textarea" aria-invalid="false" required>{{$programdata->program_description}}</textarea>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div style="text-align: center">
                                <button type="submit" class="next-but">Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div style="margin-top:10px">
                                    <p style="margin-bottom:20px;font-size: 16px; vertical-align: bottom"><b>Program Weeks</b></p>
                                </div>
                                <div>

                                    @if (count($errors) > 0)
                                        <input type="number" min="1" step = "1" autocomplete="off" name="programweek" value="{{old('programweek')}}" size="40" class="form-control" aria-invalid="false" required>
                                    @else
                                        @if ($newprogram == 1)
                                            <input type="number" min="1" step = "1" autocomplete="off" name="programweek" value="" size="40" class="form-control" aria-invalid="false" required>
                                        @else
                                            <input type="number" min="1" step = "1" autocomplete="off" name="programweek" value="{{$programdata->program_weeks}}" size="40" class="form-control" aria-invalid="false" required>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div style="margin-top:10px">
                                    <p style="margin-bottom:20px;font-size: 16px; vertical-align: bottom"><b>Program Type</b></p>
                                </div>
                                <div>
                                    <select class="form-control" id="program_type" name="program_type" required="required">
                                        <option value="" disabled="disabled" selected></option>

                                        @if (count($errors) > 0)
                                            <option value="1" {{ (old("program_type") == "1" ? "selected":"") }}>Public</option>
                                            <option value="2" {{ (old("program_type") == "2" ? "selected":"") }}>Custom</option>
                                            <option value="3" {{ (old("program_type") == "3" ? "selected":"") }}>Internal</option>
                                        @else
                                            @if ($newprogram == 1)
                                                <option value="1">Public</option>
                                                <option value="2">Custom</option>
                                                <option value="3">Internal</option>
                                            @else
                                                <option value="1" {{ ($programdata->program_type == 1 ? "selected":"") }}>Public</option>
                                                <option value="2" {{ ($programdata->program_type == 2 ? "selected":"") }}>Custom</option>
                                                <option value="3" {{ ($programdata->program_type == 3 ? "selected":"") }}>Internal</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div>
                            <div>
                                <p style="margin:20px 0 10px;font-size: 20px; vertical-align: bottom"><b>Instructions</b></p>
                            </div>
                            <div style="margin: 10px 5px">
                                <label style="word-wrap: break-word; width: 100%">asdfaerkaweir wueroiuqw eoriuqwe oasdawer werqwe
                                    rqwerqwerqw eriuqow ieruqowier uoq wieuro qweuroq wiue roqweu roqweiuroqwieruowe
                                    iurqowieruqoweiur</br>asdfaerkaweir wueroiuqw eoriuqwe oasdawer werqwe rqwerqwerqw eriuqow
                                     ieruqowier uoq wieuro qweuroq wiue roqweu roqweiuroqwieruoweiurqowieruqoweiur
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        window.onload = function() {
            paymethodselected();
        };

        function paymethodselected() {
            var result = document.querySelector('input[name="paymethod"]:checked').value;
            if(result=="free"){
                document.getElementById("programprice").setAttribute('disabled', true);
                document.getElementById("programprice").value = "";
            }
            else if(result == "paid"){
                document.getElementById("programprice").removeAttribute('disabled');
                document.getElementById("programprice").focus();
                document.getElementById("programprice").setAttribute('placeholder', "0.0");
            }
        }

        function pricevalidate(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }





        $('#newProgramForm').submit(function(event) {
            var isNew = "<?php echo $newprogram;?>";
            var msgTitle = "";
            if(isNew == "1")
            {
                msgTitle = "Create Program?"
            }
            else
            {
                msgTitle = "Update Program?"
            }
            event.preventDefault();
            var box = bootbox.confirm({
                title: msgTitle,
                message: "Are you sure with the program infos?",
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
                        $("#newProgramForm")[0].submit();
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


        function readImgFromURL(input) {
            if (input.files && input.files[0]) {
                if(input.files[0].size / 1024 <= 2048)
                {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imgPreview')
                                .attr('src', e.target.result)
                                .width(200)
                                .height(200)
                        $('#imgdiv').css({'border':'none'})
                    };
                    reader.readAsDataURL(input.files[0]);
                    $('#btnName').text('Change');
                }
                else
                {
                    showAlert("Image size should be less than 2MB.");
                    $('#imageprogram').val('');
                }
            }
        }
    </script>
@endsection
