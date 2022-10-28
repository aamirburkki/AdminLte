@extends('layouts.app')

@section('content')
<div class="card-body">
  <h1>Edit Company Details</h1>
  {{-- @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div><br />
@endif --}}
<div class="container">
  <form class="needs-validation" action="{{ url('update/'.$company->id)}}" method="post" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationName">{{ __('messages.name') }}</label>
        <input type="text" class="form-control" name="name" value="{{ $company->name}}"  id="validationName" placeholder="{{ __('messages.name') }}" required>
        @error('name')
        <div class="text-danger">{{ __('messages.nameRequired') }}</div>
            @enderror
      </div>
      <div class="col-md-6 mb-3">
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationEmail">{{ __('messages.email') }}</label>
        <input type="text" class="form-control" name="email" value="{{ $company->email}}" id="validationEmail" placeholder="{{ __('messages.name') }}" required>
        @error('email')
    <div class="text-danger">{{ __('messages.emailRequired') }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationLogo">{{ __('messages.logo') }}</label>
        <div class="input-group">
          <img src="{{ asset('storage/'.$company->logo) }}" alt="img" width="50">
          <input type="file" class="form-control-file" name="logo" id="validationLogo">
          
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
    </div>
      <div class="col-md-6 mb-3">
        <label for="validationWebsite">{{ __('messages.website') }}</label>
        <input type="text" class="form-control" id="validationWebsite" name="website" value="{{ $company->website}}" placeholder="{{ __('messages.name') }}" required>
        @error('website')
    <div class="text-danger">{{ __('messages.websiteRequired') }}</div>
        @enderror
      </div>
    </div>
    <button class="btn btn-primary" type="submit">{{ __('messages.create') }}</button>
  </form>
  
</div>
@endsection