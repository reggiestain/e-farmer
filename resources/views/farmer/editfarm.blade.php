<form id="formFarm" action="{{route('farmer.editfarm',$farm)}}">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">    
            <label class="control-label">Crop Type</label>
            <input type="hidden" name="farmer_id" value="{{$farm->farm_id}}">
            <select class="form-control" id="selectUser" name="crop_id" class="form-control @error('crop_type_id') is-invalid @enderror" >
                <option value="{{$farm->crop->id}}" disabled selected>{{ $farm->crop->name ??'Please select crop type'}}</option>        
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
        <div class="form-group col-md-6">
            <label class="control-label">Seedlings</label>
            <input maxlength="200" type="text" name="seedlings" class="form-control @error('seedlings') is-invalid @enderror" placeholder="Enter Seedlings" />
            @error('seedlings')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">Size Of Land</label>
            <input maxlength="200" type="text" name="size_of_land" class="form-control @error('size_of_land') is-invalid @enderror" placeholder="Enter Size of Land" />
            @error('size_of_land')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Established Year</label>
            <input maxlength="200" type="text" name="year_established" class="form-control @error('year_established') is-invalid @enderror" placeholder="Enter Establish Year" />
            @error('year_established')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">District</label>
            <input maxlength="200" type="text" name="district" class="form-control @error('district') is-invalid @enderror" placeholder="Enter District" />
            @error('district')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Longitude</label>
            <input maxlength="200" type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" placeholder="Enter Longitude" />
            @error('longitude')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">Latitude</label>
            <input maxlength="200" type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" placeholder="Enter Longitude" />
            @error('latitude')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">    
            <label class="control-label">Region</label>
            <select class="form-control" id="selectUser" name="region_id" class="form-control @error('region_id') is-invalid @enderror" >
                <option value="{{$farm->region->name}}" disabled selected>{{ $farm->region->name ?? 'Please select region'}}</option>        
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
    </div>    
    <button class="btn btn-primary nextBtn pull-right" type="submit">Submit</button>  

</form>

