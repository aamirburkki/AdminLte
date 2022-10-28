@extends('layouts.app')
@push('page_css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

@endpush
@section('content')
<div class="container-fluid">
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
    <div class="d-flex justify-content-center mb-2" >
        <h1>{{ __('messages.ListEmployee') }}</h1>
    </div>
    <table id="example" class="stripe" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('messages.First_Name') }}</th>
                <th>{{ __('messages.Last_Name') }}</th>
                <th>{{ __('messages.Email') }}</th>
                <th>{{ __('messages.Phone') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $employee)
            <tr>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('page_scripts')

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    // alert('hi')
    }); 
</script>
@endpush