@extends('layouts.app')

@section('content')

    <div class="dashboardBackground">
        <div class="dashboardContent">
            <div><!--header-->
                <div class="row">
                    <div class="col-sm-4">
                        <p style="margin-bottom:10px;margin-top:20px;margin-left:40px;font-size: 30px; font-weight: bold"><b>Sign List</b></p>
                    </div>
                    <div class="col-sm-8">

                    </div>
                </div>
                <!--split-->
                <div class="splitterdiv">
                </div><!--split-->
            </div><!--header-->
            <div class="tablediv">
                <div id="jsGrid" class="griddiv"></div>
                </div>
            </div>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/JSGrid/jsgrid.min.js')}}"></script>
    <script>
            var clients = [
                {"No": 1, "User Name": "Demo 780", "Type": "Client", "Signup Date": "01/23/2016", "Programs": 3},
                {"No": 2, "User Name": "Tester", "Type": "Client", "Signup Date": "01/23/2016", "Programs": 1},
                {"No": 3, "User Name": "Fred Lopes", "Type": "Client", "Signup Date": "01/23/2016", "Programs": 6}
            ];

            $("#jsGrid").jsGrid({
                width: "100%",

                scroll:false,
                sorting: true,
                paging: true,


                noDataContent: "No Record Found",
                loadIndication: true,
                loadIndicationDelay: 500,
                loadMessage: "Please, wait...",
                loadShading: true,
                deleteConfirm: "Do you really want to delete the client?",

                pagesize: 15,

                data: clients,

                fields: [
                    {name: "No", type: "number", width: 10},
                    {name: "User Name", type: "text", width: 50},
                    {name: "Type", type: "text", width: 50},
                    {name: "Signup Date", type: "text", width: 50},
                    {name: "Programs", type: "number", width: 50},
                    {
                        name: "", type: "text", width: 20, sorting: false, filtering: false,
                        itemTemplate: function (value) {
                            return '<div class="edit-container"><a class="edit-custom-field-link" href="{{url('/clientoverview')}}">View</a></div>';
                        }
                    }
                ]
            });
    </script>

@endsection