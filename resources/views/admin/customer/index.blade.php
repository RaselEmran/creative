@extends('layouts.master', ['title' => __('Customer'), 'modal' => 'lg'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="badge-header">
            <div class="row">
                <div class="col-md-6">
                    <button class="title btn btn-outline btn-wd mt-2">
                    <i class="glyphicon fa fa-th-list"></i>
                    {{_lang('Customer List')}}
                    </button>
                </div>
                <div class="col-md-6" style="text-align: right;">
                    <a id="content_managment" data-url="{{ route('admin.customer.create') }}" class=" btn-icon btn btn-outline btn-round btn-wd mt-2">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>{{_lang('Add New Customer')}}</a>
                    </div>
                </div>
            </div>
            <div class="card data-tables">
                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                    <div class="fresh-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ _lang('SL') }}</th>
                                    <th class="text-center">{{ _lang('Name') }}</th>
                                    <th class="text-center">{{ _lang('Email') }}</th>
                                    <th class="text-center">{{ _lang('Phone') }}</th>
                                    <th class="text-center">{{ _lang('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $model->name }}</td>
                                    <td class="text-center">{{ $model->email }}</td>
                                    <td class="text-center">{{ $model->phone }}</td>
                                    <td class="text-center">
                                        <a id="content_managment" data-url="{{ route('admin.customer.edit',$model->id) }}" class="btn btn-link btn-warning edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" id="delete_item" data-id ="{{$model->id}}" data-url="{{route('admin.customer.destroy',$model->id) }}" class="btn btn-link btn-danger remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('js')
    @endpush