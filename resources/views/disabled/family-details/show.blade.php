@extends('adminlte::page')

@section('title', 'بيانات اﻷسرة ')
<style media="screen">
  .print-only {
    display:none;
  }
</style>
<style media="print">
.print-only {
  display:inline-block;
}
.no-print {
  display:none;
}
</style>
@section('content')
    <div class="container">
      <a href="{{ url('/disabled/family-details') }}" title="Back"><button class="btn btn-warning btn-sm no-print"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>

        <div class="row">
            <div class="col-md-9 no-print">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table  table-striped table-hover" id="">
                                <tbody>
                                  <tr >
                                    <th scope="row">رقم الرعاية</th><td>{{$familydetail->care_number}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row"> العنوان </th><td> {{ $familydetail->address }} </td>
                                  </tr>
                                  <tr>
                                    <th> رقم التليفون </th><td> {{ $familydetail->phone }} </td>
                                  </tr>
                                  <tr>
                                    <th> رقم المسلسل </th><td> {{ $familydetail->serial_number }} </td>
                                  </tr>
                                  <tr>
                                    <th> اسم اﻷب </th><td> {{ $familydetail->father_name }} </td>
                                  </tr>
                                  <tr>
                                    <th> الرقم القومي للأب </th><td> {{ $familydetail->father_national_id }} </td>
                                  </tr>
                                  <tr>
                                    <th> اسم العائل </th><td> {{ $familydetail->host_name }} </td>
                                  </tr>
                                  <tr>
                                    <th> صورة العائل </th><td> <img src="{{asset('storage/' . $familydetail->host_image)}}" style="width:20%"> </td>
                                  </tr>
                                  <tr>
                                    <th> انشئت في </th><td> {{ $familydetail->created_at }} </td>
                                  </tr>

                                  <tr>
                                    <th  scope="row">الباركود</th>
                                    <td id="bar" class="d-inline-block text-center barcode">
                                      {{ "3000". $familydetail->care_number }}
                                      <br>
                                      <img src='data:image/png;base64,{{DNS1D::getBarcodePNG("3000".$familydetail->care_number, "C128") }}' alt='barcode' />
                                    </td>

                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" onclick="print()" class="btn btn-success" id="print"><i class="fa fa-print"></i> طباعة</a>
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
