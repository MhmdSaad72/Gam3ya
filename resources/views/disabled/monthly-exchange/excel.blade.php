<table class="table">
    <thead>
        <tr>
            <th>رقم المسلسل</th>
            <th>الشهر</th>
            <th>العائلة</th>
            <th>العنوان</th>
            <th>التكلفة</th>
            <th>الاجراءات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($families as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $month->month}}</td>
            <td>{{ $item->host_name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->familyCost() }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
