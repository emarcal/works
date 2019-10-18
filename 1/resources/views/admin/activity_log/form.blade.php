<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($activity_log->description) ? $activity_log->description : ''}}" >
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('causer_id') ? 'has-error' : ''}}">
    <label for="causer_id" class="control-label">{{ 'Causer Id' }}</label>
    <input class="form-control" name="causer_id" type="text" id="causer_id" value="{{ isset($activity_log->causer_id) ? $activity_log->causer_id : ''}}" >
    {!! $errors->first('causer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
    <label for="created_at" class="control-label">{{ 'Created At' }}</label>
    <input class="form-control" name="created_at" type="text" id="created_at" value="{{ isset($activity_log->created_at) ? $activity_log->created_at : ''}}" >
    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_login') ? 'has-error' : ''}}">
    <label for="last_login" class="control-label">{{ 'Created At' }}</label>
    <input class="form-control" name="last_login" type="text" id="last_login" value="{{ isset($activity_log->last_login) ? $activity_log->last_login : ''}}" >
    {!! $errors->first('last_login', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
