<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-hena" id="myModalLabel33">{{(isset($special_pricing_column) ? 'Edit' : 'Create')}} Special Pricing Column</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="bx bx-x"></i>
            </button>
        </div>
        @if(isset($special_pricing_column))
            {!! Form::model($special_pricing_column, array('route' => array('special-pricing-columns.update', $special_pricing_column->id),'id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
            {{ method_field('PATCH') }}
            {!! Form::hidden('id', isset($special_pricing_column) ? $special_pricing_column->id : null) !!}
        @else
            {!! Form::open(array('route' => 'special-pricing-columns.store', 'autocomplete' => 'off','id' => 'validate-form', 'class' => 'jquery-validate-form')) !!}
        @endif
            <div class="modal-body">
                <fieldset class="form-group">
                    {!! Form::label('name', 'Name:') !!}

                    <div class="form-label-group position-relative has-icon-left">
                        {!! Form::text('special_pricing_column[name]', isset($special_pricing_column) ? $special_pricing_column->name : null, array('class' => 'form-control noSpace required','placeholder'=>'Enter Special Pricing Column Name')) !!}
                        <div class="form-control-position">
                            <i class="bx bx-lock"></i>
                        </div>
                        @error('special_pricing_column.name')
                        <span class="invalid-feedback" special-pricing-column="alert">
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
                <button type="submit" class="btn pull-right round btn-hena modal-submit">Submit</button>
            </div>
            {!! Form::close() !!}
    </div>
</div>
