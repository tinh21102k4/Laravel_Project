@extends('client.layout.Main')
@section('content-client')
<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 mb-4">
          <h1 class="h2 mb-4">Search results for 
            <mark>
                {{ str_replace(' ', '+', trim(request()->search)) }}
            </mark>
          </h1>
        </div>
        <div class="col-lg-10 text-center">
          <img class="mb-5" src="{{ asset('clients/images/no-search-found.svg') }}" alt="">
          <h3>No Search Found</h3>
        </div>
      </div>
    </div>
  </section>
@endsection