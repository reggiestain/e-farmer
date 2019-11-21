<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>E-Farmer - Login</title>

        <!-- Custom fonts for this template-->    
        <link href="{{ asset('js/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->  
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">      
        <link href="{{ asset('js/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <style>
            .stepwizard-step p {
                margin-top: 0px;
                color:#666;
            }
            .stepwizard-row {
                display: table-row;
            }
            .stepwizard {
                display: table;
                width: 100%;
                position: relative;
            }
            .stepwizard-step button[disabled] {
                /*opacity: 1 !important;
                filter: alpha(opacity=100) !important;*/
            }
            .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
                opacity:1 !important;
                color:#bbb;
            }
            .stepwizard-row:before {
                top: 14px;
                bottom: 0;
                position: absolute;
                content:" ";
                width: 100%;
                height: 1px;
                background-color: #ccc;
                z-index: 0;
            }
            .stepwizard-step {
                display: table-cell;
                text-align: center;
                position: relative;
            }
            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.428571429;
                border-radius: 15px;
            }  

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
        </style>
    </head>        
    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            @include('layouts.partial.sidebar',['user' => Auth::user()])
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    @include('layouts.partial.topbar')
                    @yield('content')  

                    <!-- Page Wrapper -->
                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy;  2019</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Select "Logout" below if you are ready to end your current session.                    
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
            <!--Add Modal-->
            <div class="modal fade" id="adduserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">                                              
                            <div class="col-lg-10">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                            </div>
                                        </div>
                                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </a>

                                    </form>
                                </div>                                          
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>   
                </div>
            </div>

            <!--load Modal-->
            <div class="modal fade" id="loaderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <!--<div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>-->
                        <div class="modal-body">                                              
                            <div class="col-lg-10">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div class="fa-3x">
                                           <!-- <i class="fas fa-spinner fa-spin"></i>
                                            <i class="fas fa-circle-notch fa-spin"></i>
                                            <i class="fas fa-sync fa-spin"></i>-->
                                            <i class="fas fa-cog fa-spin"></i>
                                           <!-- <i class="fas fa-spinner fa-pulse"></i>
                                            <i class="fas fa-stroopwafel fa-spin"></i>-->
                                        </div>
                                        downloading..... PDF
                                    </div>
                                </div>                                          
                            </div>
                        </div>
                        <!-- <div class="modal-footer"></div>-->
                    </div>   
                </div>
            </div>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('js/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('js/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ URL::asset('js/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ URL::asset('js/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('js/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('js/demo/datatables-demo.js') }}"></script>
    <script>
                                   $(document).ready(function () {

                                       $(document).on('click', '.add-farm', function () {
                                           $("#addFarmModal").modal();
                                       });

                                       $(document).on('click', '.pdf-view', function (e) {
                                           e.preventDefault();
                                           //$("#loaderModal").modal();
                                           var url = $(this).attr("href");

                                           var win = window.open(url, '_blank');
                                           if (win) {
                                               //Browser has allowed it to be opened
                                               // $("#loaderModal").modal('toggle');
                                               win.focus();
                                           } else {
                                               //Browser has blocked it
                                               alert('Please allow popups for this website');
                                           }
                                         
                                       });

                                       $(document).on('click', '.edit-f', function (e) {
                                           e.preventDefault(); // avoid to execute the actual submit of the form.
                                           var form = $(this);
                                           var url = $(this).attr("href");

                                           $.ajax({
                                               type: "GET",
                                               headers: {
                                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                               },
                                               url: url,
                                               data: form.serialize(), // serializes the form's elements.
                                               success: function (response) {
                                                   $(".edit-farm").html(response);
                                                   $("#editFarmModal").modal();
                                               },
                                               error: function (e) {
                                                   console.log(e.responseText);
                                               }
                                           });
                                       });

                                       //save farm
                                       $(document).on('submit', '#formFarm', function (e) {
                                           e.preventDefault(); // avoid to execute the actual submit of the form.

                                           var form = $(this);
                                           var url = form.attr('action');
                                           //alert(url);
                                           $.ajax({
                                               type: "POST",
                                               headers: {
                                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                               },
                                               url: url,
                                               data: form.serialize(), // serializes the form's elements.
                                               success: function (response) {
                                                   $("#addFarmModal").modal('toggle');
                                                   $(".farm-table").html(response);
                                               },
                                               error: function (e) {
                                                   console.log(e.responseText);
                                               }
                                           });
                                       });

                                       //update farm
                                       $(document).on('submit', '#updateFarm', function (e) {
                                           e.preventDefault(); // avoid to execute the actual submit of the form.

                                           var formdata = $(this).serialize(); 
                                           var url = $("#updateFarm").attr('action');
                                           //alert(url);
                                           $.ajax({
                                               type: "POST",
                                               headers: {
                                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                               },
                                               url: url,
                                               data: formdata, // serializes the form's elements.
                                               success: function (response) {
                                                   $("#editFarmModal").modal('toggle');
                                                   $(".farm-table").html(response);
                                               },
                                               error: function (e) {
                                                   console.log(e.responseText);
                                               }
                                           });
                                       });

                                       $('#datetimepicker1').datepicker({
                                           format: "dd/mm/yyyy",
                                           language: "es",
                                           autoclose: true,
                                           todayHighlight: true
                                       });

                                       $('#datetimepicker2').datepicker({
                                           format: "dd/mm/yyyy",
                                           language: "es",
                                           autoclose: true,
                                           todayHighlight: true
                                       });

                                       $(".imgAdd").click(function () {
                                           $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
                                       });
                                       $(document).on("click", "i.del", function () {
                                           $(this).parent().remove();
                                       });
                                       $(function () {
                                           $(document).on("change", ".uploadFile", function ()
                                           {
                                               var uploadFile = $(this);
                                               var files = !!this.files ? this.files : [];
                                               if (!files.length || !window.FileReader)
                                                   return; // no file selected, or no FileReader support

                                               if (/^image/.test(files[0].type)) { // only image file
                                                   var reader = new FileReader(); // instance of the FileReader
                                                   reader.readAsDataURL(files[0]); // read the local file

                                                   reader.onloadend = function () { // set image data as background of div
                                                       //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                                                       uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                                                   }
                                               }

                                           });
                                       });

                                       var navListItems = $('div.setup-panel div a'),
                                               allWells = $('.setup-content'),
                                               allNextBtn = $('.nextBtn');

                                       allWells.hide();

                                       navListItems.click(function (e) {
                                           e.preventDefault();
                                           var $target = $($(this).attr('href')),
                                                   $item = $(this);

                                           if (!$item.hasClass('disabled')) {
                                               navListItems.removeClass('btn-success').addClass('btn-default');
                                               $item.addClass('btn-success');
                                               allWells.hide();
                                               $target.show();
                                               $target.find('input:eq(0)').focus();
                                           }
                                       });

                                       allNextBtn.click(function () {
                                           var curStep = $(this).closest(".setup-content"),
                                                   curStepBtn = curStep.attr("id"),
                                                   nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                                                   curInputs = curStep.find("input[type='text'],input[type='url']"),
                                                   isValid = true;

                                           $(".form-group").removeClass("has-error");
                                           //for (var i = 0; i < curInputs.length; i++) {
                                           //if (!curInputs[i].validity.valid) {
                                           //isValid = false;
                                           //$(curInputs[i]).closest(".form-group").addClass("has-error");
                                           // }
                                           //}

                                           if (isValid)
                                               nextStepWizard.removeAttr('disabled').trigger('click');
                                       });

                                       $('div.setup-panel div a.btn-success').trigger('click');
                                   });
    </script>
</body>
</html>
