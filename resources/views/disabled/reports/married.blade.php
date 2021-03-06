@extends('adminlte::page')

@section('title', 'البنات المتزوجة')

@section('content_header')
    <h1>البنات المتزوجة</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form method="GET" action="{{ url('admin/married/reports') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>تاريخ الميلاد</th>
                                        <th>اسم العائل</th>
                                        <th>كافل اليتيم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($children as $item)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $item->name }}</td>
                                      <td>{{ $item->birth_date }}</td>
                                      <td>{{ $item->family->host_name ?? ''}}</td>
                                      <td>{{ $item->orphanSponser->name ?? ''}}</td>
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
