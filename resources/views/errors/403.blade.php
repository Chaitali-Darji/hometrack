@extends('layouts.error.main')

@section('content')
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <!-- error 404 -->
            <section class="row flexbox-container">
              <div class="col-xl-6 col-md-7 col-9">
                <div class="card bg-transparent shadow-none">
                  <div class="card-body text-center bg-transparent">
                    <h1 class="error-title">403 Forbidden</h1>
                    <p class="pb-3">You don't have permission to access this page</p>
                    <a href="{{route('dashboard')}}" class="btn btn-primary round glow mt-3">BACK TO HOME</a>
                  </div>
                </div>
              </div>
            </section>
          <!-- error 404 end -->
        </div>
      </div>
    </div>
@endsection