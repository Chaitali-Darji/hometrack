{!! Form::select('service[service_type_id]',['' => 'Select Service Type']+$service_types,!empty($service_type) ? $service_type->id : null, array('class' => 'form-control required','autofocus'=>'autofocus')) !!}
<div class="form-control-position">
    <i class="bx bx-user-circle"></i>
</div>
@error('service.service_type_id')
<span class="invalid-feedback" role="alert"></span>
@enderror
