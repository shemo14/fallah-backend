<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Mohamed Masoud">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{appPath()}}/images/site/logo.png">

    <title>
        {{settings('site_name_ar')}}
        |
        @yield('title')
    </title>

@yield('styles')

{{--<link href="{{appPath()}}/design/admin/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />--}}
<!-- DataTables -->
    <link href="{{appPath()}}/design/admin/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">

    <!-- Plugins css-->
    <link href="{{appPath()}}/design/admin/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="{{appPath()}}/design/admin/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
    <link href="{{appPath()}}/design/admin/assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{appPath()}}/design/admin/assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="{{appPath()}}/design/admin/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <link href="{{appPath()}}/design/admin/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{appPath()}}/design/admin/assets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="{{appPath()}}/design/admin/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{appPath()}}/design/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- App css -->
    <link href="{{appPath()}}/design/admin/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link href="{{appPath()}}/design/admin/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

    <link href="{{appPath()}}/design/admin/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <link href="{{appPath()}}/design/admin/assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{appPath()}}/design/admin/assets/js/modernizr.min.js"></script>

    <script>
        function ajaxSuccess() {
            $('.cssload-container').fadeOut();
        };
        function ajaxStart() {
            $('.cssload-container').fadeIn();
        };
    </script>
</head>


<body class="fixed-left" onload="myFunction()">
{{--<div id="loader"></div>--}}
    <div class="cssload-container t-all-loader">
        <div class="cssload-whirlpool"></div>
    </div>
<div class='box-loader' id="boxLoader">
    <div class='loader'>
            <div class="cssload-container t-part-loader">
                    <div class="cssload-whirlpool"></div>
                </div>
    </div>
</div>