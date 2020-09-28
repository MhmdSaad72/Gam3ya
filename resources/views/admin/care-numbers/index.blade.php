@extends('adminlte::page')

@section('title', 'أرقام الرعاية')

@section('content_header')
    <h1>أرقام الرعاية</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <a href="{{ url('/admin/family-details/create') }}" class="btn btn-success btn-sm" title="Add New FamilyDetail">
                            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
                        </a> --}}

                        <form method="GET" action="{{ url('/admin/care-numbers') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>رقم الرعاية</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($families as $key => $item)
                                  <tr>
                                    <td>{{ $item->care_number }}</td>
                                    <td>
                                      {{-- <div>{!!DNS1D::getBarcodeHTML($item->care_number, 'C39')!!}</div> --}}
                                      <a href="{{ url('/admin/care-numbers/' . $item->id) }}" title="View FamilyDetail"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض البيانات</button></a>
                                      {{-- <a type="button" class="btn btn-success btn-sm" href="{{route('image' , ['id' => $item->id])}}">عرض الباركود</a> --}}
                                    </td>
                                  </tr>
                                @empty
                                  <tr>
                                    <th></th> <td style="color:red; font-weight:bold;">{{"لا يوجد ارقام رعاية"}}</td>
                                  </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $families->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
