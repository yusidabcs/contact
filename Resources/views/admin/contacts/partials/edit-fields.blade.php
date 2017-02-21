<div class='form-group{{ $errors->has('type') ? ' has-error' : '' }}'>
    {!! Form::label('type', trans('contact::contacts.form.message')) !!}
    
    <textarea class="ckeditor" class="form-control" name="message"></textarea>
    {!! $errors->first('Value', '<span class="help-block">:message</span>') !!}
</div>