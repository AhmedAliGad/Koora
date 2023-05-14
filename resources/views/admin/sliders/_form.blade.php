<!-- Start Card Content -->
<div class="card-content">
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label">Title</label>
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
						<label class="label required">Image </label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										<uploader label="Choose Image" name="image" @if(isset($slider)) file="{{ $slider->image }}" @endif></uploader>
								</div>
						</div>
				</div>
		</div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Priority</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('priority', null, ['class' => 'input' , 'required'] )!!}
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
												<input type="radio" name="active" value="1" @if(isset($slider) && $slider->active) checked @else checked @endif>
                                            active
										</label>
										<label class="radio">
												<input type="radio" name="active" value="0" @if(isset($slider) && !$slider->active) checked  @endif>
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
            <a class="button is-info" href="{{ route('admin.sliders.index') }}"> Cancel </a>
		</div>
</div><!-- End Card Footer -->
