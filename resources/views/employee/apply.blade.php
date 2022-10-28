@extends('layouts.app')

@section('content')
<div class="card-body">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div><br />
@endif
<div class="container">
  <form class="needs-validation" action="{{route('storeEmployee')}}" method="POST" novalidate>
    @csrf
    <h2 class="mb-3">{{ __('messages.CompanyAppForm')}}</h2>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationFirstName">{{ __('messages.First_Name') }}</label>
        <input type="text" class="form-control" name='first_name' placeholder="{{ __('messages.First_Name') }}">
        @error('firstname')
        <div class="text-danger">{{ __('messages.firstnameRequired') }}</div>
            @enderror
      </div>
      <div class="col-md-6 mb-3">
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationLastName">{{ __('messages.Last_Name') }}</label>
        <input type="text" class="form-control" name='last_name' placeholder="{{ __('messages.Last_Name') }}" required>
        @error('lastname')
        <div class="text-danger">{{ __('messages.lastnameRequired') }}</div>
            @enderror
      </div>
      <div class="col-md-6 mb-3">
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationEmail">{{ __('messages.Email') }}</label>
          <input type="email" class="form-control" value="{{Auth::user()->email}}" name='email' placeholder="{{ __('messages.Email') }}">
          @error('email')
          <div class="text-danger">{{ __('messages.emailRequired') }}</div>
              @enderror
      </div>
    </div>
    <div class="col-md-6 mb-3">
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationPhone">{{ __('messages.Phone') }}</label>
        <input type="text" class="form-control" name='phone' placeholder="{{ __('messages.Phone') }}" required>
        @error('phone')
        <div class="text-danger">{{ __('messages.phoneRequired') }}</div>
            @enderror
      </div>
    </div>
    <div class="col-md-6 mb-3">
    </div>
      <input type="text" value="{{ $company->id }}" class="form-control" name='company_id' hidden>
    </div>

    <button class="btn btn-primary mt-3" type="submit">{{ __('messages.apply') }}</button>
  </form>
</div>
@endsection