@extends('adminlte::page')

@section('title', 'الكشف')

@section('content_header')
<h1>الكشف</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ route('nursery-accounts.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $nursery_accounts->amount }} </td>
                </tr>
                <tr>
                  <th> اسم المريض </th>
                  <td> {{ $nursery_accounts->patient_name }} </td>
                </tr>
                <tr>
                  <th> اسم الطبيب </th>
                  <td> {{ $nursery_accounts->doctor_name }} </td>
                </tr>
                <tr>
                  <th> التاريخ </th>
                  <td> {{ $nursery_accounts->date }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $nursery_accounts->created_at }} </td>
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
