@extends('layouts.dashboard.app')

@section('title', 'المستخدمين')
@section('content')

    <div class="section-body">

        <div class="row clearfix">
            <div class="col-lg-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="table-responsive mb-4">
                    <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                        <tr>
                            <th>إسم المستخدم</th>
                            <th>البريد الإلكتروني</th>
                            <th>الرتبة</th>
                            <th>عمليات</th>
                        </tr>
                        {{-- @php
                            dd($users);
                        @endphp --}}
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a href="{{ route('dashboard.memebr.approve', $user->id) }}"
                                        class="btn btn-primary btn-sm">Approve</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No users found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
