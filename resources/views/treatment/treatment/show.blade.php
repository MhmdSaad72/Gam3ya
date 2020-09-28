@extends('adminlte::page')

@section('title', 'العلاج')

@section('content_header')
<h1>العلاج</h1>
@stop
@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/treatment/treatment') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> عرض</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> رقم المسلسل </th>
                  <td> {{ $treatment->serial_number }} </td>
                </tr>
                <tr>
                  <th> رقم الروشتة </th>
                  <td> {{ $treatment->prescription_number }} </td>
                </tr>
                <tr>
                  <th> اسم الصارف </th>
                  <td> {{ $treatment->teller_name }} </td>
                </tr>
                <tr>
                  <th> تاريخ الصرف </th>
                  <td> {{ $treatment->exchange_date }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي </th>
                  <td> {{ $treatment->national_id }} </td>
                </tr>
                <tr>
                  <th> العنوان </th>
                  <td> {{ $treatment->address }} </td>
                </tr>
                <tr>
                  <th> رقم التليفون </th>
                  <td> {{ $treatment->phone }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $treatment->created_at }} </td>
                </tr>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $treatment->amount }} </td>
                </tr>
                <tr>
                  <th> سبب الصرف </th>
                  <td> {{ $treatment->reason }} </td>
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
