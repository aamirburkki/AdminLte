@extends('layouts.app')
@push('page_css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
@endpush
@section('content')
<div class="container-fluid">
{{-- @dd($employee) --}}
    <div class="card" style="width: 20rem;">
        <img src="{{ asset('storage/'.$employee->company->logo) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><b>{{ __('messages.Name') }}: </b>{{$employee->first_name}} {{$employee->last_name}}</h5>
          <p class="card-text"><b>{{ __('messages.Company_Name') }}: </b>{{$employee->company->name}}</p>
          <a href="{{ url('/myprofile/edit/' . $employee->id) }}" class="btn btn-info btn-sm">{{ __('messages.changeProfile') }}</a>
          <a href="{{ url('/myprofile/delete/' . $employee->id) }}" class="btn btn-danger btn-sm">{{ __('messages.leaveCompany') }}</a>
        </div>
      </div>
@endsection

@push('page_scripts')

<!-- <script>
   $(document).ready(function () {
    $('#example').DataTable();
    // alert('hi')
}); -->
<!-- </script> -->
@endpush