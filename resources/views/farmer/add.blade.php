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
                            <h6 class="m-0 font-weight-bold text-primary">Create Farmer</h6>
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
                                                <p><small>Farm Details</small></p>
                                            </div>
                                            <div class="stepwizard-step col-xs-3"> 
                                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                <p><small>Banking Details</small></p>
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <form role="form">
                                        <div class="panel panel-primary setup-content" id="step-1">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Farmer</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Contact Number</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Contact Number" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Gender" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Date Of Birth</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Birth Date" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Age</label>
                                                    <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Age" />
                                                </div>
                                                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                            </div>
                                        </div>

                                        <div class="panel panel-primary setup-content" id="step-2">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Farm</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="control-label">Crop Type</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Crop Type" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Seedlings</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Seedlings" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Size Of Land</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Size of Land" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Established Year</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Establish Year" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">District</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter District" />
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label">Longitude</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Longitude" />
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
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Bank Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Account Number</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Account Number" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Branch Name</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Branch Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Money Number</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Mobile Money Number" />
                                                </div>
                                                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
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


