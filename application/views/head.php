<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/logos/Logo_LingkunganKU-1.png') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logos/Logo_LingkunganKU-1.png') ?>">
    <title>
        LingkunganKu
    </title>
    <!--     Fonts and icons     -->
    <!-- DataTables + Bootstrap 5 -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- CSS Files -->

    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css">

    <link id="pagestyle" rel="stylesheet" href="<?= base_url('assets/css/argon-dashboard.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/nucleo-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/nucleo-svg.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/DataTables/datatables.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/select2/dist/css/select2.min.css') ?>" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css" integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/libs/filepond/dist/filepond.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/libs/filepond/plugins/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css") ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />


    <style>
        /* Responsive styles untuk mobile */
        @media (max-width: 768px) {
            #chatbot-box {
                right: 20px !important;
                left: 20px !important;
                bottom: 100px !important;
                width: auto !important;
                height: 60vh !important;
                max-width: none !important;
                max-height: 60vh !important;
            }

            #chat-input {
                font-size: 16px !important;
                /* Prevent zoom on iOS */
                padding: 12px 16px !important;
            }

            #send-btn {
                width: 50px !important;
                height: 50px !important;
                font-size: 20px !important;
            }
        }

        @media (max-width: 480px) {
            #chatbot-box {
                right: 10px !important;
                left: 10px !important;
                bottom: 90px !important;
                height: 55vh !important;
                max-height: 55vh !important;
                border-radius: 12px !important;
            }

            #chat-content {
                padding: 8px !important;
            }

            #chat-input {
                padding: 10px 14px !important;
            }
        }

        /* Pastikan flex layout bekerja dengan baik */
        #chatbot-box {
            display: none;
            flex-direction: column;
        }

        #chat-content {
            flex: 1;
            min-height: 0;
            /* Important for flex child to respect height */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>