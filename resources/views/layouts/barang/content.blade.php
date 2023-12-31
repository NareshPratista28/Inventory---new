<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Barang</h3>
                            <a href="{{ route('barang.create') }}" class="btn btn-success float-right">Tambah Data Barang</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-right my-2" method="GET" action="{{ route('searchBarang') }}">
                                <div class="input-group">
                                    <input type="text" name="searchBarang" class="form-control" id="searchBarang" placeholder="Masukkan Nama Kategori">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Satuan</th>
                                            <th>Stock</th>
                                            <th>Harga</th>
                                            <th>Pemasok</th>
                                            <th>Kategori</th>
                                            <th>Foto</th>
                                            <th width="220px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $brg)
                                            <tr>
                                                <td>{{ $brg->namaBarang }}</td>
                                                <td>{{ $brg->satuan }}</td>
                                                <td>{{ $brg->stock }}</td>
                                                <td>{{ $brg->harga }}</td>
                                                <td>{{ $brg->pemasok->namaPemasok }}</td>
                                                <td>{{ $brg->kategori->namaKategori }}</td>
                                                <td><img width="100px" src="{{ asset('storage/' . $brg->fotoBarang) }}"></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a class="btn btn-info btn-sm" href="{{ route('barang.show', $brg->idBarang) }}">Show</a>
                                                        <a class="btn btn-primary btn-sm" href="{{ route('barang.edit', $brg->idBarang) }}">Edit</a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmation{{ $brg->idBarang }}">Delete</button>
                                                    </div>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteConfirmation{{ $brg->idBarang }}" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Barang</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Anda yakin ingin menghapus barang ini?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <form action="{{ route('barang.destroy', $brg->idBarang) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
