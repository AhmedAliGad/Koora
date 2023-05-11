<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Name </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('name', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Phone </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('phone', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Code </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('code', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Email </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('email', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Password </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icon has-icon-right ">
                    @if(isset($user))
                        <input class="input" value="{{ isset($user) ? $user->password : null }}" type="password" name="password">
                    @else
                        {!! Form::text('password', null, ['class' => 'input' , 'required'] )!!}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Address </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('address', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <address-select
        @if(isset($user) && $user->city) :old-city="{{ $user->oldCity() }}" @endif
        @if(isset($user) && $user->area) :old-area="{{ $user->oldArea() }}" @endif
    ></address-select>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Status </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="active" value="1" @if(isset($user) && $user->active) checked @else checked @endif>
                        Active
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($user) && !$user->active) checked  @endif>
                        Disabled
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.users.index') }}"> Cancel </a>
        <input type="submit" value="Save" class="button is-success" name="submitBtn" onclick="this.disabled=true;this.form.submit();">
    </div>
</footer>
