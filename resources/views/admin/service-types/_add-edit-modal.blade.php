<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-hena" id="myModalLabel33">{{(isset($region) ? 'Edit' : 'Create')}} Service Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="bx bx-x"></i>
            </button>
        </div>
        @if(isset($service_type))
            {!! Form::model($service_type, array('route' => array('service-types.update', $service_type->id),'id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
            {{ method_field('PATCH') }}
            {!! Form::hidden('id', isset($service_type) ? $service_type->id : null) !!}
        @else
            {!! Form::open(array('route' => 'service-types.store', 'autocomplete' => 'off','id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
        @endif
        <div class="modal-body">
            <fieldset class="form-group">
                {!! Form::label('name', 'Name:') !!}
                <div class="form-label-group position-relative has-icon-left">
                    {!! Form::text('service_type[name]', isset($service_type) ? $service_type->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Service Type Name')) !!}
                    <div class="form-control-position">
                        <i class="bx bx-lock"></i>
                    </div>
                    @error('service_type.name')
                    <span class="invalid-feedback" service_type="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </fieldset>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn round btn-light-secondary" data-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button type="submit" class="btn pull-right round btn-hena service-type-modal-submit" service-type-url="{{route('admin.service-types.get-dropdown-list')}}">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
