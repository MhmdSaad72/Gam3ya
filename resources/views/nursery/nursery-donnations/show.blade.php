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

          <a href="{{ route('nursery-donnations.index') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $nursery_donnations->amount }} </td>
                </tr>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $nursery_donnations->name }} </td>
                </tr>
                <tr>
                  <th> رقم التليفون </th>
                  <td> {{ $nursery_donnations->phone }} </td>
                </tr>
                <tr>
                  <th> انشئت ف </th>
                  <td> {{ $nursery_donnations->created_at }} </td>
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
