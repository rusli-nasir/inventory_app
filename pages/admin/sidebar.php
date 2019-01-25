<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="index.php">
            <img src="../../assets/images/s200_smpn_5.png " width="50" height="50" />
            <span>SMP Negeri 5 Mengwi</span>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="index.php">
                        <i class="fas fa-home"></i>Home</a>
                </li>

                <li>
                    <a class="js-arrow" href="#">
                        <i class="fas fa-user"></i>Data User</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="tambah-user.php">Tambah</a>
                        </li>
                        <li>
                            <a href="data-user.php">Daftar User</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="js-arrow" href="#">
                        <i class="fas fa-building"></i>Data Laboratorium</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="tambah-lab.php">Tambah</a>
                        </li>
                        <li>
                            <a href="data-lab.php">Daftar Laboratorium</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <?php
                    include "../../config/koneksi.php";
                    $query = "SELECT * FROM tabel_laboratorium ORDER BY kd_lab ASC";
                    $hasil = mysqli_query($db, $query);
                    $data_lab = array();
                    while ($row = mysqli_fetch_assoc($hasil)) {
                        $data_lab[] = $row;
                    }
                    ?>
                    <a class="js-arrow" href="#"><i class="fas fa-archive"></i>Data Inventori</a>
                    <ul class=" navbar__sub-list js-sub-list">
                        <li>
                            <a href="#" class="js-arrow">Data Komputer</a>
                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                <?php foreach ($data_lab as $data) :  ?>
                                    <li><a href="tambah-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>">Tambah Komputer <?php echo $data['nama_lab'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="js-arrow">Daftar Komputer</a>
                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                <?php foreach ($data_lab as $data) :  ?>
                                    <li><a href="data-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>"><?php echo $data['nama_lab'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="js-arrow">Data Non Komputer</a>
                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                <?php foreach ($data_lab as $data) :  ?>
                                    <li>
                                        <a href="tambah-non-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>">Tambah Non Komputer <?php echo $data['nama_lab'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="js-arrow">Daftar Non Komputer</a>
                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                <?php foreach ($data_lab as $data) :  ?>
                                    <li>
                                        <a href="data-non-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>"><?php echo $data['nama_lab'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="js-arrow">Komponen Komputer Baru</a>
                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                <?php foreach ($data_lab as $data) :  ?>
                                    <li>
                                        <a href="tambah-komponen-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>">Tambah Komponen <?php echo $data['nama_lab'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="js-arrow">Daftar Komponen Komputer Baru</a>
                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                <?php foreach ($data_lab as $data) :  ?>
                                    <li>
                                        <a href="data-komponen-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>"><?php echo $data['nama_lab'] ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="js-arrow" href="#">
                        <i class="fas fa-gears"></i>Data Maintenance</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="tambah-mt.php">Tambah Inventori Komputer</a>
                        </li>
                        <li>
                            <a href="tambah-mt-nonkomputer.php">Tambah Inventori Non Komputer</a>
                        </li>
                        <li>
                            <a href="data-mt.php">Daftar Maintenance Komputer</a>
                        </li>
                        <li>
                            <a href="data-mt-nonkomputer.php">Daftar Maintenance Non Komputer</a>
                        </li>
                    </ul>
                </li>
                <!--
                        <li>
                            <?php
                include "../../config/koneksi.php";
                $query = "SELECT * FROM tabel_laboratorium ORDER BY kd_lab ASC";
                $hasil = mysqli_query($db, $query);
                $data_lab = array();
                while ($row = mysqli_fetch_assoc($hasil)) {
                    $data_lab[] = $row;
                }
                ?>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Laporan Laboratorium</a>
                                    <ul class="navbar__sub-list js-sub-list">

                                        <li>
                                            <a href="#" class="js-arrow"></i>Laporan Inventori </a>
                                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                                <?php foreach ($data_lab as $data) :  ?>
                                                <li><a href="Laporan-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>"><?php echo $data['nama_lab'] ?></a></li>
                                                <?php endforeach ?>
                                             </ul>
                                        </li>

                                        <li>
                                            <a href="#" class="js-arrow"></i>Laporan Non Inventori</a>
                                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                                <?php foreach ($data_lab as $data) :  ?>
                                                <li><a href="Laporan-non-komputer.php?kd_lab=<?php echo $data['kd_lab'] ?>"><?php echo $data['nama_lab'] ?></a></li>
                                                <?php endforeach ?>
                                             </ul>
                                        </li>


                                         <li>
                                            <a href="#" class="js-arrow"></i>Laporan Maintenance</a>
                                            <ul class="list-unstyled navbar__submenu-list js-sub-list">
                                                <?php foreach ($data_lab as $data) :  ?>
                                                <li>
                                                <a href="Laporan-maintenance.php?kd_lab=<?php echo $data['kd_lab'] ?>"><?php echo $data['nama_lab'] ?></a>
                                                </li>
                                                <?php endforeach ?>
                                             </ul>
                                        </li>
                            </ul>
                        </li> -->

            </ul>
<!--            </li>-->
<!--            </ul>-->
        </nav>
    </div>
</aside>