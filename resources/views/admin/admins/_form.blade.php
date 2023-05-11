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
            <label class="label">phone </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('phone', null, ['class' => 'input'] )!!}
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
                    @if(isset($admin))
                        <input class="input" value="{{ isset($admin) ? $admin->password : null }}" type="password" name="password">
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
            <label class="label required">Role </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="role" value="admin" @if(isset($admin) && $admin->role == 'admin') checked @else checked @endif>
                        Admin
                    </label>
                    <label class="radio">
                        <input type="radio" name="role" value="agent" @if(isset($admin) && $admin->role == 'agent') checked  @endif>
                        Agent
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Status </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="active" value="1" @if(isset($admin) && $admin->active) checked @else checked @endif>
                        Active
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($admin) && !$admin->active) checked  @endif>
                        Inactive
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.admins.index') }}"> Cancel </a>
        <input type="submit" value="Save" class="button is-success" name="submitBtn" onclick="this.disabled=true;this.form.submit();">
    </div>
</footer>
