{!! Form::open(['route' => 'admin.language.create', 'id' => 'content_form','files' => true, 'method' => 'POST']) !!}
<div class="row pb-2">
	<div class="col-md-12">
		{{ Form::label('Language Name', _lang('Language Name')) }}
		{{ Form::text('language_name', null, ['class' => 'form-control', 'placeholder' => _lang('Language Name'),'required'=>'']) }}
	</div>
</div>
<div class="row">
	<div class="col-md-6 mx-auto text-center">
		
		{{ Form::submit(_lang('Create Language'), ['class' => 'btn btn-outline btn-success btn-round btn-wd w-100 ', 'id' => 'submit']) }}
		<button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('loading.gif') }}" width="50"></button>
	</div>
</div>
{!!Form::close()!!}