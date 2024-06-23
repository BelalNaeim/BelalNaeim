@extends('layout.master')

@section('page')
    {{ __('Services') }}
@endsection

@section('link')
    {{ route('services.index') }}
@endsection

@section('content')
    <div class="box-header">
        <a href="{{ route('services.create') }}" class="btn btn-info m-4" style="background-color: #041C32">Add Service</a>
    </div>


    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th style="width: 40px">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($services as $key => $service)
                    <tr>
                        <td style="width: 10%">{{ $loop->iteration }}</td>
                        <td style="width: 20%">{{ $service->name['en'] }}</td>
                        <td style="width: 20%">
                            {{ \Illuminate\Support\Str::limit($service->description['en'], 25) }}
                        </td>
                        <td style="width: 30%"><img style="width: 100px" src="{{ $service->image }}" alt=""></td>
                        <td style="width: 20%">
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"></i>
                                {{ __('edit') }}</a>

                            <form action="{{ route('services.destroy', $service->id) }}" method="post"
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
            {{ $services->links() }}
            {{-- {!! $services->links() !!} --}}
        </div>
    @endsection
