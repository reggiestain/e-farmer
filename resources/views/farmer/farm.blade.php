<div class="table-responsive">
    <div><a class="btn btn-default add-farm" style="float:right"><i class="fas fa-fw fa-plus"></i></a></div>
    <table class="table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Farm Status</th>
                <th>Crop Type</th>
                <th>Seedlings</th>
                <th>Size Of Land</th>
                <th>Year Established</th>
                <th>District</th>
                <th>Location</th>                                                               
                <th>Region</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($farmers->farmDetail as $farm )
            <tr>
                <td>{{$farm->status}}</td>
                <td>{{$farm->crop->name}}</td>
                <td>{{$farm->seedlings}}</td>
                <td>{{$farm->size_of_land}}</td>
                <td>{{$farm->year_exstablished}}</td>
                <td>{{$farm->district->name ?? ''}}</td>
                <td>{{$farm->location}}</td>                                                           
                <td>{{$farm->region->name ?? ''}}</td>
                <td>                                                   
                    <a class="btn btn-success">View</a> 
                    <a class="btn btn-primary edit-f" href="{{route('farmer.editfarm',$farm->id)}}">Edit</a> 
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>
