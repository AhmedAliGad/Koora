<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Team </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-fullwidth">
                        {!! Form::select('team_id', $teams,  isset($newsList) ? $newsList->team_id : null, ['class' => 'input'] )!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label required">Title</label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										{!! Form::text('title', null, ['class' => 'input'] )!!}
								</div>
						</div>
				</div>
		</div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">Content</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <ck-editor id="content" locale="en" name="content" @if(isset($newsList)) old-data="{{ $newsList->content }}" @endif></ck-editor>
                </div>
            </div>
        </div>
    </div>
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label required">Image </label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										<uploader label="Choose Image" name="image" @if(isset($newsList)) file="{{ $newsList->main_image }}" @endif></uploader>
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
