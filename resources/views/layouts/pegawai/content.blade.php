    <!-- Main content -->
    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Pegawai</h3>
                            <a href="{{ route('pegawai.create') }}" class="btn btn-success float-right">Tambah Data Pegawai</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right my-2" method="get" action="{{ route('searchPegawai') }}">
                                <div class="input-group">
                                    <input type="text" name="searchPegawai" class="form-control" placeholder="Masukkan Nama Pegawai">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Foto</th>
                                        <th width="220px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $pgw)
                                        <tr>
                                            <td>{{ $pgw->idPegawai }}</td>
                                            <td>{{ $pgw->namaPegawai }}</td>
                                            <td>{{ $pgw->alamatPegawai }}</td>
                                            <td>{{ $pgw->telpPegawai }}</td>
                                            <td>{{ $pgw->fotoPegawai }}</td>
                                            <td>
                                                <form action="{{ route('pegawai.destroy', $pgw->idPegawai) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('pegawai.show', $pgw->idPegawai) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('pegawai.edit', $pgw->idPegawai) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {!! $pegawai->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
