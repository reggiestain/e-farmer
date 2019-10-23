@extends('layouts.dashboard')

@section('content')
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
</style>
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h2 class="h3 mb-4 text-gray-800">Farmers</h2>

            <div class='row'>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Farmer</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#adduserModal">Add user</a>                                    
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
                                                <p><small>Farmer Details</small></p>
                                            </div>
                                            <div class="stepwizard-step col-xs-3"> 
                                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                <p><small>Spousal Details</small></p>
                                            </div>
                                            <div class="stepwizard-step col-xs-3"> 
                                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                <p><small>Farm Details</small></p>
                                            </div>
                                            <div class="stepwizard-step col-xs-3"> 
                                                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                                <p><small>Banking Details</small></p>
                                            </div>

                                        </div>
                                    </div>

                                    <form role="form" method="POST" action="{{ route('farmer.update',$farmer) }}">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="panel panel-primary setup-content" id="step-1">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Farmer</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter First Name" value="{{ $farmer->firstname }}" autocomplete="firstname"/>                                                    
                                                    @error('firtname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Enter Last Name" value="{{ $farmer->surname }}" autocomplete="surname"/>
                                                    @error('surname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Contact Number 1</label>
                                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ $farmer->mobile }}" autocomplete="mobile"/>
                                                    @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Contact Number 2</label>
                                                    <input type="text" name="mobile2" class="form-control @error('mobile2') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ $farmer->mobile2 }}" autocomplete="mobile2"/>
                                                    @error('mobile2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">    
                                                    <label class="control-label">Gender</label>
                                                    <select class="form-control" id="selectGender" name="gender" class="form-control @error('gender') is-invalid @enderror" autocomplete="gender">
                                                        <option value="{{$farmer->gender}}" disabled selected>{{ $farmer->gender }}</option>        
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
                                                            <input type='text' name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ $farmer->birth_date }}" autocomplete="birth_date"/>
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
                                                    <input type="text" name="birth_place" class="form-control @error('birth_place') is-invalid @enderror" value="{{ $farmer->birth_place }}" autocomplete="birth_place"/>
                                                    @error('birth_place')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Age</label>
                                                    <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Enter Age" value="{{ $farmer->age }}" autocomplete="age"/>
                                                    @error('age')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Marital Status</label>
                                                    <input type="text" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror" placeholder="Marital Status" value="{{ $farmer->marital_status }}" autocomplete="marital_status"/>
                                                    @error('marital-status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Number Of Children</label>
                                                    <input type="text" name="number_of_children" class="form-control @error('number_of_children') is-invalid @enderror" value="{{ $farmer->number_of_children }}" autocomplete="number_of_children"/>
                                                    @error('number_of_children')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Number Of Dependencies</label>
                                                    <input type="text" name="number_of_dependencies" class="form-control @error('number_of_dependencies') is-invalid @enderror" value="{{$farmer->number_of_dependencies}}" autocomplete="marital_status"/>
                                                    @error('number_of_dependencies')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Physical Address</label>
                                                    <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $farmer->address }}" autocomplete="address"></textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Post Office Address</label>
                                                    <textarea type="text" name="post_office_address" class="form-control @error('post_office_address') is-invalid @enderror" value="{{ $farmer->post_office_address }}" autocomplete="post_office_address"></textarea>
                                                    @error('post_office_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                            </div>
                                        </div>

                                        <div class="panel panel-primary setup-content" id="step-2">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Spouse Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" name="s_firstname" class="form-control @error('s_firstname') is-invalid @enderror" value="{{$farmer->spousalDetail->s_firstname}}" autocomplete="s_firstname"/>
                                                    @error('s_firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Surname</label>
                                                    <input type="text" name="s_surname" class="form-control @error('s_surname') is-invalid @enderror" value="{{$farmer->spousalDetail->s_surname}}" autocomplete="s_surname"/>
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
                                                            <input type='text' name="s_birth_date" class="form-control @error('s_birth_date') is-invalid @enderror" value="{{$farmer->spousalDetail->s_birth_date}}" autocomplete="s_birth_date"/>
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
                                                    <input maxlength="200" type="text"  name="s_mobile" class="form-control @error('s_mobile') is-invalid @enderror" value="{{$farmer->spousalDetail->s_mobile}}"/>
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
                                                <h3 class="panel-title">Farm</h3>
                                            </div>                                           

                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <div><a class="btn btn-default add-farm" style="float:right"><i class="fas fa-fw fa-plus"></i></a></div>
                                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Crop Type</th>
                                                                <th>Seedlings</th>
                                                                <th>Size Of Land</th>
                                                                <th>Year Established</th>
                                                                <th>Community</th>
                                                                <th>Longitude</th>
                                                                <th>Latitude</th>
                                                                <th>Region</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach($farmer->farmDetail as $farm )
                                                            <tr>
                                                                <td>{{$farm->crop->name}}</td>
                                                                <td>{{$farm->seedlings}}</td>
                                                                <td>{{$farm->size_of_land}}</td>
                                                                <td>{{$farm->year_exstablished}}</td>
                                                                <td>{{$farm->district}}</td>
                                                                <td>{{$farm->longitude}}</td>
                                                                <td>{{$farm->latitude}}</td>
                                                                <td>{{$farm->region->name}}</td>
                                                                <td>                                                   
                                                                    <a class="btn btn-success">View</a> 
                                                                    @if(Auth::user()->roles()->get()->pluck('name')->first() !=='official')
                                                                    <a class="btn btn-primary" href="{{route('admin.users.edit',$farm->id)}}">Edit</a>   
                                                                    @else

                                                                    @endif
                                                                </td>
                                                            </tr> 
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-primary setup-content" id="step-4">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Bank</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="control-label">Bank Name</label>
                                                    <input maxlength="200" type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" value="{{$farmer->bankDetail->bank_name}}"/>
                                                    @error('bank_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Account Number</label>
                                                    <input maxlength="200" type="text" name="account_no" class="form-control @error('account_no') is-invalid @enderror" value="{{$farmer->bankDetail->account_no}}" />
                                                    @error('account_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Branch Name</label>
                                                    <input maxlength="200" type="text" name="branch_name" class="form-control @error('branch_name') is-invalid @enderror" value="{{$farmer->bankDetail->branch_name}}" />
                                                    @error('branch_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Money Number</label>
                                                    <input maxlength="200" type="text"  name="mobile_money" class="form-control @error('mobile_money') is-invalid @enderror" value="{{$farmer->bankDetail->mobile_money}}" />
                                                    @error('mobile_money')
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
        <!-- /.container-fluid -->
    </div>
    @endsection     


