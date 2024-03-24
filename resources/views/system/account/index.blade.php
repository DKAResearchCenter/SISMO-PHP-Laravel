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
                    <h5 class="page-title fs-21 mb-1">Pengaturan Akun</h5>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pengaturan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Management akun</li>
                        </ol>
                    </nav>
                </div>

                <div class="d-flex my-xl-auto right-content align-items-center">
                    <div class="pe-1 mb-xl-0">
                        <button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
                    </div>
                </div>
            </div>
            <!-- Page Header Close -->

            <!-- Start:: row-3 -->
            <div class="row">
                <div class="col-xl-12">
                    <a href="account/create" class="btn btn-lg btn-primary-gradient mb-3">Tambahkan Akun Baru</a>
                    <div class="card custom-card">
                        <div class="card-header">

                            <div class="card-title">
                                Data Akun Login
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users_login as $key => $data)
                                <tr>
                                    <th>{{$data->id}}</th>
                                    <th>{{$data->name}}</th>
                                    <th>{{$data->email}}</th>
                                    <th>{{$data->created_at}}</th>
                                    <td>
                                        <a href="account/edit?id={{$data->id}}" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil"></i></a>
                                        &nbsp;
                                        <div class="btn btn-danger btn-sm edit"><span class="id_data" style="display: none">{{$data->id}}</span><i class="mdi mdi-delete"></i></div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:: row-3 -->
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
<script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Chartjs Chart JS -->
<script src="/assets/js/index.js"></script>


<!-- Custom-Switcher JS -->
<script src="/assets/js/custom-switcher.min.js"></script>
<!-- Custom JS -->
<script src="/assets/js/custom.js"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>


<!-- Internal Datatables JS -->
<script src="/assets/js/datatables.js"></script>

<script>

    $(document).on("click", "div.edit", function () {
        let value = $(this).children(".id_data").text();
        Swal.fire({
            title: 'Yakin Ingin Menghapus Data Ini',
            text: "Pastikan Data Yang Anda Ingin Hapus Telah Benar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Ya Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${window.location.href}`,
                    method: "DELETE",
                    cache: false,
                    data : {
                        id : Number(value),
                        _token : "{{ csrf_token() }}"
                    },
                    success: (response) => {
                        if (response.status){
                            Swal.fire({
                                title: 'Data Berhasil Dihapus',
                                text: response.msg,
                                icon: 'success',
                                timer : 2000
                            }).then(() => {
                                window.location.reload();
                            })
                        }else{
                            Swal.fire({
                                title: 'Data Gagal Dihapus',
                                text: response.msg,
                                icon: 'error',
                                timer : 2000
                            });
                        }
                    },
                    error : (error) => {
                        Swal.fire({
                            title: 'Terjadi Error',
                            text: "Gagal Menghapus Data",
                            icon: 'error',
                            timer : 2000
                        });
                    }
                });
            }
        })
    })
</script>
</body>

</html>
