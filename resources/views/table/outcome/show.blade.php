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

          <a href="{{ url('/table/outcome') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $outcome->amount }} </td>
                </tr>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $outcome->name }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي </th>
                  <td> {{ $outcome->national_id }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $outcome->created_at }} </td>
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
