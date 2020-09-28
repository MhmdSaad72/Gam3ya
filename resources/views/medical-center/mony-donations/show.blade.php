@extends('adminlte::page')

@section('title', 'الصرف المادي')

@section('content_header')
<h1>الصرف المادي</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ route('money-donations.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $mony->name }} </td>
                </tr>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $mony->amount }} </td>
                </tr>
                <tr>
                  <th> التفاصيل </th>
                  <td> {{ $mony->details }} </td>
                </tr>
                <tr>
                  <th> رقم التليفون </th>
                  <td> {{ $mony->phone }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $mony->created_at }} </td>
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
