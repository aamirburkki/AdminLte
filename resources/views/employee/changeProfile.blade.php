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
  <form class="needs-validation" action="{{ url('/myprofile/update/'.$employee->id)}}" method="post" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationName">{{ __('messages.name') }}</label>
        <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name}}" placeholder="{{ __('messages.name') }}" required>
        @error('firstname')
        <div class="text-danger">{{ __('messages.firstnameRequired') }}</div>
            @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationName">{{ __('messages.name') }}</label>
        <input type="text" class="form-control" name="last_name" value="{{ $employee->last_name}}" placeholder="{{ __('messages.name') }}" required>
        @error('lastname')
        <div class="text-danger">{{ __('messages.lastnameRequired') }}</div>
            @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationEmail">{{ __('messages.email') }}</label>
        <input type="text" class="form-control" name="email" value="{{ $employee->email}}" placeholder="{{ __('messages.name') }}" required>
        <@error('email')
        <div class="text-danger">{{ __('messages.emailRequired') }}</div>
            @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label for="validationPhone">{{ __('messages.Phone') }}</label>
        <input type="text" class="form-control" name="phone" value="{{ $employee->phone}}" placeholder="{{ __('messages.Phone') }}" required>
        @error('phone')
        <div class="text-danger">{{ __('messages.phoneRequired') }}</div>
            @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label for="validationPhone">{{ __('messages.Company') }}</label>
          <select name="company_id">
            @foreach ($companies as $item)
                <option value="{{ $item->id ?? '' }}" {{ ($item->id == $employee->company_id)?'selected':'' }} >{{ $item->name ?? '' }}</option>
            @endforeach
          </select>
        <div class="invalid-tooltip">
          {{ __('messages.phone_error') }}
        </div>
      </div>

    <button class="btn btn-primary" type="submit">{{ __('messages.create') }}</button>
  </form>

  
  
</div>
@endsection