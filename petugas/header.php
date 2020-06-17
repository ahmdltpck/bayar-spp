

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
                <a href="#" class="navbar-brand"><?php echo $_SESSION['username']; ?></a>
                <h5 class="ml-auto text-white my-2 ">Pembayaran SPP Sekolah</h5>
                <form action="#" method="POST" class="form-inline my-2 my-lg-0 ml-auto">
                    <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari " style="width: 400px">
                    <input type="submit" value="CARI" name="submit" class="btn btn-success">
                </form>
                <div class="icon ml-4">
                    <h5><a href="logout.php" class="text-white">
                        <i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Keluar"></i>
                        </a>
                    </h5>
                </div>
            </nav>