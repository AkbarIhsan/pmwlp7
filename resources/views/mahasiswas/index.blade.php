@extends('mahasiswas.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            <div class="float-right my-2">
                <a class="btn btnsuccess" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
            <form action="{{ route('mahasiswa.index') }}" method="GET">
                <div class="input-group mb-3">
                  <input type="text" class="form-inline" name="search" placeholder="Cari mahasiswa..." value="{{ request()->input('search') }}">
                  <button class="input-group-text" type="submit">Cari</button>
                </div>
            </form>
            @if($mahasiswas->isEmpty())
                <div class="alert alert-danger">Mahasiswa tidak ditemukan</div>
            @endif

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>NoHp</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswas as $Mahasiswa)
        <tr>
            <td>{{ $Mahasiswa->Nim }}</td>
            <td>{{ $Mahasiswa->Nama }}</td>
            <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
            <td>{{ $Mahasiswa->Jurusan }}</td>
            <td>{{ $Mahasiswa->NoHp }}</td>
            <td>{{ $Mahasiswa->email }}</td>
            <td>{{ $Mahasiswa->tanggalLahir }}</td>
            <td>
        <form action="{{ route('mahasiswa.destroy',$Mahasiswa->Nim) }}" method="POST">
            <a class="btn btn-info" href="{{ route('mahasiswa.show',$Mahasiswa->Nim) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->Nim) }}">Edit</a>
        @csrf

        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="text-center">
        <ul class="pagination pagination-sm">
          <li class="page-item">
            <a class="page-link" href="{{ $mahasiswas->previousPageUrl() }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          {{ $mahasiswas->links("pagination::bootstrap-4") }}
          <li class="page-item">
            <a class="page-link" href="{{ $mahasiswas->nextPageUrl() }}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </div>
      
      
      
@endsection

