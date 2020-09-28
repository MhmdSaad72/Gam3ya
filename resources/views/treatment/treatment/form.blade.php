<div class="form-group {{ $errors->has('serial_number') ? 'has-error' : ''}}">
    <label for="serial_number" class="control-label">{{ '*رقم المسلسل' }}</label>
    <input class="form-control" name="serial_number" type="text" id="serial_number" value="{{ isset($treatment->serial_number) ? $treatment->serial_number : old('serial_number')}}" >
    {!! $errors->first('serial_number', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('prescription_number') ? 'has-error' : ''}}">
    <label for="prescription_number" class="control-label">{{ '*رقم الروشتة' }}</label>
    <input class="form-control" name="prescription_number" type="text" id="prescription_number" value="{{ isset($treatment->prescription_number) ? $treatment->prescription_number : old('prescription_number')}}" >
    {!! $errors->first('prescription_number', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('teller_name') ? 'has-error' : ''}}">
    <label for="teller_name" class="control-label">{{ '*اسم الصارف' }}</label>
    <input class="form-control" name="teller_name" type="text" id="teller_name" value="{{ isset($treatment->teller_name) ? $treatment->teller_name : old('teller_name')}}" >
    {!! $errors->first('teller_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('exchange_date') ? 'has-error' : ''}}">
    <label for="exchange_date" class="control-label">{{ 'تاريخ الصرف' }}</label>
    <input class="form-control" name="exchange_date" type="date" id="exchange_date" value="{{ isset($treatment->exchange_date) ? $treatment->exchange_date : old('exchange_date')}}" >
    {!! $errors->first('exchange_date', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('national_id') ? 'has-error' : ''}}">
    <label for="national_id" class="control-label">{{ 'الرقم القومي' }}</label>
    <input class="form-control" name="national_id" type="text" id="national_id" value="{{ isset($treatment->national_id) ? $treatment->national_id : old('national_id')}}" >
    {!! $errors->first('national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'العنوان' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($treatment->address) ? $treatment->address : old('address')}}" >
    {!! $errors->first('address', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'التليفون' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($treatment->phone) ? $treatment->phone : old('phone')}}" >
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'المبلغ' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($treatment->amount) ? $treatment->amount : old('amount')}}" >
    {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('reason') ? 'has-error' : ''}}">
    <label for="reason" class="control-label">{{ 'سبب الصرف' }}</label>
    <textarea class="form-control" rows="5" name="reason" type="textarea" id="reason" >{{ isset($treatment->reason) ? $treatment->reason : old('reason')}}</textarea>
    {!! $errors->first('reason', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
