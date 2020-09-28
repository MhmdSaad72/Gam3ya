@extends('adminlte::page')

@section('title', 'راتب الطبيب')

@section('content_header')
<h1>راتب الطبيب</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/medical-center/doctor-salary') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $doctor_salary->name }} </td>
                </tr>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $doctor_salary->amount }} </td>
                </tr>
                <tr>
                  <th> التفاصيل </th>
                  <td> {{ $doctor_salary->details }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $doctor_salary->created_at }} </td>
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
