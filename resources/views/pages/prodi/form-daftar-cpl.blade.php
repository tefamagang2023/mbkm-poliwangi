@extends('layouts.base-mahasiswa')
@section('Kegiatan')
    <title>Form Daftar CPL | Politeknik Negeri Banyuwangi</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@endsection

@section('content')
    <section class="container-fluid py-3">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div class="card card-rounded">
                        <div class="card-header d-flex">
                            <h4>Tambah Data Daftar CPL</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Kode CPL</label>
                                <input type="text" class="form-control" placeholder="Kode CPL">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" id="floatingTextarea"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jenis CPL</label>
                                <input type="text" class="form-control" placeholder="Kode CPL">
                            </div>
                            <div class="form-group">
                                <label>Kurikulum</label>
                                <select class="form-control">
                                    <option>Kurikulum</option>
                                    <option>Kurikulum 1</option>
                                    <option>Kurikulum 1</option>
                                    <option>Kurikulum 1</option>
                                    <option>Kurikulum 1</option>
                                </select>
                            </div>

                            <div class="card-footer text-center">
                                <button class="btn btn-primary mr-1" style="width: 200px;" type="submit">Simpan</button>
                                <button class="btn btn-warning mr-1" style="width: 200px;" type="submit">Reset</button>
                                <button class="btn btn-danger mr-1" style="width: 200px;" type="submit">Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
@endsection