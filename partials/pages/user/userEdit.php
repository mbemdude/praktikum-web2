<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="level" class="py-2">Level</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="level" class="form-control mb-2" id="select2-level">
                                    <option value="">- Pilih -</option>
                                    <option value="operator">Operator</option>
                                    <option value="administrator">Administrator</option>
                                </select>
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="username" class="py-2">Username</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" name="username" class="form-control mb-2">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Simpan
                                    </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="password" class="py-2">Password Lama</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control mb-2">        
                            </div>
                            <div class="col-lg-3">
                                <label for="password" class="py-2">Password Baru</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control mb-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <hr>
                        <div class="row">
                            <div class="col-3"></div>
                                <div class="col-9">
                                    <a href="?page=user-read" class="btn btn-danger">
                                        <i class="fas fa-angle-left"></i>
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>