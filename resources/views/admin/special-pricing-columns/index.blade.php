@extends('layouts.admin.main')

@section('content')
 <!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-body">

        <section id="basic-tabs-components">
          <div class="card">
            <div class="card-header">

              <div class="card-title w100">
                <div class="row">
                  <div class="col-md-6">
                      <h4 class="card-title text-hena">Special Pricing Columns</h4>
                  </div>
                    <div class="col-md-6"><a href="{{route('special-pricing-columns.create')}}"
                                             class="btn round btn-hena pull-right add-special-pricing-column">Add</a></div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" aria-controls="home" role="tab"
                    aria-selected="true">
                    <span class="align-middle">Active</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab"
                    aria-selected="false">
                    <span class="align-middle">Archive</span>
                  </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table dtable" id="specialPricingColumn-datatable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($specialPricingColumns as $specialPricingColumn)
                              <tr>
                                <td class="text-bold-500">{{ $specialPricingColumn->name }}</td>
                                <td>
                                    <a class="edit-special-pricing-column" href="{{route('special-pricing-columns.edit',$specialPricingColumn->id)}}">
                                        <i class="bx bx-edit-alt text-hena mr-1"></i>
                                    </a>
                                    <a href="{{route('special-pricing-columns.destroy',$specialPricingColumn->id)}}" data-specialPricingColumnid="{{$specialPricingColumn->id}}" class="delete-confirm">
                                        <i class="bx bx-trash text-danger mr-1"></i>
                                    </a>
                                    <div class="custom-control custom-switch custom-switch-success mr-2"
                                         style="display: inline-block;">
                                      <input type="checkbox" class="custom-control-input active-role" data-specialPricingColumnid= "{{$specialPricingColumn->id}}" id="customSwitchcolor{{$specialPricingColumn->id}}" data-url="{{route('admin.special-pricing-columns.active-inactive',$specialPricingColumn->id)}}" @if($specialPricingColumn->is_active) checked @endif>
                                      <label class="custom-control-label" for="customSwitchcolor{{$specialPricingColumn->id}}" ></label>
                                    </div>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                    @include('admin.special-pricing-columns.archive-list')
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
    @include('admin.partials._session-message')
    <script src="{{asset('admin/js/scripts/pages/special-pricing-columns/list.js')}}"></script>
@endsection
