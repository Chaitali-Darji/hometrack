@if( Session::has( 'success' ))
    <div class="alert alert-success alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex align-items-center">
          <span>
            {{ Session::get( 'success' ) }}
          </span>
        </div>
      </div>
@elseif( Session::has( 'error' ))                         
     <div class="alert alert-danger alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex align-items-center">
          <span>
            {{ Session::get( 'error' ) }}
          </span>
        </div>
      </div>
@endif