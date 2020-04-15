@extends('layouts.dashboard')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Create Foreign National</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Create Foreign National</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class='row'>
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#adduserModal">Add user</a> 
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#adduserModal">Upload Doc</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- Card Body -->

                                <p class="mb-4"></p>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="container">
                                            <div class="stepwizard">
                                                <div class="stepwizard-row setup-panel">
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                                        <p><small>Personal Details</small></p>
                                                    </div>
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                        <p><small>Spousal Details</small></p>
                                                    </div>                                          
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                        <p><small>Banking Details</small></p>
                                                    </div>
                                                    <div class="stepwizard-step col-xs-3"> 
                                                        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                                        <p><small>Parent Details</small></p>
                                                    </div>

                                                </div>
                                            </div>

                                            <form role="form" method="POST" action="{{ route('farmer.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="panel panel-primary setup-content" id="step-1">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Foreign National</h3>
                                                    </div>

                                                    <div class="panel-body">  
                                                        <div class="row">

                                                            <div class="col-md-8">    
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label>
                                                                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter First Name" value="{{ old('firstname') }}" autocomplete="firstname"/>                                                    
                                                                    @error('firtname')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Last Name</label>
                                                                    <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Enter Last Name" value="{{ old('surname') }}" autocomplete="surname"/>
                                                                    @error('surname')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>   
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Number 1</label>
                                                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ old('mobile') }}" autocomplete="mobile"/>
                                                                    @error('mobile')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Contact Number 2</label>
                                                                    <input type="text" name="mobile2" class="form-control @error('mobile2') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ old('mobile2') }}" autocomplete="mobile2"/>
                                                                    @error('mobile2')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">    
                                                                    <label class="control-label">Gender</label>
                                                                    <select class="form-control" id="selectGender" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" autocomplete="gender">
                                                                        <option value="" disabled selected>Please select gender</option>        
                                                                        @foreach($genders as $gender)
                                                                        <option value="{{$gender}}">{{$gender}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('gender')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>                                                                          
                                                                <div class='form-group'>
                                                                    <label class="control-label">Birth Date</label>
                                                                    <div class="form-group">
                                                                        <div class='input-group date' id='datetimepicker1'>
                                                                            <input type='text' name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" autocomplete="birth_date"/>
                                                                            <span class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    @error('birth_date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>                                               
                                                                <div class="form-group">
                                                                    <label class="control-label">Birth Place</label>
                                                                    <input type="text" name="birth_place" class="form-control @error('birth_place') is-invalid @enderror" value="{{ old('birth_place') }}" autocomplete="birth_place"/>
                                                                    @error('birth_place')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Age</label>
                                                                    <input type="number" name="age" pattern="/^-?\d+\.?\d*$/" onKeyPress="if (this.value.length == 2)
                                                                                return false;" class="form-control @error('age') is-invalid @enderror" placeholder="Enter Age" value="{{ old('age') }}" autocomplete="age"/>
                                                                    @error('age')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Association</label>
                                                                    <input type="text" name="assoc" class="form-control @error('assoc') is-invalid @enderror" placeholder="Enter Association" value="{{ old('assoc') }}" autocomplete="assoc"/>
                                                                    @error('assoc')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">    
                                                                    <label class="control-label">Marital Status</label>
                                                                    <select class="form-control" id="selectGender" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror" value="{{ old('marital_status') }}" autocomplete="marital-status">
                                                                        <option value="" disabled selected>Please select marital status</option>        
                                                                        @foreach($maritals as $marital)
                                                                        <option value="{{$marital}}">{{$marital}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('marital_status')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>      
                                                                <div class="form-group">
                                                                    <label class="control-label">Number Of Children</label>
                                                                    <input type="number" name="number_of_children" pattern="/^-?\d+\.?\d*$/" onKeyPress="if (this.value.length == 2)
                                                                                return false;" class="form-control @error('number_of_children') is-invalid @enderror" placeholder="Number Of Children" value="{{ old('number_of_children') }}" autocomplete="number_of_children"/>
                                                                    @error('number_of_children')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Number Of Dependencies</label>
                                                                    <input type="number" name="number_of_dependencies" pattern="/^-?\d+\.?\d*$/" onKeyPress="if (this.value.length == 2)
                                                                                return false;" class="form-control @error('number_of_dependencies') is-invalid @enderror" placeholder="Number of Dependencies" value="{{ old('number_of_dependencies') }}" autocomplete="number_of_dependencies"/>
                                                                    @error('number_of_dependencies')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Physical Address</label>
                                                                    <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('address') }}" autocomplete="address"></textarea>
                                                                    @error('address')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Post Office Address</label>
                                                                    <textarea type="text" name="post_office_address" class="form-control @error('post_office_address') is-invalid @enderror" placeholder="Enter Post Office Address" value="{{ old('post_office_address') }}" autocomplete="post_office_address"></textarea>
                                                                    @error('post_office_address')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <button class="btn btn-primary nextBtn" style="float:right" type="button">Next</button>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <br><div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-12 imgUp">
                                                                                <div class="imagePreview"
                                                                                     style="background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg)"
                                                                                     ></div>
                                                                                <label class="btn btn-primary">
                                                                                    Upload
                                                                                    <input type="file" name="profile_image" class="uploadFile img"  style="width: 0px;height: 0px;overflow: hidden;" class="form-control @error('profile_image') is-invalid @enderror" autocomplete="profile_image">

                                                                                </label>
                                                                            </div><!-- col-2 -->
                                                                            <!--<i class="fa fa-plus imgAdd"></i>-->
                                                                        </div><!-- row -->
                                                                    </div><!-- container -->

                                                                </div>
                                                                @error('profile_image')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </div>
                                                                @enderror

                                                                <div class="container d-flex justify-content-center" style="margin-top: 50px"> <!--<button class="btn btn-primary" data-toggle="modal" data-target="#my-modal">Authentication</button>-->
                                                                    <!--<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered justify-content-center " role="document">-->
                                                                            <div class="modal-content border-0 mx-3">
                                                                                <div class="modal-body p-0">
                                                                                    <div class="row justify-content-center">
                                                                                        <div class="col-auto">
                                                                                            <div class="card border-0 justify-content-center">
                                                                                                <div class="card-header pb-0 bg-white text-center">
                                                                                                    <div class="row mb-0 justify-content-end">
                                                                                                        <!--<div class="col-3"><<img class="img-fluid cross mb-auto " src="https://i.imgur.com/YFpQ0hW.jpg" data-dismiss="modal"></div>-->
                                                                                                    </div>
                                                                                                    <div class="row mt-0">
                                                                                                        <div class="col"><img class="img-fluid text-center" src="https://i.imgur.com/kmvY5wU.jpg"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card-body text-center px-lg-5 px-md-4 mb-3">
                                                                                                    <h6 class="card-title card-4 font-weight-bold">Fingerprint detection</h6>
                                                                                                   <!-- <p class="text-light">Fingerprint read successfully,click continue to perform your action</p>
                                                                                                    <div class="row justify-content-center mt-4">
                                                                                                        <div class="col-8"><button type="button" class="btn btn-success btn-block font-weight-bold text-dark mt-3" data-dismiss="modal">Continue</button></div>
                                                                                                    </div>-->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <!--</div>
                                                                    </div>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                                <div class="panel panel-primary setup-content" id="step-2">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Spouse Details</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" name="s_firstname" class="form-control @error('s_firstname') is-invalid @enderror" placeholder="Enter Firstname" value="{{ old('s_firstname') }}" autocomplete="s_firstname"/>
                                                            @error('s_firstname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Surname</label>
                                                            <input type="text" name="s_surname" class="form-control @error('s_surname') is-invalid @enderror" placeholder="Enter Surname" value="{{ old('s_surname') }}" autocomplete="s_surname"/>
                                                            @error('s_surname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="control-label">Birth Date</label>
                                                            <div class="form-group">
                                                                <div class='input-group date' id='datetimepicker2'>
                                                                    <input type='text' name="s_birth_date" class="form-control @error('s_birth_date') is-invalid @enderror" value="{{ old('s_birth_date') }}" autocomplete="s_birth_date"/>
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            @error('s_birth_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>     
                                                        <div class="form-group">
                                                            <label class="control-label">Contact Number</label>
                                                            <input  type="text" name="s_mobile" class="form-control @error('s_mobile') is-invalid @enderror" placeholder="Enter Contact Number" />
                                                            @error('s_mobile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                                    </div>
                                                </div>

                                                <div class="panel panel-primary setup-content" id="step-3">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Bank</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="control-label">Bank Name</label>
                                                            <input maxlength="200" type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" placeholder="Enter Bank Name" />
                                                            @error('bank_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Account Number</label>
                                                            <input maxlength="200" type="text" name="account_no" class="form-control @error('account_no') is-invalid @enderror" placeholder="Enter Account Number" />
                                                            @error('account_no')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Branch Name</label>
                                                            <input maxlength="200" type="text" name="branch_name" class="form-control @error('branch_name') is-invalid @enderror" placeholder="Enter Branch Name" />
                                                            @error('branch_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile Money Number</label>
                                                            <input maxlength="200" type="text"  name="mobile_money" class="form-control @error('mobile_money') is-invalid @enderror" placeholder="Enter Mobile Money Number" />
                                                            @error('mobile_money')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

                                                    </div>
                                                </div>

                                                <div class="panel panel-primary setup-content" id="step-4">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Parent</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" name="s_firstname" class="form-control @error('s_firstname') is-invalid @enderror" placeholder="Enter Firstname" value="{{ old('s_firstname') }}" autocomplete="s_firstname"/>
                                                            @error('s_firstname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Surname</label>
                                                            <input type="text" name="s_surname" class="form-control @error('s_surname') is-invalid @enderror" placeholder="Enter Surname" value="{{ old('s_surname') }}" autocomplete="s_surname"/>
                                                            @error('s_surname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class='form-group'>
                                                            <label class="control-label">Birth Date</label>
                                                            <div class="form-group">
                                                                <div class='input-group date' id='datetimepicker2'>
                                                                    <input type='text' name="s_birth_date" class="form-control @error('s_birth_date') is-invalid @enderror" value="{{ old('s_birth_date') }}" autocomplete="s_birth_date"/>
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            @error('s_birth_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>     
                                                        <div class="form-group">
                                                            <label class="control-label">Contact Number</label>
                                                            <input  type="text" name="s_mobile" class="form-control @error('s_mobile') is-invalid @enderror" placeholder="Enter Contact Number" />
                                                            @error('s_mobile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <button class="btn btn-primary nextBtn pull-right" type="submit">Submit</button>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 100vh;"></div>
            <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
        </div>
    </main>
    @endsection     


