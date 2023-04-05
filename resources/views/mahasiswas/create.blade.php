@extends('mahasiswas.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                Tambah Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
                @csrf
                    <div class="form-group">
                        <label for="Nim">Nim</label>
                        <input type="text" name="Nim" class="formcontrol" id="Nim" aria-describedby="Nim" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="Nama" name="Nama" class="formcontrol" id="Nama" aria-describedby="Nama" >
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <input type="Kelas" name="Kelas" class="formcontrol" id="Kelas" aria-describedby="password" >
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <input type="Jurusan" name="Jurusan" class="formcontrol" id="Jurusan" aria-describedby="Jurusan" >
                    </div>
                    <div class="form-group">
                        <label for="NoHp">NoHp</label>
                        <input type="NoHp" name="NoHp" class="formcontrol" id="NoHp" aria-describedby="NoHp" >
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" class="formcontrol" id="email" ariadescribedby="email" >
                    </div>
                    <div class="form-group">
                        <label for="tanggalLahir">Tanggal Lahir</label>
                        <input type="tanggalLahir" name="tanggalLahir" class="formcontrol" id="tanggalLahir" ariadescribedby="tanggalLahir" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection
