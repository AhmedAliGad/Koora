<!-- Start Card Content -->
<div class="card-content">
		<div class="field is-horizontal">
				<div class="field-label is-normal">
						<label class="label">Name</label>
				</div>
				<div class="field-body">
						<div class="field">
								<div class="control">
										{!! Form::text('name', null, ['class' => 'input'] )!!}
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
										<uploader label="Choose Image" name="image" @if(isset($partner)) file="{{ $partner->image }}" @endif></uploader>
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
												<input type="radio" name="active" value="1" @if(isset($partner) && $partner->active) checked @else checked @endif>
                                            active
										</label>
										<label class="radio">
												<input type="radio" name="active" value="0" @if(isset($partner) && !$partner->active) checked  @endif>
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
            <a class="button is-info" href="{{ route('admin.partners.index') }}"> Cancel </a>
		</div>
</div><!-- End Card Footer -->
