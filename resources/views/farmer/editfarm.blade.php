<form id="updateFarm" action="{{route('farmer.updatefarm',$farms)}}">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">    
            <label class="control-label">Crop Type</label>
            <input type="hidden" name="farmer_id" value="{{$farms->farmer_id}}">
            <select name="crop_id" class="form-control" id="selectUser" class="form-control @error('crop_id') is-invalid @enderror" >
                <option value="{{$farms->crop->id}}" disabled selected>{{ $farms->crop->name ??'Please select crop type'}}</option>        
                @foreach($cropTypes as $cropType)
                <option value="{{$cropType->id}}">{{ $cropType->name }}</option>
                @endforeach
            </select>
            @error('crop_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>       
        <div class="form-group col-md-6">
            <label class="control-label">Seedlings</label>
            <input maxlength="200" type="text" name="seedlings"  value="{{$farms->seedlings}}" class="form-control @error('seedlings') is-invalid @enderror" />
            @error('seedlings')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">    
            <label class="control-label">Farm Status</label>           
            <select class="form-control" id="selectUser" name="status" class="form-control @error('status') is-invalid @enderror" >
                <option value="{{$farms->status ?? 'In-active'}}" disabled selected>{{ $farms->status ??'Please select status'}}</option>        
                @foreach($statuses as $status)
                <option value="{{$status}}">{{ $status }}</option>
                @endforeach
            </select>
            @error('region_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label class="control-label">Location</label>
            <input maxlength="200" type="text" name="location" value="{{$farms->location}}"  class="form-control @error('location') is- @enderror" placinvalideholder="Enter Farm location" />
            @error('location')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">Size Of Land</label>
            <input maxlength="200" type="text" name="size_of_land" value="{{$farms->size_of_land}}"  class="form-control @error('size_of_land') is-invalid @enderror" />
            @error('size_of_land')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">    
            <label class="control-label">Land Measurement Unit</label>
            <select name="unit" class="form-control" id="selectUser" class="form-control @error('unit') is-invalid @enderror" >
                <option value="{{$farms->unit}}" disabled selected>{{ $farms->unit ??'Please measurement unit'}}</option>        
                @foreach($units as $unit)
                <option value="{{$unit}}">{{ $unit }}</option>
                @endforeach
            </select>
            @error('crop_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div> 
    </div>    
    <div class="row"> 
    <div class="form-group col-md-6">
            <label class="control-label">Annual Income</label>
            <input maxlength="200" type="number" name="income"  value="{{$farms->income}}" class="form-control @error('income') is-invalid @enderror" />
            @error('income')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class='form-group col-md-6'>
            <label class="control-label">Established Year</label>
            <div class="form-group">
                <div class='input-group date' id='date-year'>
                    <input type='text' name="year_exstablished" class="form-control @error('year_exstablished') is-invalid @enderror" value="{{ $farms->year_exstablished }}" autocomplete="year_exstablished"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            @error('year_exstablished')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>   
    </div>
    <div class="row">
        <div class="form-group col-6">    
            <label class="control-label">District</label>          
            <select class="form-control" id="selectUser" name="district_id" class="form-control @error('district_id') is-invalid @enderror" >
                <option value="{{$farms->district_id ?? '0'}}" selected>{{ $farms->district->name??'Please district'}}</option>        
                @foreach($districts as $district)
                <option value="{{$district->id}}">{{ $district->name }}</option>
                @endforeach
            </select>
            @error('district_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label class="control-label">Longitude</label>
            <input maxlength="200" type="text" name="longitude" value="{{$farms->longitude}}" class="form-control @error('longitude') is-invalid @enderror" placeholder="Enter Longitude" />
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
            <input maxlength="200" type="text" name="latitude" value="{{$farms->latitude}}" class="form-control @error('latitude') is-invalid @enderror" placeholder="Enter Longitude" />
            @error('latitude')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">    
            <label class="control-label">Region</label>
            <select class="form-control" id="selectUser" name="region_id" class="form-control @error('region_id') is-invalid @enderror" >
                <option value="{{$farms->region->name ?? '0'}}" disabled selected>{{ $farms->region->name ?? 'Please select region'}}</option>        
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

<script>
    $('#date-year').datepicker({
        format: "yyyy",
        weekStart: 1,
        orientation: "bottom",
        language: "es",
        keyboardNavigation: false,
        viewMode: "years",
        minViewMode: "years"
    });
</script>

