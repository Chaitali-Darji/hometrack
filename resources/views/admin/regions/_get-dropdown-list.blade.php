{!! Form::select('region_id[]',['' => 'Select Region']+$regions,!empty($region) ? $region->id : null, array('class' => 'form-control required parent_filter_select2','id' => 'parent_filter_select2','autofocus'=>'autofocus', 'multiple' => 'multiple')) !!}
<div class="form-control-position">
    <i class="bx bx-user-circle"></i>
</div>
@error('service.region_id')
<span class="invalid-feedback" role="alert"></span>
@enderror
