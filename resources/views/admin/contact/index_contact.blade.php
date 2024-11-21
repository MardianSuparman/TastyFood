@extends('layouts.admin')
@section('content')
    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title">Contact</h3>
            <div class="float-end">
                @php
                    $kontackCount = App\Models\Contact::count();
                @endphp

                @if ($kontackCount < 1)
                    <a href="{{ route('contact.create') }}"><i class=" nav-icon bi bi-plus-lg"></i></a>
                    {{-- @else
                    <button class="btn btn-sm btn-danger" disabled>Can`t Added</button> --}}
                @endif
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
                    @foreach ($contacts as $data)
                        @if ($loop->first)
                            <tr class="align-middle">
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $data->NoTlpn }}</td>
                                </td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->adres }}</td>
                                <td>
                                    <form action="{{ route('contact.destroy', $data->id) }}" method="POST"
                                        class="float-end">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="{{ route('contact.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> | --}}
                                        <a href="{{ route('contact.edit', $data->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        |
                                        <button class="btn btn-sm btn-danger" disabled>Can`t Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @else
                            <tr class="align-middle">
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $data->NoTlpn }}</td>
                                </td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->adres }}</td>
                                <td>
                                    <form action="{{ route('contact.destroy', $data->id) }}" method="POST"
                                        class="float-end">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="{{ route('contact.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> | --}}
                                        <a href="{{ route('contact.edit', $data->id) }}"
                                            class="btn btn-sm btn-success">Edit</a>
                                        |
                                        <a href="{{ route('contact.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                            data-confirm-delete="true">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {!! $contacts->withQueryString()->links('pagination::bootstrap-4') !!}
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
@endsection
