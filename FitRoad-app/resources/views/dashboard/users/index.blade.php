@extends('layouts.master')

@section('title')
    Users | FitRoad App
@endsection

@section('content')
    <div class="nk-content-wrap">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Users List</h4>
                    </div>
                </div>
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <div style="text-align:right; margin-bottom:20px;">
                            <a href="{{ route('users.create') }}" class="btn btn-success"><em class="icon ni ni-plus"
                                    style="padding-right:10px;"></em>Add New User</a>
                        </div>
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col"><span class="sub-text">#</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Name</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Weight</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Age</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">User Name</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Last inBody Date</span></th>
                                    <th class="nk-tb-col nk-tb-col-tools text-end">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col tb-col-xl">
                                            <span>{{ $loop->iteration }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $user->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $user->weight }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $user->age }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $user->first_name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $user->lindate }}s</span>
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
                                                                <li><a href="{{ route('users.edit', $user->id) }}"><em
                                                                            class="icon ni ni-pen"></em><span>Edit</span></a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('users.destroy', $user->id) }}"
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
    </div>
</ @endsection
