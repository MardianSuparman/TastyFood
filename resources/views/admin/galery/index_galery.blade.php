@extends('layouts.admin')
@section('content')
    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title">Galery</h3>
            <div class="float-end">
                <a href="{{ route('galery.create') }}"><i class=" nav-icon bi bi-plus-lg"></i></a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Images</th>
                        <th style="text-align: end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($galerys as $data)
                        <tr class="align-middle">
                            <td>{{ $no++ }}</td>
                            <td style="vertical-align: middle; height: 150px;">
                                {{-- class="float-end" --}}
                                <img src="{{ asset('/storage/galerys/' . $data->image) }}" class="rounded" style="width: 150px; height: 150px; object-fit: cover;">
                            </td>

                            <td style="width: 200px">
                                <form action="{{ route('galery.destroy', $data->id) }}" method="POST" class="float-end">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <a href="{{ route('galery.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> |  --}}
                                    <a href="{{ route('galery.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    |
                                    <a href="{{ route('galery.destroy', $data->id) }}" class="btn btn-sm btn-danger"
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
            {!! $galerys->withQueryString()->links('pagination::bootstrap-4') !!}
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
@endsection
