@extends('adminlte::page')

@section('title', 'العامل')

@section('content_header')
<h1>العامل</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/mosque/worker') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $worker->name }} </td>
                </tr>
                <tr>
                  <th> التليفون </th>
                  <td> {{ $worker->phone }} </td>
                </tr>
                <tr>
                  <th> الوظيفة </th>
                  <td> {{ $worker->job }} </td>
                </tr>
                <tr>
                  <th> المسجد </th>
                  <td> {{ $worker->mosque->name }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $worker->created_at }} </td>
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
