@extends('layouts.pdf')
@section('content')
<div class="table-responsive">
    <table class="table table-striped"> 
        <thead> 
            <tr> 
                <th colspan="6"><h4>PERD FARMER DATA COLLECTION SHEET</h4></th> 
                <th></th><th></th><th></th><th></th><th></th><th></th>
            </tr> 
            <tr> 
                <td colspan="3"> 
                    <strong>APPLICATION No:</strong> #{{$farmer->id}}
                    <br><br>
                    <strong>REGION:</strong> {{$farmer->farmDetail[0]->region->name ?? ''}}
                    <br><br>
                    <strong>DISTRICT:</strong> {{$farmer->farmDetail[0]->district->name ?? ''}}
                    <br><br>
                    <strong>COMMUNITY NAME:</strong> {{$farmer->farmDetail[0]->location}}
                </td> 
                <td colspan="3"> 
                    <strong>NAME OF EXTENSION OFFICER:</strong> {{$farmer->user->name}}
                    <br><br>
                    <strong>PHONE NUMBER OF EXTENSION OFFICER:</strong> {{$farmer->user->mobile}}
                    <br><br>
                    <strong>DATA COLLECTION DATE:</strong> {{$farmer->created_at}}
                </td> 
                <td colspan="2">

                </td>
            </tr> 
            <tr> 
                <th colspan="3"><h4>FARMER DETAILS</h4></th> 
                <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
            </tr>
            <tr> 
                <td colspan="3"> 
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
                    <strong>MARITAL STATUS :</strong> {{$farmer->marital_status}}
                    <br><br>
                    <strong>NUMBER OF CHILDREN:</strong> {{$farmer->number_of_children}}
                    <br><br>
                    <strong>NUMBER OF DEPENDENTS:</strong> {{$farmer->mumber_of_dependents}}
                </td> 
                <td colspan="3">
                    @if ($farmer->profile_image) 
                    <img src="{{asset(config('app.file_path').'/'.$farmer->profile_image)}}" height="120" width="120"/>
                    @else

                    @endif 

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
                <td colspan="3">

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
                </td> 
                <td colspan="3">

                </td>
            </tr>  
            <tr> 
                <th colspan="3"><h4>FARM DETAILS</h4></th> 
                <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
            </tr>

        </thead> 
        <tbody>  
            <tr>
                <th>Farm Status</th>   
                <th>Crop Type</th> 
                <th>Seedlings</th> 
                <th>Size Of Land</th> 
                <th>Year Established</th> 
                <th>District</th> 
                <th>Location</th>
            </tr> 
            @foreach($farmer->farmDetail as $farm)
            <tr>                     
                <td>{{$farm->status}}</td> 
                <td>{{$farm->crop->name}}</td> 
                <td>{{$farm->seedlings}}</td> 
                <td>{{$farm->size_of_land}}</td>   
                <td>{{$farm->year_stablished}}</td>  
                <td>{{$farm->district->name ?? ''}}</td>  
                <td>{{$farm->location ?? ''}}</td>                   
            </tr> 
            @endforeach
        </tbody> 
        <tfoot> 
            <tr>
                <th colspan="10"></th>                                          
            </tr> 
        </tfoot> 
    </table>

</div>
<div class="container">
    <div>Farmer Signature:..................................................................</div>
</div>
<br/><br/><br/>
<footer class="sticky-footer bg-white" style="padding:0px 0px">
    <div class="container my-auto">
        <div class="copyright my-auto">
            <span>
                Sponsored by
                <img src="{{ public_path('img/logo/perd.png')}}" style="width:10%">
                <img src="{{ public_path('img/logo/fng.png')}}" style="width:20%;margin-top:20px">
                <img src="{{ public_path('img/logo/local-gov.png')}}" class="rounded-circle" style="width:8%">
                <img src="{{ public_path('img/logo/adb.png')}}" class="rounded-circle" style="width:10%">
            </span>
            <span style="margin-left:350px">            
                Powered by
                <img src="{{ public_path('img/logo/trojan.png')}}" style="width:10%">
            </span>
        </div>
    </div>
</footer>
@endsection     


