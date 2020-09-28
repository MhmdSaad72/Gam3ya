@extends('adminlte::page')

@section('title', 'التبرع')

@section('content_header')
<h1>التبرع</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/treatment/donation') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $donation->name }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي </th>
                  <td> {{ $donation->national_id }} </td>
                </tr>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $donation->amount }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $donation->created_at }} </td>
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
