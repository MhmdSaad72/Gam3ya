<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($mosque->name) ? $mosque->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ '*العنوان' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($mosque->address) ? $mosque->address : old('address')}}" >
    {!! $errors->first('address', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ '*الكود' }}</label>
    <input class="form-control" name="code" type="text" id="code" value="{{ isset($mosque->code) ? $mosque->code : old('code')}}" >
    {!! $errors->first('code', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
