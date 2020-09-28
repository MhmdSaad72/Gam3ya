@extends('adminlte::page')

@section('title', 'المحفظ')

@section('content_header')
<h1>المحفظ</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/quran-memorization/teacher') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $teacher->name }} </td>
                </tr>
                <tr>
                  <th> التليفون </th>
                  <td> {{ $teacher->phone }} </td>
                </tr>
                <tr>
                  <th> المسجد </th>
                  <td> {{ $teacher->mosque }} </td>
                </tr>
                <tr>
                  <th> المواعيد </th>
                  <td> @foreach ( $teacher->dates  as  $value)
                    <td>{{ Carbon\Carbon::parse($value->time)->format('h:i A') }} - {{ $value->days }}</td>
                  @endforeach </td>
                </tr>
                <tr>
                  <th> مكافآت </th>
                  <td> {{ $teacher->rewards }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $teacher->created_at }} </td>
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
