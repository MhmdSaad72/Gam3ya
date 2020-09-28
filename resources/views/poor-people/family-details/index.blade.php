@extends('adminlte::page')

@section('title', 'بيانات اﻷسر')

@section('content_header')
    <h1>بيانات اﻷسر</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/poor-people/family-details/create') }}" class="btn btn-success btn-sm" title="Add New FamilyDetail">
                            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
                        </a>

                        <form method="GET" action="{{ url('/poor-people/family-details') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>اسم اﻷب</th>
                                        <th>اسم العائل</th>
                                        <th>الفئة</th>
                                        <th>انشئت في</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($familydetails as $item)
                                    <tr>
                                        <td>{{ ($familydetails ->currentpage()-1) * $familydetails ->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->father_name }}</td>
                                        <td>{{ $item->host_name }}</td>
                                        <td>{{ $item->category->name ?? '' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/poor-people/family-details/' . $item->id) }}" title="View FamilyDetail"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                                            <a href="{{ url('/poor-people/family-details/' . $item->id . '/edit') }}" title="Edit FamilyDetail"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>
                                            @if ($item->children->count() == 0)
                                              <form method="POST" action="{{ url('/poor-people/family-details' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete FamilyDetail" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                              </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $familydetails->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
