<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Bandung Techno Park</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- untuk logo check, cancel dan wait di status ruangan admin -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>

    <!-- darp drop down lib -->
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.min.js"></script>

    <style>
        body {
            padding-top: 60px;
        }
    </style>


</head>

<body>
    @include('penyewa.partials.navigationUser')

    <div class="row d-flex min-vh-100">
        @include('penyewa.partials.sidebarUser')
        <div class="col-md-10">
            @yield('containAdmin')
        </div>
    </div>
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>


    <script>
        Dropzone.options.dropzone = {
            url: '/upload',
            maxFilesize: 2,
            acceptedFiles: '.png, .jpg, .jpeg',
            // addRemoveLinks: true,
            // dictRemoveFile: 'Remove file',
            dictDefaultMessage: "Drop files disini",
            init: function() {
                this.on("removedfile", function(file) {
                    console.log("File removed:", file.name);
                });
            }
        };
    </script>
    <!-- <script>
        Dropzone.autoDiscover = false;

        // Dropzone configuration
        var myDropzone = new Dropzone(".dropzone", {
            url: "/file/post",
            paramName: "file",
            maxFilesize: 2, // MB
            maxFiles: 10,
            acceptedFiles: 'image/*',
            dictDefaultMessage: "Drag files here or click to upload.",
            clickable: true
        });
    </script> -->




</body>

</html>

{{-- Calendar JS --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendarEl = document.getElementById('calendar');
    var events = [];
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialView: 'dayGridMonth',
        timeZone: 'UTC',
        events: '/events',
        editable: true,
    });

    calendar.render();
</script>
