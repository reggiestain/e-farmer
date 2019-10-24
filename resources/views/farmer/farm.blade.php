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

            @foreach($farmers->farmDetail as $farm )
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
