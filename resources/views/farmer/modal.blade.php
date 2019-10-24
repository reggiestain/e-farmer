                                                <div class="form-group">    
                                                    <label class="control-label">Crop Type</label>
                                                    <select class="form-control" id="selectUser" name="crop_id" class="form-control @error('crop_id') is-invalid @enderror" >
                                                       <option value="{{$farmer->farmDetail->crop->name ?? 'Select Region'}}" disabled selected>{{$farmer->farmDetail->crop->name ?? 'crop type'}}</option>       
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
                                                <div class="form-group">
                                                    <label class="control-label">Seedlings</label>
                                                    <input maxlength="200" type="text" name="seedlings" class="form-control @error('seedlings') is-invalid @enderror" value="{{$farmer->farmDetail->seedlings}}"/>
                                                     @error('seedlings')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Size Of Land</label>
                                                    <input maxlength="200" type="text" name="size_of_land" class="form-control @error('size_of_land') is-invalid @enderror" value="{{$farmer->farmDetail->size_of_land}}"/>
                                                     @error('size_of_land')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Established Year</label>
                                                    <input maxlength="200" type="text" name="year_established" class="form-control @error('year_established') is-invalid @enderror" value="{{$farmer->farmDetail->year_established}}" />
                                                     @error('year_established')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">District</label>
                                                    <input maxlength="200" type="text" name="district" class="form-control @error('district') is-invalid @enderror" value="{{$farmer->farmDetail->district}}"/>
                                                     @error('district')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Longitude</label>
                                                    <input maxlength="200" type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{$farmer->farmDetail->longitude}}" />
                                                     @error('longitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Latitude</label>
                                                    <input maxlength="200" type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{$farmer->farmDetail->latitude}}" />
                                                     @error('latitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">    
                                                    <label class="control-label">Region</label>
                                                    <select class="form-control" id="selectUser" name="region_id" class="form-control @error('region_id') is-invalid @enderror" >
                                                        <option value="{{$farmer->farmDetail->region->name ?? 'Select Region'}}" disabled selected>{{$farmer->farmDetail->region->name ?? 'Select Region'}}</option>        
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
                                                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

