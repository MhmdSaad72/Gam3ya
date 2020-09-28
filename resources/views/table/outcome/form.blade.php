<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ '*المبلغ' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($outcome->amount) ? $outcome->amount : old('amount')}}" >
    {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($outcome->name) ? $outcome->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('national_id') ? 'has-error' : ''}}">
    <label for="national_id" class="control-label">{{ 'الرقم القومي' }}</label>
    <input class="form-control" name="national_id" type="text" id="national_id" value="{{ isset($outcome->national_id) ? $outcome->national_id : old('national_id')}}" >
    {!! $errors->first('national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
