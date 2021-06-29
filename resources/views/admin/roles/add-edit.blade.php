@extends('layouts.admin.main')

@section('content')
 <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-body">
            <section id="basic-input">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Role Add/Edit</h4>
                    </div>
                    <div class="card-body">
                     @if( Session::has( 'success' ))
                         {{ Session::get( 'success' ) }}
                    @elseif( Session::has( 'error' ))
                         {{ Session::get( 'error' ) }}
                    @endif

                      @if(isset($role))
                         {!! Form::model($role, array('route' => array('roles.update', $role->id))) !!}
                         {{ method_field('PATCH') }}
                         <input type="hidden" value="{{$role->id}}" name="id">
                      @else
                        {!! Form::open(array('route' => 'roles.store', 'autocomplete' => 'off')) !!}
                      @endif    
                          <div class="row">
                            <div class="col-md-6">
                              <fieldset class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('role[name]', isset($role) ? $role->name : null, array('class' => 'form-control')) !!}
                                 @error('role[name]')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </fieldset>

                              <fieldset class="form-group">
                                {!! Form::label('permissions', 'Permissions:') !!}<br/>
                              </fieldset>

                              @foreach($modules as $key => $module)
                                <fieldset class="form-group">
                                  <div class="checkbox">
                                    <input type="checkbox" class="checkbox-input" id="checkbox{{$key}}" name="permissions[]" value="{{$key}}" @if (isset($role) && array_search($key, array_column($role->modules->toArray(), 'id')) !== FALSE) checked @endif/>
                                    <label for="checkbox{{$key}}">{{$module}}</label>
                                  </div>
                                </fieldset>
                              @endforeach                              

                            </div>
                          </div>
                          <div class="row">
                            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
                            {!! link_to_route('roles.index', 'Cancel', null, array('class' => 'btn')) !!}
                          </div>
                      {!! Form::close() !!} 
                    </div>
                  </div>
                </div>
              </div>
            </section>
        </div>
      </div>
    </div>

    <!-- END: Content-->
@endsection

@section('page-script')
    <script src="{{asset('admin/js/scripts/pages/roles/list.js')}}"></script>
@endsection