@extends('adminlte::page')

@section('title', 'كافل الفقير')

@section('content_header')
    <h1>كافل الفقير</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/poor-people/orphan-sponser/create') }}" class="btn btn-success btn-sm" title="Add New OrphanSponser">
                            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
                        </a>

                        <form method="GET" action="{{ url('/poor-people/orphan-sponser') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>الاسم</th>
                                        <th>رقم التليفون</th>
                                        <th>عدد الاطفال</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orphansponser as $item)
                                    <tr>
                                        <td>{{ ($orphansponser ->currentpage()-1) * $orphansponser ->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ count($item->children) }}</td>
                                        <td>
                                            <a href="{{ url('/poor-people/orphan-sponser/' . $item->id) }}" title="View OrphanSponser"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                                            <a href="{{ url('/poor-people/orphan-sponser/' . $item->id . '/edit') }}" title="Edit OrphanSponser"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                                            <form method="POST" action="{{ url('/poor-people/orphan-sponser' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete OrphanSponser" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $orphansponser->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
