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
            <form  action="{{ route('mahasiswa.update', $Mahasiswa->Nim) }}" method="POST" id="myForm" enctype="multipart/form-data>
        @csrf
        @method('PUT')

            <div class="form-group">
                <label for="Nim">Nim</label>
                <input type="text" name="Nim" class="form-control" id="Nim" value="{{ $Mahasiswa->Nim }}" ariadescribedby="Nim" >
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" name="Nama" class="form-control" id="Nama" value="{{ $Mahasiswa->Nama }}" ariadescribedby="Nama" >
            </div>
            <div class="form-group">
                <label for="image">Foto Mahasiswa: </label>
                <input type="file" class="form-control" required="required" name="image"></br>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control">
                    @foreach ($kelas as $Kelas)
                    <option value="{{$Kelas->id}}">{{$Kelas->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Jurusan">Jurusan</label>
                <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" value="{{ $Mahasiswa->Jurusan }}" ariadescribedby="Jurusan" >
            </div>
            <div class="form-group">
                <label for="NoHp">NoHp</label>
                <input type="NoHp" name="NoHp" class="form-control" id="NoHp" value="{{ $Mahasiswa->NoHp }}" ariadescribedby="NoHp" >
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $Mahasiswa->email }}" ariadescribedby="email" >
            </div>
            <div class="form-group">
                <label for="tanggalLahir">Tanggal Lahir</label>
                <input type="tanggalLahir" name="tanggalLahir" class="form-control" id="tanggalLahir" value="{{ $Mahasiswa->tanggalLahir }}" ariadescribedby="tanggalLahir" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
    </div>
</div>
@endsection
