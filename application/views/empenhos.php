<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <script src=<?php echo base_url('assets/js/core/jquery.min.js');?> ></script>
    <script src=<?php echo base_url('assets/js/core/popper.min.js');?> ></script>
    <link rel="apple-touch-icon" sizes="76x76" href= <?php echo base_url('assets/img/apple-icon.png'); ?> >
    <link rel="icon" type="image/png" href= <?php echo base_url('/assets/img/ufrnIcon.png'); ?> >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Projato</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link rel="stylesheet" href= <?php echo base_url('assets/css/bootstrap.min.css'); ?> />
    <link rel="stylesheet" href=  <?php echo base_url('assets/css/now-ui-dashboard.css'); ?> />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href= <?php echo base_url('assets/demo/demo.css'); ?>  />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue">
        <div class="logo">
            <a class="simple-text logo-normal text-center">
            Projato
            </a>

        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href=<?php echo base_url('/index.php/welcome/inicio/');?>>
                        <i class="now-ui-icons education_hat"> </i>
                        <p>Inicio</p>
                    </a>

                </li>

                <li class="active">
                    <a href=<?php echo base_url('/index.php/welcome/empenhos');?>>
                        <i class="now-ui-icons files_paper"></i>
                        <p>Empenhos</p>
                    </a>

                </li>

                <li>
                    <a href=<?php echo base_url('/index.php/welcome/processos');?>>
                        <i class="now-ui-icons files_single-copy-04"></i>
                        <p>Processos</p>
                    </a>

                </li>

            </ul>
        </div>
    </div>
</div>

</body>
</html>