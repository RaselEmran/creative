@extends('layouts.master', ['title' => __('Role'), 'modal' => 'lg'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="badge-header">
            <div class="row">
                <div class="col-md-6">
                    <button class="title btn btn-outline btn-wd mt-2">
                    <i class="fa fa-check"></i>
                    
                    {{_lang('Role Create')}}
                    </button>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <a href="{{ route('admin.user.role.index') }}" class=" btn-icon btn btn-outline btn-round btn-wd mt-2">
                        <span class="btn-label">
                            <i class="glyphicon fa fa-th-list"></i>
                        </span>{{_lang('Role List')}}
                    </a>
                </div>
            </div>
        </div>
        
        {!! Form::open(['route' => ['admin.user.role.update', $role->id], 'id'=>'content_form','files' => true, 'method' => 'PUT']) !!}
        <div class="card table-with-links">
            <div class="card-body">
                <div class="row mb-2">
                    {{ Form::label('name', _lang('Role Name'),['class'=>'col-sm-2 col-form-label mx-2']) }}
                    <div class="col-sm-8">
                        {{ Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => _lang('Role Name'),'required'=>'']) }}
                    </div>
                    
                </div>
            </div>
        </div>
        <h6 class="badge badge-success">{{_lang('permission')}}</h6>
        <div class="tbg">
            <table class="table table-bordered">
                @foreach (split_name($permissions) as $key => $element)
                <tr>
                    <td rowspan ="{{count($element)+1}}">{!! $key !!}</td>
                    <td rowspan="{{count($element)+1}}">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input select_all" type="checkbox" id="select_all_{{$key}}" data-id="{{$key}}" >
                                <span class="form-check-sign elect_all_{{$key}}"></span>
                                {{_lang('Select All')}}
                            </label>
                        </div>
                    </td>
                </tr>
                @foreach ($element as $per)
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input {{$key}}" type="checkbox" id="{{$per}}" multiple="multiple" name="permissions[]" value="{{$per}}" {{in_array($per, $role_permissions)?'checked':''}}>
                                <span class="form-check-sign"></span>
                                {{tospane($per)}}
                            </label>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                
                {{ Form::submit(_lang('Update Permission'), ['class' => 'btn btn-outline btn-success btn-round btn-wd w-100 ', 'id' => 'submit']) }}
                <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('loading.gif') }}" width="50"></button>
            </div>
        </div>
        {!!Form::close()!!}
        
        
    </div>
</div>
@endsection
@push('js')
<script>
$(document).on('click','.select_all',function(){
var id =$(this).data('id');
if (this.checked) {
$("."+id).prop('checked', true);
} else{
$("."+id).prop('checked', false);
}
});
</script>
@endpush