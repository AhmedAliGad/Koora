<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">App Name </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('name_ar', null, ['class' => 'input', 'required']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">App Description </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::textarea('description_ar', null, ['class' => 'textarea', 'rows' => 3  , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Email </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('email', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Phone </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('phone', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Video Url </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('video_url', null, ['class' => 'input']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Terms & Conditions </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::textarea('terms_ar', null, ['class' => 'textarea', 'rows' => 6  , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Privacy </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::textarea('privacy_ar', null, ['class' => 'textarea', 'rows' => 6  , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.dashboard') }}"> Cancel </a>
        <button type="submit" class="button is-success">Save</button>
    </div>
</footer>
