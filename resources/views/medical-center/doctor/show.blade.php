@extends('adminlte::page')

@section('title', 'الطبيب')

@section('content_header')
<h1>الطبيب</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/medical-center/doctor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $doctor->name }} </td>
                </tr>
                <tr>
                  <th> التخصص </th>
                  <td> {{ $doctor->specialization }} </td>
                </tr>
                <tr>
                  <th> الراتب </th>
                  <td> {{ $doctor->salary }} </td>
                </tr>
                <tr>
                  <th> المواعيد </th>
                  <td> @foreach ( $doctor->dates  as  $value)
                    <td>{{ Carbon\Carbon::parse($value->time)->format('h:i A') }} - {{ $value->days }}</td>
                  @endforeach </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $doctor->created_at }} </td>
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
