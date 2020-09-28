<table class="table">
    <thead>
        <tr>
            <th>رقم المسلسل</th>
            <th>العائلة</th>
            <th>العنوان</th>
            <th>الشهر</th>
            <th>التكلفة</th>
            <th>الاجراءات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($families as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $month->month }}</td>
            <td>{{ $item->familyCost() }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
