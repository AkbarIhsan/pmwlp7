@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Mahasiswa
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
            <form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->Nim) }}" id="myForm">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="Nim">Nim</label>
                <input type="text" name="Nim" class="formcontrol" id="Nim" value="{{ $Mahasiswa->Nim }}" ariadescribedby="Nim" >
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" name="Nama" class="formcontrol" id="Nama" value="{{ $Mahasiswa->Nama }}" ariadescribedby="Nama" >
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label>
                <input type="Kelas" name="Kelas" class="formcontrol" id="Kelas" value="{{ $Mahasiswa->Kelas }}" ariadescribedby="Kelas" >
            </div>
            <div class="form-group">
                <label for="Jurusan">Jurusan</label>
                <input type="Jurusan" name="Jurusan" class="formcontrol" id="Jurusan" value="{{ $Mahasiswa->Jurusan }}" ariadescribedby="Jurusan" >
            </div>
            <div class="form-group">
                <label for="NoHp">NoHp</label>
                <input type="NoHp" name="NoHp" class="formcontrol" id="NoHp" value="{{ $Mahasiswa->NoHp }}" ariadescribedby="NoHp" >
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" class="formcontrol" id="email" value="{{ $Mahasiswa->email }}" ariadescribedby="email" >
            </div>
            <div class="form-group">
                <label for="tanggalLahir">Tanggal Lahir</label>
                <input type="tanggalLahir" name="tanggalLahir" class="formcontrol" id="tanggalLahir" value="{{ $Mahasiswa->tanggalLahir }}" ariadescribedby="tanggalLahir" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
