@extends('adminlte::page')

@section('title', 'المسجد')

@section('content_header')
<h1>المسجد</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/mosque/mosque') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $mosque->name }} </td>
                </tr>
                <tr>
                  <th> العنوان </th>
                  <td> {{ $mosque->address }} </td>
                </tr>
                <tr>
                  <th> الكود </th>
                  <td> {{ $mosque->code }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $mosque->created_at }} </td>
                </tr>
                <tr>
                  <th> العمال </th>
                  <td>
                    @foreach ($mosque->workers as $worker)
                      <td>{{ $worker->name }}</td>
                    @endforeach
                  </td>
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
