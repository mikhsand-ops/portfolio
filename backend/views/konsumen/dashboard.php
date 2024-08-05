<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/slider1.jpg'); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/slider2.jpg'); ?>" class="d-block w-100" alt="...">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<!-- fungsi search -->
<div class="container">
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control  border-1 small" placeholder="Cari Toko.." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search fa-sm"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- fungsi card -->
<div class="container pt-1 pb-1 ">
    <div class="row text-center mt-4">
        <?php foreach ($merchant as $m) : ?>

            <div class="col-sm-3 col-lg-4 col-xl-4 "><div class="single-home-blog">
                <div class="card mb-5">
                <img src="<?php echo base_url() . '/assets/img/logoToko/' . $m->logo_merchant ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title mb-1"><?php echo $m->nama_merchant ?></h6>
                    <p class="card-text mb-1"><?php echo $m->nomor_kios ?></p>
                    <a href="cmenu/<?php echo $m->id_merchant;?>"  class="btn btn-sm btn-primary mb-3">Lihat Menu</a>

                </div>
            </div>
        </div>
 </div>

        <?php endforeach; ?>
    </div>
</div>