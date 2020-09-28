@extends('adminlte::page')

@section('title', 'المنصرف')

@section('content_header')
<h1>المنصرف</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ route('nursery-expenses.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $nursery_expenses->amount }} </td>
                </tr>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $nursery_expenses->name }} </td>
                </tr>
                <tr>
                  <th> التفاصيل </th>
                  <td> {{ $nursery_expenses->phone }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $nursery_expenses->created_at }} </td>
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
