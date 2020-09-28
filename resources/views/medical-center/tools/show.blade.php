@extends('adminlte::page')

@section('title', 'المستلزمات')

@section('content_header')
<h1>المستلزمات</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/medical-center/tools') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $tool->name }} </td>
                </tr>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $tool->amount }} </td>
                </tr>
                <tr>
                  <th> التفاصيل </th>
                  <td> {{ $tool->details }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $tool->created_at }} </td>
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
