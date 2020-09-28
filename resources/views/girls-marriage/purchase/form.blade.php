<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($purchase->name) ? $purchase->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'النوع' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($purchase->type) ? $purchase->type : old('type')}}" >
    {!! $errors->first('type', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'التفاصيل' }}</label>
    <textarea class="form-control" rows="5" name="details" type="textarea" id="details" >{{ isset($purchase->details) ? $purchase->details : old('details')}}</textarea>
    {!! $errors->first('details', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ '*السعر' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($purchase->price) ? $purchase->price : old('price')}}" >
    {!! $errors->first('price', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ '*الكود' }}</label>
    <input class="form-control" name="code" type="text" id="code" value="{{ isset($purchase->code) ? $purchase->code : old('code')}}" >
    {!! $errors->first('code', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
