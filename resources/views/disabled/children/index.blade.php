@extends('adminlte::page')

@section('title', 'اﻷطفال')

@section('content_header')
    <h1>اﻷطفال</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/disabled/children/create') }}" class="btn btn-success btn-sm" title="Add New Child">
                            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
                        </a>
                        <a href="{{ route('disabled.reports.males') }}" class="btn btn-info btn-sm" title="">
                             اﻷولاد فوق 16
                        </a>
                        <a href="{{ route('disabled.reports.females') }}" class="btn btn-info btn-sm" title="">
                             البنات فوق 18
                        </a>
                        <a href="{{ route('disabled.reports.married') }}" class="btn btn-info btn-sm" title="">
                             البنات المتزوجة
                        </a>

                        <form method="GET" action="{{ url('/disabled/children') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>الاسم</th>
                                        <th>تاريخ الميلاد</th>
                                        <th>العائل اﻷسرة</th>
                                        <th>كافل اليتيم</th>
                                        <th>انشئت في</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($children as $item)
                                    <tr>
                                        <td>{{ ($children ->currentpage()-1) * $children ->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->birth_date }}</td>
                                        <td>{{ $item->family->host_name ?? ''}}</td>
                                        <td>{{ $item->orphanSponser->name ?? '' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/disabled/children/' . $item->id) }}" title="View Child"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                                            <a href="{{ url('/disabled/children/' . $item->id . '/edit') }}" title="Edit Child"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                                            <form method="POST" action="{{ url('/disabled/children' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Child" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $children->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
