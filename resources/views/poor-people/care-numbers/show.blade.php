@extends('adminlte::page')

@section('title', 'بيانات رقم الرعاية')

@section('content_header')
    <h1>بيانات رقم الرعاية ({{$familydetail->care_number}})</h1>
@stop

@section('content')
    <div class="container">
      <h2 class="text-center text-primary">بيانات اﻷسر</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                      <th> العنوان </th><td> {{ $familydetail->address }} </td>
                                    </tr>
                                    <tr>
                                      <th>الفئة</th><td>{{ $familydetail->category->name ?? '' }}</td>
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
                                      <th> اسم اﻷم </th><td> {{ $familydetail->mother_name }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                      <th> نوع الحالة </th><td> {{ $familydetail->case_type() }} </td>
                                    </tr>
                                    <tr>
                                      <th> اسم العائل </th><td> {{ $familydetail->host_name }} </td>
                                    </tr>
                                    <tr>
                                      <th> الرقم القومي للعائل </th><td> {{ $familydetail->host_national_id }} </td>
                                    </tr>
                                    <tr>
                                      <th> صورة العائل </th><td> <img src="{{ asset('storage/' . $familydetail->host_image) }}" style=" height:122px; border-radius:50%;"> </td>
                                    </tr>
                                    <tr>
                                      <th> صلة قرابة العائل </th><td> {{ $familydetail->host_relationship }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <h2 class="text-center text-primary">بيانات اﻷطفال</h2>
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th>الاسم</th>
                                <th>تاريخ الميلاد</th>
                                <th> الرقم القومي </th>
                                <th> السنة الدراسية </th>
                                <th> الحالة الاجتماعية </th>
                                <th> النوع </th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($children as $child)
                              <tr>
                                <td>{{ $child->name }}</td>
                                <td>{{ $child->birth_date }}</td>
                                <td>{{ $child->national_id }}</td>
                                <td>{{ $child->academic_year }}</td>
                                <td>{{ $child->social_status() }}</td>
                                <td>{{ $child->type ? 'انثي' : 'ذكر'  }}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center text-primary">الصرف الشهري</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th>السنة</th>
                                  <th>الشهر</th>
                                  <th>التكلفة</th>
                                  <th>الاجراء </th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach ($monthlyExchange as $month)
                                <tr>
                                  <td>{{ $month->year }}</td>
                                  <td>{{ $month->month }}</td>
                                  <td>{{ $familydetail->familyCost() }}</td>
                                  <td><?php echo $familydetail->checked($familydetail->id , $month->id) ?  '<i class="fas fa-check-square"></i>' : 'قيد الانتظار' ?></td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>

                          </div>

                      </div>
                  </div>
              </div>
          </div>
          <h2 class="text-center text-primary">الصرف العيني</h2>
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th>نوع التوزيع</th>
                                    <th>الكمية</th>
                                    <th>الاجراء </th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($relativEexchange as $relative)
                                  <tr>
                                    <td>{{ $relative->distribution_type()  }}</td>
                                    <td>{{ $relative->familyCost($familydetail->id) }}{{$relative->unit ? ' كيلو ' : ' قطعة '}}</td>
                                    <td><?php echo $familydetail->relativeChecked($relative->id) ?  '<i class="fas fa-check-square"></i>' : 'قيد الانتظار' ?></td>
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
