@extends('layout.master')

@section('page')
    {{ __('users') }}
@endsection

@section('link')
    {{ route('users.index') }}
@endsection

@section('content')
    <section class="content m-5">

        <div class="box box-primary">

            <h3 class="box-title" style="margin-bottom: 15px">users Count <small>{{ $users->total() }}</small>
            </h3>

            <form action="{{ route('users.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="search here"
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" style="background-color: #041C32"><i
                                class="fa fa-search"></i>
                            {{ __('search') }}</button>
                        <a href="{{ route('users.create') }}" class="btn btn-primary" style="background-color: #041C32"><i
                                class="fa fa-plus"></i>
                            {{ __('add user') }}</a>


                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search" spellcheck="false" data-ms-editor="true">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($users->count() > 0)
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('country') }}</th>
                                        <th>{{ __('phone') }}</th>
                                        <th>{{ __('email') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Language') }}</th>
                                        <th>{{ __('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $admin)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->country }}</td>
                                            <td>{{ is_array($admin->mobile) ? implode($admin->mobile, '-') : $admin->mobile }}
                                            </td>
                                            <td>{{ $admin->email }}</td>
                                            <td><img src="{{ $admin->image }}" style="width: 100px" class="img-thumbnail"
                                                    alt="">
                                            </td>
                                            <td>{{ $admin->lang }}</td>

                                            <td>
                                                <a href="{{ route('users.edit', $admin->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                                    {{ __('edit') }}</a>

                                                <form action="{{ route('users.destroy', $admin->id) }}" method="post"
                                                    style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                            class="fa fa-trash"></i>
                                                        {{ __('delete') }}</button>
                                                </form><!-- end of form -->

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->appends(request()->query())->links() }}
                    @else
                        <h2>{{ __('no_data_found') }}</h2>
                    @endif
                </div>

            </div>
        </div>

    </section>
@endsection
