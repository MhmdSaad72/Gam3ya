<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($tool->name) ? $tool->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ '*المبلغ' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($tool->amount) ? $tool->amount : old('amount')}}" >
    {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'التفاصيل' }}</label>
    <textarea class="form-control" rows="5" name="details" type="textarea" id="details" >{{ isset($tool->details) ? $tool->details : old('details')}}</textarea>
    {!! $errors->first('details', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
