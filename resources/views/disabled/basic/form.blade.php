<div class="form-group {{ $errors->has('addetion') ? 'has-error' : ''}}">
    <label for="addetion" class="control-label">{{ 'اضافة' }}</label>
    <input class="form-control" name="addetion" type="number" id="addetion" value="{{ isset($basic->addetion) ? $basic->addetion : old('addetion')}}" >
    {!! $errors->first('addetion', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('guarantee') ? 'has-error' : ''}}">
    <label for="guarantee" class="control-label">{{ 'كفالة' }}</label>
    <input class="form-control" name="guarantee" type="number" id="guarantee" value="{{ isset($basic->guarantee) ? $basic->guarantee : old('guarantee')}}" >
    {!! $errors->first('guarantee', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
