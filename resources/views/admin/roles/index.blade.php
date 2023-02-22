
@extends('admin.layouts.master')

@section('content')

    <p>{!! link_to_route('roles.create', trans('quickadmin::admin.roles-index-add_new'), [], ['class' => 'btn btn-success']) !!}</p>

    <div class="x_panel">
        <div class="x_title">
            <h2>Daily active roles <small>Sessions</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    @if($roles->count() > 0)
            {{--<div class="portlet-title">--}}
                {{--<div class="caption">{{ trans('quickadmin::admin.roles-index-roles_list') }}</div>--}}
            {{--</div>--}}
            <div class="x_content">
                <table id="datatable" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" class="tableflat">
                            </th>
                                <th>{{ trans('quickadmin::admin.roles-index-title') }}</th>
                                <th class=" no-link last"><span class="nobr">Action</span></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td>{{ $role->title }}</td>
                                <td>
                                    {!! link_to_route('roles.edit', trans('quickadmin::admin.roles-index-edit'), [$role->id], ['class' => 'btn btn-xs btn-info']) !!}
                                    {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'' . trans('quickadmin::admin.roles-index-are_you_sure') . '\');',  'route' => ['roles.destroy', $role->id]]) !!}
                                    {!! Form::submit(trans('quickadmin::admin.roles-index-delete'), ['class' => 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    @else
        {{ trans('quickadmin::admin.roles-index-no_entries_found') }}
    @endif

@endsection


<!--@extends('admin.layouts.master')

@section('content')

    <p>{!! link_to_route('roles.create', trans('quickadmin::admin.roles-index-add_new'), [], ['class' => 'btn btn-success']) !!}</p>

    <div class="x_panel">
        <div class="x_title">
            <h2>Daily active roles <small>Sessions</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    @if($roles->count() > 0)
            {{--<div class="portlet-title">--}}
                {{--<div class="caption">{{ trans('quickadmin::admin.roles-index-roles_list') }}</div>--}}
            {{--</div>--}}
            <div class="x_content">
                <table id="datatable" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>
                                <input type="checkbox" class="tableflat">
                            </th>
                                <th>{{ trans('quickadmin::admin.roles-index-title') }}</th>
                                <th class=" no-link last"><span class="nobr">Action</span></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="a-center ">
                                    <input type="checkbox" class="tableflat">
                                </td>
                                <td>{{ $role->title }}</td>
                                <td>
                                    {!! link_to_route('roles.edit', trans('quickadmin::admin.roles-index-edit'), [$role->id], ['class' => 'btn btn-xs btn-info']) !!}
                                    {!! Form::open(['style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'' . trans('quickadmin::admin.roles-index-are_you_sure') . '\');',  'route' => ['roles.destroy', $role->id]]) !!}
                                    {!! Form::submit(trans('quickadmin::admin.roles-index-delete'), ['class' => 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    @else
        {{ trans('quickadmin::admin.roles-index-no_entries_found') }}
    @endif

@endsection

-->