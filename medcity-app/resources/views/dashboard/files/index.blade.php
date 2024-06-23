@extends('layout.master')

@section('page')
    {{ __('Files') }}
@endsection

@section('link')
    {{ route('files.index') }}
@endsection

@section('content')
    <div class="box-header">
        <a href="{{ route('files.create') }}" class="btn btn-info m-4">Add File</a>
    </div>


    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Path</th>
                    <th>Uploaded By</th>
                    <th style="width: 40px">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($files as $key => $file)
                    <tr>
                        <td style="width: 10%">{{ $loop->iteration }}</td>
                        <td style="width: 20%">{{ $file->filename }}</td>
                        <td style="width: 20%">
                            {{ $file->path }}

                        </td>
                        <td style="width: 30%">{{ $file->user->name }}</td>
                        <td style="width: 20%">
                            <a href="{{ route('files.edit', $file->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"></i>
                                {{ __('edit') }}</a>
                            <form action="{{ route('files.destroy', $file->id) }}" method="post"
                                style="display: inline-block">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>
                                    {{ __('delete') }}</button>
                            </form><!-- end of form -->
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>
    @endsection
