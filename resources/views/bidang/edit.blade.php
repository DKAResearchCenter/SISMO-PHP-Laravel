<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

@include("component.head");

<body>

@include("component.switcher");
@include("component.loader");


<div class="page">
    <!-- app-header -->
    @include("component.header");
    <!-- /app-header -->

    <!-- Start::app-sidebar -->
    <aside class="app-sidebar sticky" id="sidebar">

        <!-- Start::main-sidebar-header -->
        <div class="main-sidebar-header">
            <a href="index.html" class="header-logo">
                <img src="/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                <img src="/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                <img src="/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                <img src="/assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
            </a>
        </div>
        <!-- End::main-sidebar-header -->

        <!-- Start::main-sidebar -->
        @include("component.menu");
        <!-- End::main-sidebar -->

    </aside>
    <!-- End::app-sidebar -->

    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <div class="my-auto">
                    <h5 class="page-title fs-21 mb-1">Edit Sekolah Minggu Gereja Toraja (SMGT)</h5>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">bidang</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sekolah Minggu Gereja Toraja (SMGT)</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Header Close -->

            <!-- Start:: row-1 -->
            <div class="row">
                <div class="col-12">

                    @if($status !== null)
                    <div class="alert alert-solid-{{ ($status['status']) ? 'success' : 'danger' }} fade show">
                        {{$status['msg']}}
                    </div>
                    @endif

                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Edit Data {{ $bidang->program_kerja }}
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="./edit">
                                @csrf
                                <input name="id" style="display: none" value="{{ $bidang->id }}">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="form-text" class="form-label fs-14 text-dark">Nama Kegiatan<b style="color='red';">*</b></label>
                                        <input type="text" name="nama" class="form-control" id="form-text" placeholder="" value="{{$bidang->program_kerja}}">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="form-text" class="form-label fs-14 text-dark">Waktu Pelaksanaan<b style="color='red';">*</b></label>
                                        <input type="date" name="desc" class="form-control" id="form-text" placeholder="" value="{{$bidang->waktu_pelaksanaan}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="form-text" class="form-label fs-14 text-dark">Pelaksanaan</label>
                                        <input type="text" name="anggaran" class="form-control" id="form-text" placeholder="" value="{{$bidang->pelaksanaan}}">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="form-text" class="form-label fs-14 text-dark">Kendala</label>
                                        <input type="text" name="tanggal_agenda" class="form-control" id="form-text" placeholder="" value="{{$bidang->kendala}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                    </div>
                                    <div class="col-6 mb-3 text-end">
                                        <a href="SMGT" class="btn btn-lg btn-danger-gradient mb-3">Batalkan</a>
                                        <button type="submit" class="btn btn-lg btn-success-gradient mb-3">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:: row-1 -->
        </div>
    </div>
    <!-- End::app-content -->

    <!-- Footer Start -->
    @include("component.footer");
    <!-- Footer End -->

</div>


<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="las la-angle-double-up"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<!-- Popper JS -->
<script src="/assets/libs/@popperjs/core/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Defaultmenu JS -->
<script src="/assets/js/defaultmenu.min.js"></script>

<!-- Node Waves JS-->
<script src="/assets/libs/node-waves/waves.min.js"></script>

<!-- Sticky JS -->
<script src="/assets/js/sticky.js"></script>

<!-- Simplebar JS -->
<script src="/assets/libs/simplebar/simplebar.min.js"></script>
<script src="/assets/js/simplebar.js"></script>

<!-- Color Picker JS -->
<script src="/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


<!-- Apex Charts JS -->
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- JSVector Maps JS -->
<script src="/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>

<!-- JSVector Maps MapsJS -->
<script src="/assets/libs/jsvectormap/maps/world-merc.js"></script>
<script src="/assets/js/us-merc-en.js"></script>

<!-- Chartjs Chart JS -->
<script src="/assets/js/index.js"></script>


<!-- Custom-Switcher JS -->
<script src="/assets/js/custom-switcher.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/custom.js"></script>

<!-- Select2 Cdn -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<!-- Internal Datatables JS -->
<script src="/assets/js/datatables.js"></script>
<!-- Internal Select-2.js -->
<script src="/assets/js/select2.js"></script>


</body>

</html>
