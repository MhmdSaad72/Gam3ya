@extends('adminlte::page')

@section('title', 'البنت')

@section('content_header')
<h1>البنت</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/girls-marriage/girls') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $girl->name }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي </th>
                  <td> {{ $girl->national_id }} </td>
                </tr>
                <tr>
                  <th> التليفون </th>
                  <td> {{ $girl->phone }} </td>
                </tr>
                <tr>
                  <th> تاريخ الميلاد </th>
                  <td> {{ $girl->birth_date }} </td>
                </tr>
                <tr>
                  <th> تاريخ الزواج </th>
                  <td> {{ $girl->marriage_date }} </td>
                </tr>
                <tr>
                  <th> نوع القسم </th>
                  <td> {{ $girl->type }} </td>
                </tr>
                <tr>
                  <th> الحالة </th>
                  <td> {{ $girl->case }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $girl->created_at }} </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @if (count($purchases) > 0)

        <h2>المشتريات</h2>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>الاسم</th>
                    <th>الكود</th>
                    <th>النوع</th>
                    <th>السعر</th>
                    <th>التفاصيل</th>
                    <th>انشئت في</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($purchases as $item)
                    <tr>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->code }}</td>
                      <td>{{ $item->type }}</td>
                      <td>{{ $item->price }}</td>
                      <td>{{ $item->details }}</td>
                      <td>{{ $item->created_at }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
