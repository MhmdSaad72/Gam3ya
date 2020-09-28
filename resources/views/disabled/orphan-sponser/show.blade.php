@extends('adminlte::page')

@section('title', 'الكافل')

@section('content_header')
    <h1>الكافل</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/disabled/orphan-sponser') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      <th> الاسم </th><td> {{ $orphansponser->name }} </td>
                                    </tr>
                                    <tr>
                                      <th> رقم التليفون </th><td> {{ $orphansponser->phone }} </td>
                                    </tr>
                                    <tr>
                                      <th> الرقم القومي </th><td> {{ $orphansponser->national_id }} </td>
                                    </tr>
                                    <tr>
                                      <th> عدد الاطفال </th><td> {{ count($orphansponser->children) }} </td>
                                    </tr>
                                    <tr>
                                      <th> انشئت في </th><td> {{ $orphansponser->created_at }} </td>
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
