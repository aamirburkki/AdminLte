@extends('layouts.app')
@push('page_css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

@endpush
@section('content')
@if ($message = Session::get('message'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
<div class="container-fluid">
    
    <div class="d-flex justify-content-center mb-2" >
        <h1>{{ __('messages.ListCompanies') }}</h1>
    </div>
    <table id="example" class="stripe" style="width:100%">
        <thead>
            <tr>
                <th> {{ __('messages.Company_Name') }}</th>
                <th> {{ __('messages.Company_Email') }}</th>
                <th> {{ __('messages.Company_Logo') }}</th>
                <th> {{ __('messages.Website') }}</th>
                <th> {{ __('messages.Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td><img src="{{ asset('storage/'.$company->logo) }}" alt="{{$company->logo}}" width="100"></td>
                <td>{{$company->website}}</td>
                @if (Auth::user()->role == 0)
                <td><a href="{{ url('/company/apply/' . $company->id) }}" class="btn btn-info">{{ __('messages.apply') }}</a></td>

                @elseif (Auth::user()->role == 1)
                <td><a href="{{ url('edit/' . $company->id) }}" class="btn btn-info">{{ __('messages.edit') }}</a>
                <a href="{{ url('delete/' . $company->id) }}" class="btn btn-danger">{{ __('messages.delete') }}</a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {!! $companies->links() !!}
    </div>
</div>
@endsection

@push('page_scripts')

<script>
    $(document).ready(function () {
        $('#example').DataTable({
        paging: false,
    });    
    }); 
    
</script>
@endpush