@extends('adminlte::page')

@section('title', 'الطفل')

@section('content_header')
    <h1>الطفل</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/nursery/children') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> الاسم </th><td> {{ $child->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> تاريخ الميلاد </th><td> {{ $child->birth_date }} </td>
                                    </tr>
                                    <tr>
                                      <th> الرقم القومي </th><td> {{ $child->national_id }} </td>
                                    </tr>
                                    <tr>
                                      <th> السنة الدراسية </th><td> {{ $child->academic_year }} </td>
                                    </tr>
                                    <tr>
                                      <th> الحالة الاجتماعية </th><td> {{ $child->social_status() }} </td>
                                    </tr>
                                    <tr>
                                      <th> النوع </th><td> {{ $child->type ? 'انثي' : 'ذكر' }} </td>
                                    </tr>
                                    <tr>
                                      <th> انشئت في </th><td> {{ $child->created_at }} </td>
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
