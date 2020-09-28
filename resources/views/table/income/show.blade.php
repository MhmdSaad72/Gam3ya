@extends('adminlte::page')

@section('title', 'الوارد')

@section('content_header')
<h1>الوارد</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/table/income') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $income->amount }} </td>
                </tr>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $income->name }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي </th>
                  <td> {{ $income->national_id }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $income->created_at }} </td>
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
