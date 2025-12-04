<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'My Website' }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/pages/auth.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/error.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/fontawesome/all.min.css')}}">
    <style>
        .fontawesome-icons {
            text-align: center;
        }

        article dl {
            background-color: rgba(0, 0, 0, .02);
            padding: 20px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>
    @livewireStyles
</head>

<body>

    {{ $slot }}

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js" type="text/javascript"></script>
    <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:navigated', () => {

            // Re-init DataTables
            let table1 = document.querySelector('#table1');
            if (table1 && typeof simpleDatatables !== 'undefined') {
                new simpleDatatables.DataTable(table1);
            }

            // Re-init ApexCharts if dashboard charts exist
            if (typeof window.initCharts === 'function') {
                window.initCharts();
            }

            // Re-init Perfect Scrollbar if used in sidebar
            if (document.querySelector('.sidebar-wrapper') && typeof PerfectScrollbar !== 'undefined') {
                new PerfectScrollbar('.sidebar-wrapper');
            }
        });

        document.addEventListener("DOMContentLoaded", () => initSidebar());
        document.addEventListener("livewire:navigated", () => {
            // Wait a bit for Livewire DOM to fully mount
            setTimeout(() => initSidebar(), 50);
        });
    </script>

    @livewireScripts

    <script>
        document.addEventListener('livewire:init', () => {
            // User Delete
            Livewire.on('confirmUserDelete', (event) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteUserConfirmed',{id:event.id})
                        Swal.fire({
                            title: "Deleted!",
                            text: "User has been deleted successfully.",
                            icon: "success"
                        });
                    }
                });
            });

            // Role Delete
            Livewire.on('confirmDeleteRole', (event)=>{
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteRoleConfirmed',{id:event.id})
                        Swal.fire({
                            title: "Deleted!",
                            text: "Role has been deleted successfully.",
                            icon: "success"
                        });
                    }
                });
            })

        });
    </script>
</body>

</html>