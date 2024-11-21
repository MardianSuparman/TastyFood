@extends('layouts.admin')
@section('content')
    <div class="card m-4">
        {{-- <div class="card-header">
            <h3 class="card-title">News</h3>
            <div class="float-end">
                <a href="{{ route('news.create') }}"><i class=" nav-icon bi bi-plus-lg"></i></a>
            </div>
        </div> <!-- /.card-header --> --}}
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th style="text-align: end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($messages as $data)
                        <tr class="align-middle">
                            <td>{{ $no++ }}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->message}}</td>
                            <td>{{$data->created_at ? $data->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') : 'N/A' }}</td>
                            <td style="width: 145px">
                                <form action="{{ route('message.destroy', $data->id) }}" method="POST" class="float-end">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <a href="{{ route('message.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> | --}}
                                    {{-- <a href="{{ route('message.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    | --}}
                                    <a href="{{ route('message.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                        data-confirm-delete="true">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Data Belum Tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $messages->withQueryString()->links('pagination::bootstrap-4') !!}
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
@endsection
