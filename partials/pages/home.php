                    <?php 
                    function countRows($table, $db) {
                        $countSQL = "SELECT COUNT(*) FROM ". $table;

                        $stmt = $db->prepare($countSQL);
                        $stmt->execute();
                        $count = $stmt->fetchColumn();

                        return $count;
                    }

                    $database = new Database();
                    $db = $database->getConnection();

                    $countMahasiswa = countRows('tb_mahasiswa', $db);
                    $countDosen = countRows('tb_dosen', $db);
                    $countUser = countRows('tb_user', $db);
                    ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                        </a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Mahasoswa Card  Example -->
                        <div class="col-xl-4 col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Mahasiswa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countMahasiswa ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dosen Card Example -->
                        <div class="col-xl-4 col-md-12 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Dosen</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countDosen ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-12 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countUser ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Materi Praktikum</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4>Materi Praktikum</h4>
                                            <ul>
                                                <li>Menggunakan admin template (sbadmin2)</li>
                                                <li>Membuat aplikasi create, read, update, delete, print dengan bahasa pemrograman (PHP)</li>
                                                <li>Menggunakan Datatables untuk menampilkan data</li>
                                                <li>Menggunakan select2 untuk menampilkan daftar select/list</li>
                                                <li>Membuat fungsi print menggunakan library FPDF dan windows.print</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4>Ruang Lingkup Aplikasi</h4>
                                            <ul>
                                                <li>Login</li>
                                                <ul>
                                                    <li>level : admin</li>
                                                    <li>level : operator</li>
                                                </ul>
                                                <li>Menampilkan data dengan datatables</li>
                                                <li>Fungsi simpan Data</li>
                                                <li>Fungsi edit Data</li>
                                                <li>Fungsi hapus berdasarkan baris data</li>
                                                <li>Fungsi cetak (semua data)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>