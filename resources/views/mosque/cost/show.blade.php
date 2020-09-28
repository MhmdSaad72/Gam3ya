@extends('adminlte::page')

@section('title', 'حساب منصرف')

@section('content_header')
<h1>حساب منصرف</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/mosque/cost') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>

          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $cost->price }} </td>
                </tr>
                <tr>
                  <th> المسجد </th>
                  <td> {{ $cost->mosque->name }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $cost->created_at }} </td>
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
