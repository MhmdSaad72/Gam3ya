@extends('adminlte::page')

@section('title', 'كافل الفقير')

@section('content_header')
    <h1>كافل الفقير</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/poor-people/orphan-sponser') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <a href="{{ url('/poor-people/orphan-sponser/' . $orphansponser->id . '/edit') }}" title="Edit OrphanSponser"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                        <form method="POST" action="{{ url('poor-people/orphansponser' . '/' . $orphansponser->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete OrphanSponser" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                        </form>
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
                                      <th> عدد الاطفال </th><td> {{ count($orphansponser->children) }} </td>
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
