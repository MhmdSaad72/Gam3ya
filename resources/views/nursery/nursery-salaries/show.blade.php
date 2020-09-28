@extends('adminlte::page')

@section('title', 'المرتب')

@section('content_header')
<h1>المرتب</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ route('nursery-salaries.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $nursery_salaries->amount }} </td>
                </tr>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $nursery_salaries->name }} </td>
                </tr>
                <tr>
                  <th> التفاصيل </th>
                  <td> {{ $nursery_salaries->phone }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $nursery_salaries->created_at }} </td>
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
