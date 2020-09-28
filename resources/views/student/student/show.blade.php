@extends('adminlte::page')

@section('title', 'الطالب')

@section('content_header')
<h1>الطالب</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/student/student') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> الاسم </th>
                  <td> {{ $student->name }} </td>
                </tr>
                <tr>
                  <th> اسم اﻷب </th>
                  <td> {{ $student->father_name }} </td>
                </tr>
                <tr>
                  <th> اسم أﻷم </th>
                  <td> {{ $student->mother_name }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي </th>
                  <td> {{ $student->national_id }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي للأب </th>
                  <td> {{ $student->father_national_id }} </td>
                </tr>
                <tr>
                  <th> الرقم القومي للأم </th>
                  <td> {{ $student->mother_national_id }} </td>
                </tr>
                <tr>
                  <th> المدرسة </th>
                  <td> {{ $student->school }} </td>
                </tr>
                <tr>
                  <th> الفرقة </th>
                  <td> {{ $student->band }} </td>
                </tr>
                <tr>
                  <th> تاريخ الميلاد </th>
                  <td> {{ $student->birth_date }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $student->created_at }} </td>
                </tr>
                <tr>
                  <th> اثبات القيد </th>
                  @if (isset($extension) && $extension == 'pdf')
                    <td><a href="{{asset('storage/' . $student->register)}}" class="btn btn-secondary"><i class="fa fa-file-pdf" aria-hidden="true"></i>  عرض</a></td>
                  @else
                    <td> <img src="{{asset('storage/'.$student->register)}}" style="width:50%"> </td>
                  @endif
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
