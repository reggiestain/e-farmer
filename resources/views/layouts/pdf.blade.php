<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link href="{{ asset('js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->  
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.css') }}">
        <style>
             .imagePreview {
                width: 100%;
                height: 180px;
                background-position: center center;
                background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
                background-color:#fff;
                background-size: cover;
                background-repeat:no-repeat;
                display: inline-block;
                box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
            }
            .btn-primary
            {
                display:block;
                border-radius:0px;
                box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
                margin-top:-5px;
            }
             .imgUp
            {
                margin-bottom:15px;
            }
            .del
            {
                position:absolute;
                top:0px;
                right:15px;
                width:30px;
                height:30px;
                text-align:center;
                line-height:30px;
                background-color:rgba(255,255,255,0.6);
                cursor:pointer;
            }
            .imgAdd
            {
                width:30px;
                height:30px;
                border-radius:50%;
                background-color:#4bd7ef;
                color:#fff;
                box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
                text-align:center;
                line-height:30px;
                margin-top:0px;
                cursor:pointer;
                font-size:15px;
            }
            @page {
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }
        </style>
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  <footer class="sticky-footer bg-white" style="padding:0px 0px">
                        <div class="container my-auto">
                            <div class="copyright my-auto">
                                <span style="margin-right:400px">
                                    Sponsored by
                                    <img src="{{ public_path('img/logo/perd.png')}}" style="width:10%">
                                    <img src="{{ public_path('img/logo/fng.png')}}" style="width:13%;margin-top:20px">
                                    <img src="{{ public_path('img/logo/local-gov.png')}}" class="rounded-circle"style="width:5%">
                                </span>
                                 <span>
                                    <img src="{{ public_path('img/logo/trojan.png')}}" style="width:10%">
                                    Powered by
                                    <img src="{{ public_path('img/logo/trojan.png')}}" style="width:10%">
                                </span>
                            </div>
                        </div>
                    </footer>
</body>
</html>

