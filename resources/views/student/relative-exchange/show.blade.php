@extends('adminlte::page')

@section('title', 'الصرف العيني')

@section('content_header')
    <h1>الصرف العيني</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/student/relative-exchange') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $relativeexchange->amount }} </td>
                </tr>
                <tr>
                  <th> السبب </th>
                  <td> {{ $relativeexchange->reason }} </td>
                </tr>
                <tr>
                  <th> الطالب </th>
                  <td> {{ $relativeexchange->student->name }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $relativeexchange->created_at }} </td>
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
