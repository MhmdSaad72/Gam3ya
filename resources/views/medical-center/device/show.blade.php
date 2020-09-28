@extends('adminlte::page')

@section('title', 'الجهاز')

@section('content_header')
<h1>الجهاز</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/medical-center/device') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المكان </th>
                  <td> {{ $device->place }} </td>
                </tr>
                <tr>
                  <th> الشخص </th>
                  <td> {{ $device->person }} </td>
                </tr>
                <tr>
                  <th> تاريخ الدخول </th>
                  <td> {{ $device->entry_date }} </td>
                </tr>
                <tr>
                  <th> تاريخ الخروج </th>
                  <td> {{ $device->exit_date }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $device->created_at }} </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
