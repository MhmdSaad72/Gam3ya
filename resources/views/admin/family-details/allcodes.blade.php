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
                        <a href="{{ url('/admin/family-details/create') }}" class="btn btn-success btn-sm" title="Add New FamilyDetail">
                            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
                        </a>

                        <form method="GET" action="{{ url('/admin/family-details') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($familydetails as $item)
                                        <tr>
                                    <th  scope="row">الباركود</th>
                                    <td id="bar" class="d-inline-block text-center barcode">
                                      {{ "1000". $item->care_number }}
                                      <br>
                                      <img src='data:image/png;base64,{{DNS1D::getBarcodePNG("1000".$item->care_number, "C128") }}' alt='barcode' />
                                    </td>
                                    

                                    <td><a style="cursor: pointer;" onclick="print()" >{{__('translations.print')}}</a></td>

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
@section('js')

<script>
function print() {

    var divToPrint=document.getElementById('bar');
    var newWin=window.open('','Print-Window');
    newWin.document.open();
    newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
    newWin.document.close();
    setTimeout(function(){newWin.close();},1);

}

</script>
@endsection
