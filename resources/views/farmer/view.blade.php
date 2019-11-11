@extends('layouts.dashboard')

@section('content')

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h2 class="h3 mb-4 text-gray-800">Farmer</h2>

            <div class='row'>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Farmer Info</h6>
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
                                    <table class="table table-striped"> 
                                        <caption></caption> 
                                        <thead> 
                                            <tr> 
                                                <th colspan="6"><h4>PERD FARMER DATA COLLECTION SHEET</h4></th> 
                                                <th></th><th></th><th></th><th></th><th></th>
                                            </tr> 
                                            <tr> 
                                                <td colspan="3"> 
                                                    <strong>APPLICATION No:</strong> #{{$farmer->id}}
                                                    <br><br>
                                                    <strong>REGION:</strong> {{$farmer->farmDetail[0]->region->name}}
                                                    <br><br>
                                                    <strong>DISTRICT:</strong> Accra
                                                    <br><br>
                                                    <strong>COMMUNITY NAME:</strong> Accra
                                                </td> 
                                                <td colspan="3"> 
                                                    <strong>NAME OF EXTENSION OFFICER:</strong> {{$farmer->user->name}}
                                                    <br><br>
                                                    <strong>PHONE NUMBER OF EXTENSION OFFICER:</strong> {{$farmer->user->mobile}}
                                                    <br><br>
                                                    <strong>DATA COLLECTION DATE:</strong> {{$farmer->created_at}}
                                                </td> 

                                            </tr> 
                                            <tr> 
                                                <th colspan="3"><h4>FARMER DETAILS</h4></th> 
                                                <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                            </tr>
                                            <tr> 
                                                <td colspan="2"> 
                                                    <strong>NAME:</strong> {{$farmer->firstname}}
                                                    <br><br>
                                                    <strong>SURNAME:</strong> {{$farmer->surname}}
                                                    <br><br>
                                                    <strong>GENDER:</strong> {{$farmer->gender}}
                                                    <br><br>
                                                    <strong>BIRTH DATE:</strong> {{$farmer->birth_date}}
                                                    <br><br>
                                                    <strong>AGE:</strong> {{$farmer->age}}
                                                </td> 
                                                <td colspan="2" > 
                                                    <strong>EMAIL :</strong> {{$farmer->email}}
                                                    <br><br>
                                                    <strong>PHONE NUMBER :</strong> {{$farmer->mobile}}
                                                    <br><br>
                                                    <strong>MARITAL STATUS :</strong> married{{$farmer->marital_status}}
                                                    <br><br>
                                                    <strong>NUMBER OF CHILDREN:</strong> {{$farmer->number_of_children}}
                                                    <br><br>
                                                    <strong>NUMBER OF DEPENDENTS:</strong> {{$farmer->mumber_of_dependents}}
                                                </td> 
                                                <td colspan="2"> 
                                                    <div class="col-md-12 imgUp">
                                                        <div class="imagePreview" @if ($farmer->profile_image) 
                                                             style="background-image: url({{asset(config('app.file_path').'/'.$farmer->profile_image)}})"
                                                             @else
                                                             style="background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg)"
                                                             @endif >
                                                    </div>
                                                </div><!-- col-2 -->
                                            </td>
                                        </tr>
                                        <tr> 
                                            <th colspan="3"><h4>SPOUSE DETAILS</h4></th> 
                                            <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                        </tr>
                                        <tr> 
                                            <td colspan="3"> 
                                                <strong>NAME:</strong> {{$farmer->spousalDetail->s_firstname}}
                                                <br><br>
                                                <strong>BIRTH DATE:</strong> {{$farmer->spousalDetail->s_birth_date}}
                                            </td>    
                                            <td colspan="2"> 
                                                <strong>SURNAME:</strong> {{$farmer->spousalDetail->s_surname}}       
                                                <br><br>
                                                <strong>PHONE NUMBER:</strong> {{$farmer->spousalDetail->s_mobile}}
                                            </td> 
                                        </tr>  
                                        <tr> 
                                            <th colspan="3"><h4>BANK DETAILS</h4></th> 
                                            <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                        </tr>
                                        <tr> 
                                            <td colspan="3"> 
                                                <strong>BANK NAME:</strong> {{$farmer->bankDetail->bank_name}}
                                                <br><br>
                                                <strong>BRANCH NAME:</strong> {{$farmer->bankDetail->branch_name}}
                                            </td>    
                                            <td colspan="2"> 
                                                <strong>ACCOUNT NO:</strong> {{$farmer->bankDetail->account_no}}       
                                                <br><br>
                                                <strong>MOBILE MONEY NUMBER:</strong> {{$farmer->bankDetail->mobile_money}}
                                            </td> 
                                        </tr>  
                                        <tr> 
                                            <th colspan="3"><h4>FARM DETAILS</h4></th> 
                                            <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                                        </tr>

                                    </thead> 
                                    <tbody> 
                                        <tr> 
                                        <tr>
                                            <th>Farm Status</th>   
                                            <th>Crop Type</th> 
                                            <th>Seedlings</th> 
                                            <th>Size Of Land</th> 
                                            <th>Year Established</th> 
                                            <th>Community</th> 
                                            <th>Location</th>
                                        </tr> 
                                        </tr>
                                        <tr> 
                                        @foreach($farmer->farmDetail as $farm)
                                        <tr> 
                                            <td>{{$farm->status}}</td> 
                                            <td>{{$farm->crop->name}}</td> 
                                            <td>{{$farm->seedlings}}</td> 
                                            <td>{{$farm->size_of_land}}</td>   
                                            <td>{{$farm->year_stablished}}</td>  
                                            <td>{{$farm->district}}</td>  
                                            <td>{{$farm->location}}</td>   
                                           
                                        </tr> 
                                        @endforeach
                                        </tr>
                                    </tbody> 
                                    <tfoot> 
                                        <tr>
                                        <th colspan="10"></th>                                          
                                        </tr> 
                                    </tfoot> 
                                </table>
                            </div>
                        </div>
                    </div>
 </div>
             

                    @endsection     


