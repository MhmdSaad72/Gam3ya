@extends('adminlte::page')

@section('title', 'الصرف الشهرى')

@section('content_header')
    <h1>الصرف الشهرى</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/disabled/monthly-exchange/create') }}" class="btn btn-success btn-sm" title="Add New MonthlyExchange">
                            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
                        </a>


                        <form method="GET" action="{{ url('/disabled/monthly-exchange') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="بحث..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        @if (session('flash_message'))
                            <ul class="alert alert-success">
                                {{session('flash_message')}}
                            </ul>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>السنة</th>
                                        <th>الشهر</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($monthlyexchanges as $item)
                                    <tr>
                                        <td>{{ ($monthlyexchanges ->currentpage()-1) * $monthlyexchanges ->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->month }}</td>
                                        <td>
                                          <a href="{{ url('/disabled/monthly-exchange/' . $item->id . '/edit') }}" title=""><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>
                                          <a href="{{ url('/disabled/monthly-exchange/family-details/' . $item->id) }}" title="بيانات اﻷسر"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> بيانات اﻷسر</button></a>
                                          @if ($item->checkedCondition() == 0)
                                            <form method="POST" action="{{ url('/disabled/monthly-exchange' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                              {{ method_field('DELETE') }}
                                              {{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger btn-sm" title="" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                            </form>
                                          @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $monthlyexchanges->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
