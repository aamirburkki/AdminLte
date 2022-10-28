@extends('layouts.app')

@section('content')
<div class="card-body">
  <h1>{{ __('messages.Form') }}</h1>
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
  <form class="needs-validation" action="{{url('store')}}" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationName">{{ __('messages.name') }}</label>
        <input type="text" class="form-control" name='name' placeholder="{{ __('messages.name') }}">
        @error('name')
    <div class="text-danger">{{ __('messages.nameRequired') }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationEmail">{{ __('messages.email') }}</label>
        <input type="text" class="form-control" name='email'  placeholder="{{ __('messages.email') }}" required>
        @error('email')
    <div class="text-danger">{{ __('messages.emailRequired') }}</div>
        @enderror
      </div>
      <div class="col-md-6 mb-3">
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationLogo">{{ __('messages.logo') }}</label>
        <div class="input-group">
          <input type="file" class="form-control-file" name='logo'>
          @error('logo')
          <div class="text-danger">{{ __('messages.logoRequired') }}</div>
              @enderror
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationWebsite">{{ __('messages.website') }}</label>
        <input type="text" class="form-control" name='website' placeholder="{{ __('messages.website') }}" required>
        @error('website')
    <div class="text-danger">{{ __('messages.websiteRequired') }}</div>
        @enderror
      </div>
    </div>
    <button class="btn btn-primary" type="submit">{{ __('messages.create') }}</button>
  </form>
</div>
@endsection