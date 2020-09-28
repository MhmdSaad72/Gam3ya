<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ '*الكمية' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($relativeexchange->quantity) ? $relativeexchange->quantity : old('quantity')}}" step=any />
    {!! $errors->first('quantity', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
