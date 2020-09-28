<?php $count = 1; ?>
<table class="table">
    <thead>
        <tr>
            <th>رقم المسلسل</th>
            <th>العائلة</th>
            <th>الفئة</th>
            <th>العنوان</th>
            <th>التكلفة</th>
            <th>الاجراءات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($families as $item)
      @if ($item->category_id == $relative->category_id)
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $relative->familyCost($item->id) }}{{$relative->unit ? ' كيلو ' : ' قطعة '}}</td>
            <td></td>
        </tr>
      @endif
    @endforeach
    </tbody>
</table>
