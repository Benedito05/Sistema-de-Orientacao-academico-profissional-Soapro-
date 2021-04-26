<?php
session_start();
require_once("seguranca.php");
include_once("conexao.php");

//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
?>
<!DOCTYPE html>

<html>

    <!-- Mirrored from adminlte.io/themes/AdminLTE/pages/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:12 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
    <head>

        <meta charset="utf-8">

        <meta charset='utf-8' />
        <link href='bower_components/fullcalendar/css/core/main.min.css' rel='stylesheet' />
        <link href='bower_components/fullcalendar/css/daygrid/main.min.css' rel='stylesheet' />
        <script src='bower_components/fullcalendar/core/main.min.js'></script>
        <script src='bower_components/fullcalendar/interaction/main.min.js'></script>
        <script src='bower_components/fullcalendar/daygrid/main.min.js'></script>
        <script src='bower_components/fullcalendar/core/locales/pt-br.js'></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SISTEMA DE ORIENTAÇÃO PROFISSIONAL</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- fullCalendar -->
       
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

           <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   
   
   
   
   
              <script>

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid'],
        //defaultDate: '2019-04-12',
        editable: true,
        eventLimit: true,
        events: 'list_eventos.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        }
    });

    calendar.render();
});

</script>
<style>

/* body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
} */

#calendar {
    max-width: 900px;
    margin: 0 auto;
}

</style>
            </head>
    <body class="hold-transition skin-blue sidebar-mini">

    <?php include "menu.php" ?>
     
    <div id='calendar'></div>
                <!-- /.sidebar -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">

                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->

                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
        <div class="pull-left hidden-xs">

        </div>
        Todos os Direitos reservados Por <strong>Copyright &copy;<script>
                document.write(new Date().getFullYear());
            </script> <a href="">SOAPRO</a></strong>.

    </footer>

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
         
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Slimscroll -->
        <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <!-- fullCalendar -->
        <script src="bower_components/moment/moment.js"></script>

        <!-- Page specific script -->
       
    </body>

    <!-- Mirrored from adminlte.io/themes/AdminLTE/pages/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:16 GMT -->
</html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:58:15 GMT -->

