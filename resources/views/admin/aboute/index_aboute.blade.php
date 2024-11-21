@extends('layouts.admin')
@section('content')
    <div class="card m-4">
        <div class="card-header">
            <h3 class="card-title">Aboute</h3>
            <div class="float-end">
                @php
                    $aboutsCount = App\Models\Aboute::count();
                @endphp

                @if ($aboutsCount < 3)
                    <a href="{{ route('aboute.create') }}"><i class=" nav-icon bi bi-plus-lg"></i></a>
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
                        <th>Title</th>
                        <th>Content</th>
                        <th>Deskripsi</th>
                        <th style="text-align: end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($aboutes as $data)
                        <tr class="align-middle">
                            <td>{{ $no++ }}</td>
                            <td>
                                <span class="text-toggle" onclick="toggleText(this)">
                                    {{ Str::limit($data->title, 25, ' ...') }}
                                </span>
                                <span class="full-text" style="display: none;">{{ $data->title }}</span>
                            </td>
                            <td>
                                <span class="text-toggle" onclick="toggleText(this)">
                                    {{ Str::limit($data->content, 80, ' ...') }}
                                </span>
                                <span class="full-text" style="display: none;">{{ $data->content }}</span>
                            </td>
                            <td>
                                <span class="text-toggle" onclick="toggleText(this)">
                                    {{ Str::limit($data->deskripsi, 80, ' ...') }}
                                </span>
                                <span class="full-text" style="display: none;">{{ $data->deskripsi }}</span>
                            </td>

                            <td>
                                <form action="{{ route('aboute.destroy', $data->id) }}" method="POST" class="float-end">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <a href="{{ route('aboute.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> | --}}
                                    <a href="{{ route('aboute.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>

                                    @if (count($aboutes) === 3)
                                        {{-- <!-- Memeriksa apakah ada tepat 3 data -->
                                        <button class="btn btn-sm btn-danger" disabled>Can’t Delete</button> --}}
                                    @else
                                        | <a href="{{ route('aboute.destroy', $data->id) }}" class="btn btn-sm btn-danger"
                                            data-confirm-delete="true">Delete</a>
                                    @endif
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

    <script>
        function toggleText(element) {
            const fullTextElement = element.nextElementSibling; // Ambil elemen berikutnya yang merupakan teks penuh
            const isHidden = fullTextElement.style.display === 'none';

            // Tampilkan atau sembunyikan teks penuh
            if (isHidden) {
                fullTextElement.style.display = 'inline'; // Tampilkan teks penuh
                element.style.display = 'none'; // Sembunyikan teks terbatas
            } else {
                fullTextElement.style.display = 'none'; // Sembunyikan teks penuh
                element.style.display = 'inline'; // Tampilkan teks terbatas
            }
        }
    </script>
@endsection
