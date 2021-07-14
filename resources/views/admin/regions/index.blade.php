<div class="card">
    <div class="card-header">
        <div class="card-title w100">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title">Regions</h4>
                </div>
                <div class="col-md-6"><a href="{{route('regions.create')}}" class="btn round btn-primary pull-right">Add</a>
                </div>
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
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile"
                   role="tab"
                   aria-selected="false">
                    <span class="align-middle">Archive</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                
                <div class="table-responsive">
                    <table class="table" id="regions-datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($regions as $region)
                            <tr>
                                <td class="text-bold-500">{{ $region->name }}</td>
                                <td>
                                    <a href="{{route('regions.edit',$region->id)}}">
                                        <i class="bx bx-edit-alt mr-1"></i>
                                    </a>

                                    <a href="{{route('regions.destroy',$region->id)}}" data-regionid="{{$region->id}}"
                                       class="delete-confirm">
                                        <i class="bx bx-trash mr-1"></i>
                                    </a>

                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1"
                                         style="display: inline-block;">
                                        <input type="checkbox" class="custom-control-input active-region"
                                               data-regionid="{{$region->id}}" id="customSwitchcolor{{$region->id}}"
                                               data-url="{{route('admin.regions.active-inactive',$region->id)}}"
                                               @if($region->is_active) checked @endif>
                                        <label class="custom-control-label"
                                               for="customSwitchcolor{{$region->id}}"></label>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="profile" aria-labelledby="profile-tab" role="tabpanel">
                @include('admin.regions.archive-list')
            </div>
        </div>
    </div>
</div>
