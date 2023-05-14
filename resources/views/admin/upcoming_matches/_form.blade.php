<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">First Team </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                        {!! Form::select('first_team_id', $teams,  isset($upcomingMatch) ? $upcomingMatch->first_team_id : null, ['class' => 'input', 'required'] )!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Second Team </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                        {!! Form::select('second_team_id', $teams,  isset($upcomingMatch) ? $upcomingMatch->second_team_id : null, ['class' => 'input', 'required'] )!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label ">Stadium</label>
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
            <label class="label required">Match Time </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::datetimeLocal('date', isset($upcomingMatch)? $upcomingMatch->date : null, ['class' => 'input' , 'required','id'=>'datetimepicker'] )!!}
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
												<input type="radio" name="active" value="1" @if(isset($newsList) && $newsList->active) checked @else checked @endif>
                                            active
										</label>
										<label class="radio">
												<input type="radio" name="active" value="0" @if(isset($newsList) && !$newsList->active) checked  @endif>
												Not active
										</label>
								</div>
						</div>
				</div>
		</div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
		<div class="buttons has-addons">
            <button type="submit" class="button is-success">Save</button>
            <a class="button is-info" href="{{ route('admin.news_lists.index') }}"> Cancel </a>
		</div>
</div><!-- End Card Footer -->
