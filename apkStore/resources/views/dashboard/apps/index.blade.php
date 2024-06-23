@extends('layouts.master')

@section('title')
    Dashboard | APK Store Panel
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Apps List</h4>
                    </div>
                </div>
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <div style="text-align:right; margin-bottom:20px;">
                            <a href="{{ route('applications.create') }}" class="btn btn-success"><em class="icon ni ni-plus"
                                    style="padding-right:10px;"></em>Add New App</a>
                        </div>
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col"><span class="sub-text">#</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Logo</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">App Name</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Version</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Server</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Upload Date</span></th>
                                    <th class="nk-tb-col nk-tb-col-tools text-end">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($apps as $row)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col tb-col-xl">
                                            <span>{{ $i++ }}</span>
                                        </td>
                                        <td class="nk-tb-col">
                                            <img src="{{ asset($row->logo) }}" width="50" />
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">{{ $row->app_name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $row->app_version }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $row->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $row->created_at }}</span>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{ route('applications.edit', $row->id) }}"><em
                                                                            class="icon ni ni-pen"></em><span>Edit</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('applications.destroy', $row->id) }}"
                                                                        class="btn btn-danger"
                                                                        data-confirm-delete="true"><em
                                                                            class="icon ni ni-trash"></em>Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div><!-- .components-preview -->
    @endsection
