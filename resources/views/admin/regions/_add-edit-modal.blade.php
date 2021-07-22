<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-hena" id="myModalLabel33">{{(isset($region) ? 'Edit' : 'Create')}} Region</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="bx bx-x"></i>
            </button>
        </div>
        @if(isset($region))
            {!! Form::model($region, array('route' => array('regions.update', $region->id),'id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
            {{ method_field('PATCH') }}
            {!! Form::hidden('id', isset($region) ? $region->id : null) !!}
        @else
            {!! Form::open(array('route' => 'regions.store', 'autocomplete' => 'off','id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
        @endif
            <div class="modal-body">
                <fieldset class="form-group">
                    {!! Form::label('name', 'Name:') !!}

                    <div class="form-label-group position-relative has-icon-left">
                        {!! Form::text('region[name]', isset($region) ? $region->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Region Name')) !!}
                        <div class="form-control-position">
                            <i class="bx bx-lock"></i>
                        </div>
                        @error('region.name')
                        <span class="invalid-feedback" region="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    <div class="form-label-group position-relative has-icon-left">
                        {!! Form::text('region[description]', isset($region) ? $region->description : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Region Description')) !!}
                        <div class="form-control-position">
                            <i class="bx bx-notepad"></i>
                        </div>
                        @error('region.description')
                        <span class="invalid-feedback" region="alert">
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
                <button type="submit" class="btn pull-right round btn-hena modal-submit" region-url="{{route('admin.regions.get-dropdown-list')}}">Submit</button>
            </div>
            {!! Form::close() !!}
    </div>
</div>
