<!-- Start Card Content -->
<div class="card-content">
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label required">Arabic Name </label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										{!! Form::text('name', null, ['class' => 'input', 'required'] )!!}
								</div>
						</div>
				</div>
		</div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">English Name </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('name_en', null, ['class' => 'input', 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Description </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <ck-editor id="description" locale="en" name="description" @if(isset($team)) old-data="{{ $team->description }}" @endif></ck-editor>
                </div>
            </div>
        </div>
    </div>
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label required">Logo </label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										<uploader label="Choose Logo" name="image" @if(isset($team)) file="{{ $team->image }}" @endif></uploader>
								</div>
						</div>
				</div>
		</div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Year Founded</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('year_founded', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
<!--    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Manager</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('manager', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>-->
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Nickname</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('nickname', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Stadium</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('stadium', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Points </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('points', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Number of matches </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('matches_no', null, ['class' => 'input'] )!!}
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Status</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="active" value="1" @if(isset($team) && $team->active) checked @else checked @endif>
                        active
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($team) && !$team->active) checked  @endif>
                        Not active
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row links">
        <label class="label">
            Social Links
        </label>
        <div data-repeater-list="links">
            @if(isset($team) && $team->social_links)
                @foreach($team->social_links as $key => $link)
                    <div data-repeater-item>
                        <div class="field-label is-normal">
                            <div class="field-body select">
                                <input class="input" required="" name="link_value" value="{{ $link['link_value'] }}" type="text">
                                {!! Form::select('link_type', $types, $link['link_type'],
                                         ['placeholder' => 'Select Type', 'class' => 'input select', 'required'] )!!}
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input data-repeater-delete class="button" type="button" value="Delete Link"/>
                                <hr />
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div data-repeater-item>
                    <div class="field-label is-normal">
                        <div class="field-body select">
                            {!! form::text('link_value', null, ['class' => 'input', 'placeholder' => 'Link']) !!}
                            {!! Form::select('link_type', $types, null,
                                         ['placeholder' => 'Select Type', 'class' => 'input select'] )!!}
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input data-repeater-delete class="button" type="button" value="Delete Link"/>
                            <hr />
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <input data-repeater-create class="button" type="button" value="Add Link"/>
    </div>

</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
		<div class="buttons has-addons">
            <button type="submit" class="button is-success">Save</button>
            <a class="button is-info" href="{{ route('admin.teams.index') }}"> Cancel </a>
		</div>
</div><!-- End Card Footer -->
