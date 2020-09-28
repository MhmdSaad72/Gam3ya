@extends('adminlte::page')

@section('title', 'الموظف')

@section('content_header')
<h1>الموظف</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/medical-center/employee') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $employee->name }} </td>
                </tr>
                <tr>
                  <th> الوظيفة </th>
                  <td> {{ $employee->job }} </td>
                </tr>
                <tr>
                  <th> الراتب </th>
                  <td> {{ $employee->salary }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي </th>
                  <td> {{ $employee->national_id }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $employee->created_at }} </td>
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
