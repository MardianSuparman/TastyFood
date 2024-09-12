@extends('layouts.admin')
@section('content')
    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title">Contact</h3>
            <div class="float-end">
                <a href="{{ route('contact.create') }}" class="btn btn-sm btn-outline-secondary"><i class=" nav-icon bi bi-plus-lg"></i></a>
            </div>
        </div> <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>No Phone</th>
                        <th>Email</th>
                        <th>Adres</th>
                        <th style="text-align: end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($contacts as $data)
                        <tr class="align-middle">
                            <td>{{ $no++ }}</td>
                            <td>
                                {{$data->NoTlpn}}</td>
                            </td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->adres}}</td>
                            <td>
                                <form action="{{ route('contact.destroy', $data->id) }}" method="POST" class="float-end">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('contact.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> |
                                    <a href="{{ route('contact.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    |
                                    <a href="{{ route('contact.destroy', $data->id) }}" class="btn btn-sm btn-danger"
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
            {!! $contacts->withQueryString()->links('pagination::bootstrap-4') !!}
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
@endsection
