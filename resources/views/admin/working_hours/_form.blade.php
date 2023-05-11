<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Day </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" disabled value="{{ isset($workingHour) ? $workingHour->day : null }}">
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Start Time </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::time('from', isset($workingHour) ? date('H:i', strtotime($workingHour->from)) : null, ['class' => 'input' , 'required', 'format' => 'H:i:s'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">End Time </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::time('to', isset($workingHour) ? date('H:i', strtotime($workingHour->to)) : null, ['class' => 'input' , 'required', 'format' => 'H:i:s'] )!!}
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.working_hours.index') }}"> Cancel </a>
    <button type="submit" class="button is-success">Save</button>
  </div>
</footer>
