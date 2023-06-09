@extends('layout.template')
<!-- START DATA -->
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
          <form class="d-flex" action="{{ url('books') }}" method="get">
              <input class="form-control me-1" type="search" name="searchQuery" value="{{ Request::get('searchQuery') }}" placeholder="Masukkan kata kunci" aria-label="Search">
              <button class="btn btn-secondary" type="submit">Cari</button>
          </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
          <a href='{{ url("books/create") }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Release Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $datum)
                    <tr>
                        <td> {{ $datum->id }}</td>
                        <td> {{ $datum->title }}</td>
                        <td> {{ $datum->author }}</td>
                        <td> {{ $datum->release }}</td>
                        <td>
                            <a href='{{ url('books/'. $datum->id .'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Are you sure you want to delete this book ?')" class='d-inline' action="{{ url('books/'.$datum->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit"class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                     </tr>
                @endforeach
            </tbody>
        </table>
    {{ $data->withQueryString()->links() }}
  </div>
@endsection
  <!-- AKHIR DATA -->
