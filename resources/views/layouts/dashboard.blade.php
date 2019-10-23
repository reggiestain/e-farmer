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
            <!--Add Modal-->
            <div class="modal fade" id="addFarmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Farm Info</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">                                              
                            <div class="col-lg-10">
                                <div class="p-5">                 
                                    <form>
                                     <div class="form-group">    
                                                    <label class="control-label">Crop Type</label>
                                                    <select class="form-control" id="selectUser" name="crop_id" class="form-control @error('crop_type_id') is-invalid @enderror" >
                                                        <option value="" disabled selected>Please select crop type</option>        
                                                        @foreach($cropTypes as $cropType)
                                                        <option value="{{$cropType->id}}">{{ $cropType->name }}</option>
                                                        @endforeach
                                                    </select>
                                                     @error('region_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Seedlings</label>
                                                    <input maxlength="200" type="text" name="seedlings" class="form-control @error('seedlings') is-invalid @enderror" placeholder="Enter Seedlings" />
                                                     @error('seedlings')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Size Of Land</label>
                                                    <input maxlength="200" type="text" name="size_of_land" class="form-control @error('size_of_land') is-invalid @enderror" placeholder="Enter Size of Land" />
                                                     @error('size_of_land')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Established Year</label>
                                                    <input maxlength="200" type="text" name="year_established" class="form-control @error('year_established') is-invalid @enderror" placeholder="Enter Establish Year" />
                                                     @error('year_established')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">District</label>
                                                    <input maxlength="200" type="text" name="district" class="form-control @error('district') is-invalid @enderror" placeholder="Enter District" />
                                                     @error('district')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Longitude</label>
                                                    <input maxlength="200" type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" placeholder="Enter Longitude" />
                                                     @error('longitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Latitude</label>
                                                    <input maxlength="200" type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Enter Longitude" />
                                                     @error('latitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">    
                                                    <label class="control-label">Region</label>
                                                    <select class="form-control" id="selectUser" name="region_id" class="form-control @error('region_id') is-invalid @enderror" >
                                                        <option value="" disabled selected>Please select region</option>        
                                                        @foreach($regions as $region)
                                                        <option value="{{$region->id}}">{{ $region->name }}</option>
                                                        @endforeach
                                                    </select>
                                                     @error('region_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <button class="btn btn-primary nextBtn pull-right" type="button">Submit</button>  

                                    </form>
                                </div>                                          
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
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
