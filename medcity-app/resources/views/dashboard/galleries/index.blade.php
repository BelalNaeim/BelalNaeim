@extends('layout.master')

@section('page')
    {{ __('Galleries') }}
@endsection

@section('link')
    {{ route('galleries.index') }}
@endsection

@section('content')
    <div class="box-header">
        <a href="{{ route('galleries.create') }}" class="btn btn-info m-4"
            style="background-color: #041C32">{{ __('Add Gallery') }}</a>
    </div>


    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th> Type </th>
                    <th>Image</th>
                    <th style="width: 40px">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($galleries as $key => $gallery)
                    <tr>
                        <td style="width: 10%">{{ $loop->iteration }}</td>
                        <td style="width: 20%">{{ $gallery->name['en'] }}</td>
                        <td>
                            @if ($gallery->type == 1)
                                <span class="badge badge-success">Big Photo</span>
                            @else
                                <span class="badge badge-info">Small Photo</span>
                            @endif
                        </td>
                        <td style="width: 30%"><img style="width: 100px" src="{{ $gallery->photo }}" alt=""></td>
                        <td style="width: 20%">
                            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"></i>
                                {{ __('edit') }}</a>
                            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="post"
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
        <div class="d-flex">
            {{ $galleries->links() }}
            {{-- {!! $services->links() !!} --}}
        </div>
    @endsection
