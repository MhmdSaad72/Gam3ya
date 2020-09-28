<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ '*المبلغ' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($nursery_accounts->amount) ? $nursery_accounts->amount : old('amount')}}" >
    {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('patient_name') ? 'has-error' : ''}}">
    <label for="patient_name" class="control-label">{{ '*اسم المريض' }}</label>
    <input class="form-control" name="patient_name" type="text" id="patient_name" value="{{ isset($nursery_accounts->patient_name) ? $nursery_accounts->patient_name : old('patient_name')}}" >
    {!! $errors->first('patient_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('doctor_name') ? 'has-error' : ''}}">
    <label for="doctor_name" class="control-label">{{ '*اسم الطبيب' }}</label>
    <input class="form-control" name="doctor_name" type="text" id="doctor_name" value="{{ isset($nursery_accounts->doctor_name) ? $nursery_accounts->doctor_name : old('doctor_name')}}" >
    {!! $errors->first('doctor_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'التاريخ' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($nursery_accounts->date) ? $nursery_accounts->date : old('date')}}" >
    {!! $errors->first('date', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
