{!! Form::select('service[region_id]',['' => 'Select Region']+$regions,!empty($region) ? $region->id : null, array('class' => 'form-control required','autofocus'=>'autofocus')) !!}
<div class="form-control-position">
    <i class="bx bx-user-circle"></i>
</div>
@error('service.region_id')
<span class="invalid-feedback" role="alert"></span>
@enderror
