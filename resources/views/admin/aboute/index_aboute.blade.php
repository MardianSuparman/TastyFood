@extends('layouts.admin')
@section('content')
    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title">Aboute</h3>
            <div class="float-end">
                <a href="{{ route('aboute.create') }}" class="btn btn-sm btn-outline-secondary"><i class=" nav-icon bi bi-plus-lg"></i></a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Images</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th style="text-align: end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($aboutes as $data)
                        <tr class="align-middle">
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('/storage/aboutes/' . $data->image) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->subtitle}}</td>
                            <td>
                                <form action="{{ route('aboute.destroy', $data->id) }}" method="POST" class="float-end">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('aboute.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> |
                                    <a href="{{ route('aboute.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    |
                                    <a href="{{ route('aboute.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                        data-confirm-delete="true">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Data Data Belum Tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {!! $aboutes->withQueryString()->links('pagination::bootstrap-4') !!}
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
@endsection
