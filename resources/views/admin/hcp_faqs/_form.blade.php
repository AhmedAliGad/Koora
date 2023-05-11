<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Question </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('question_en', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Answer </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::textarea('answer_en', null, ['class' => 'textarea', 'rows' => 3  , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
<!--    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Arabic Name</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('name_ar', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>-->
    <hr />
    <specialities-select
        @if(isset($hcpFaq) && $hcpFaq->typesList()) :old-types="{{ $hcpFaq->typesList() }}" @endif
    @if(isset($hcpFaq) && $hcpFaq->specialitiesList()):old-specialities="{{ $hcpFaq->specialitiesList() }}" @endif
    ></specialities-select>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Status </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="active" value="1" @if(isset($hcpFaq) && $hcpFaq->active) checked @else checked @endif>
                        Active
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($hcpFaq) && !$hcpFaq->active) checked  @endif>
                        Disabled
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.hcp_types.index') }}"> Cancel </a>
    <button type="submit" class="button is-success">Save</button>
  </div>
</footer>
