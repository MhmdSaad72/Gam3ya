@extends('adminlte::page')

@section('title', 'بيانات تكلفة اﻷسر')

@section('content_header')
    <h1>بيانات تكلفة اﻷسر</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <a href="{{ url('/disabled/relative-exchange') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                      <a href="{{ url('disabled/relative-exchange/family/excel?id='. $relativeexchange->id) }}" title=""><button class="btn btn-success btn-sm"> اكسل</button></a>
                      <a href="{{ url('/disabled/relative-exchange/barcodes/' . $relativeexchange->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> صرف بالباركود</button></a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العائل</th>
                                        <th>العنوان</th>
                                        <th>التكلفة</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($families as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->host_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $relativeexchange->familyCost($item->id) }}{{$relativeexchange->unit ? ' كيلو ' : ' قطعة '}}</td>
                                        <td>
                                          @if ($item->relativeChecked($relativeexchange->id) == 1)
                                            <i class="fas fa-check-square"></i>
                                          @else
                                            <form method="POST" action="{{ url('/disabled/relative-exchange/family' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="relative_id" value="{{$relativeexchange->id}}">
                                              <button type="submit" class="btn btn-success btn-sm" title="" onclick="return confirm(&quot;تأكيد الصرف&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> صرف</button>
                                            </form>
                                          @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
