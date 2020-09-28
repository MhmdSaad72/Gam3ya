@extends('adminlte::page')

@section('title', 'الولد')

@section('content_header')
<h1>الولد</h1>
@stop


@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/quran-memorization/boy') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>

          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $boy->name }} </td>
                </tr>
                <tr>
                  <th> التليفون </th>
                  <td> {{ $boy->phone }} </td>
                </tr>
                <tr>
                  <th> التفاصيل </th>
                  <td> {{ $boy->details }} </td>
                </tr>
                <tr>
                  <th> اسم المحفظ </th>
                  <td> {{ $boy->teacher->name ?? ''}} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $boy->created_at }} </td>
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
