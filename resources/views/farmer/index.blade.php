@extends('layouts.dashboard')

@section('content')
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
                            <h6 class="m-0 font-weight-bold text-primary">Farmer Details</h6>
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
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Marital Status</th>
                                                    <th>Dependencies</th>
                                                    <th>Region</th>
                                                    <th>Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>001</td>
                                                    <td>Kofi</td>
                                                    <td>Yeboah</td>
                                                    <td>Male</td>
                                                    <td>45</td>
                                                    <td>Married</td>
                                                    <td>4</td>
                                                    <td>Ashanti Region</td>
                                                    <td>2011/04/25</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm">View</button> 
                                                        <button class="btn btn-primary btn-sm">Edit</button>   
                                                    </td>
                                                </tr>  
                                                <tr>
                                                    <td>002</td>
                                                    <td>Matthew</td>
                                                    <td>Amoah</td>
                                                    <td>Male</td>
                                                    <td>55</td>
                                                    <td>Married</td>
                                                    <td>7</td>
                                                    <td>Ahafo Region</td>
                                                    <td>2011/04/25</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm">View</button> 
                                                        <button class="btn btn-primary btn-sm">Edit</button>   
                                                    </td>
                                                </tr>   
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            @endsection     


