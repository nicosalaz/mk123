<?php

date_default_timezone_set("America/Bogota");


include 'funciones.php';

include '../config.php';


      if (isset($_GET['anio']) ) {
        $anio = $_GET['anio'];
      } else {
        $anio= date('Y');
      }
      if (isset($_GET['mes']) ) {
        $mes = $_GET['mes'];
      } else {
        $mes= date('m');
      }



      if (isset($_POST['from']) or isset($_POST['from2'])) 
      {      /* $query1="";    $query2="";    $query3="";    $query4=""; */
      
          if ($_POST['from']!="") 
          {
      
              $Datein = date('d/m/Y H:i:s', strtotime($_POST['from']));
              $Datefi = date('d/m/Y H:i:s', strtotime($_POST['from']));
              $inicio = _formatear($Datein);
              $final  = _formatear($Datefi);
              $orderDate = date('d/m/Y H:i:s', strtotime($_POST['from']));
              $inicio_normal = $orderDate;
              $orderDate2 = date('d/m/Y H:i:s', strtotime($_POST['from']));
              $final_normal  = $orderDate2;
                   $tit1=""; $tit2=""; $tit3=""; $tit4=""; $titulo="";
              if ( isset($_POST['pcf_level2'])) {$tit1= "  level2 -";}
              if ( isset($_POST['pcf_level3'])) {$tit1= $tit1."  level3 -";}
              if ( isset($_POST['pcf_soap'])) {$tit1= $tit1."  soap -";}
              if ( isset($_POST['pcf_spk'])) {$tit1= $tit1."  spk ";}        
              $tit1= "PCF ".$tit1;

              if ( isset($_POST['nfs_level2'])) {$tit2= " level2 -";}
              if ( isset($_POST['nfs_level3'])) {$tit2= $tit2." level3 -";}
              if ( isset($_POST['nfs_soap'])) {$tit2= $tit2." soap -";}
              if ( isset($_POST['nfs_spk'])) {$tit2= $tit2." spk ";}    
              $tit2= "NFS ".$tit2;    
      
              if ( isset($_POST['WD_level2'])) {$tit3= " level2 -";}
              if ( isset($_POST['WD_level3'])) {$tit3= $tit3." level3 -";}
              if ( isset($_POST['WD_soap'])) {$tit3= $tit3." soap -";}
              if ( isset($_POST['WD_spk'])) {$tit3= $tit3." spk";}        
              $tit3= "WD ".$tit3;

              if ( isset($_POST['WSD_level2'])) {$tit4= " level2 -";}
              if ( isset($_POST['WSD_level3'])) {$tit4= $tit4." level3 -";}
              if ( isset($_POST['WSD_soap'])) {$tit4= $tit4." soap -";}
              if ( isset($_POST['WSD_spk'])) {$tit4= $tit4." spk";}        
                $tit4= "WSD ".$tit4;

              $body   = evaluar($_POST['event']);
              $clase  = evaluar($_POST['class']);
      
              $query1="INSERT INTO agenda VALUES(null,'$tit1','$tit2','$tit3','$tit4','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";
      
              $conexion->query($query1)or die('<script type="text/javascript">console.log("Shedule not available")</script>');
       
      
              $im=$conexion->query("SELECT MAX(id) AS id FROM agenda");
              $row = $im->fetch_row();  
              $id = trim($row[0]);
      
              $link = "$base_url"."descripcion_evento.php?id=$id";
      
              $query2="UPDATE agenda SET url = '$link' WHERE id = $id";
      
              $conexion->query($query2); 
      
               
          }
      
      
          if ($_POST['from2']!="") 
          {
      
              $Datein  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
              $Datefi  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
              $inicio = _formatear($Datein);       
              $final  = _formatear($Datefi);
              $orderDate  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
              $inicio_normal = $orderDate;
             
              $orderDate2  = date('d/m/Y H:i:s', strtotime($_POST['from2']));
              $final_normal  = $orderDate2;
      
                   $tit1=""; $tit2=""; $tit3=""; $tit4="";$tit5="";$tit6="";
                   $tit7="";$tit8="";$tit9="";$tit10="";$tit11="";$tit12="";$tit13="";$tit14="";
      
              if ( isset($_POST['LP_1'])) {$tit1= "LP #1";}
              if ( isset($_POST['LP_2'])) {$tit2= "LP #2";}
              if ( isset($_POST['LP_3'])) {$tit3= "LP #3";}
              if ( isset($_POST['LP_4'])) {$tit4= "LP #4";}        
              if ( isset($_POST['LP_5'])) {$tit5= "LP #5";}
              if ( isset($_POST['LP_6'])) {$tit6= "LP #6";}  
              if ( isset($_POST['equipment_cleanning'])) {$tit7= "Equipment Cleanning";}
              if ( isset($_POST['silverson'])) {$tit8= "Silverson";}
              if ( isset($_POST['ika'])) {$tit9= "IKA";}
              if ( isset($_POST['50_liter'])) {$tit10= "50 Liter";}   
              if ( isset($_POST['scrubber'])) {$tit11= "Scrubber";}           
              if ( isset($_POST['bosch_filling_station'])) {$tit12= "Bosch Filling Station";}           
              if ( isset($_POST['sd_micro_1'])) {$tit13= "SD Micro 1";}           
              if ( isset($_POST['sd_micro_2'])) {$tit14= "SD Micro 2";}           
           
              $body   = evaluar($_POST['event2']);
              $clase  = evaluar($_POST['class2']);
      
              $query3="INSERT INTO agenda2 
              VALUES(null,'$tit1','$tit2','$tit3','$tit4','$tit5','$tit6','$tit7','$tit8','$tit9','$tit10',
                      '$tit11','$tit12','$tit13','$tit14','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";
              $conexion->query($query3)or die('<script type="text/javascript">location.reload();</script>');
      
              $im=$conexion->query("SELECT MAX(id) AS id FROM agenda2");
              $row = $im->fetch_row();  
              $id = trim($row[0]);
      
              $link = "$base_url2"."descripcion_evento.php?id=$id";
      
              $query4="UPDATE agenda2 SET url = '$link' WHERE id = $id";
              $conexion->query($query4); 
      
          }
      
      
      }
      



?>

<!DOCTYPE html>
<html lang="in">
<head>
    <meta charset="utf-8">
    <title>Calendario</title>
    <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
    <link href="<?=$base_url?>css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
    <script src="<?=$base_url?>js/jquery.min.js"></script>
    <script src="<?=$base_url?>js/moment.js"></script>
    <script src="<?=$base_url?>js/bootstrap.min.js"></script>
    <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
    
</head>
</head>
<body style="background: white;" onload="muestrames()">
    <div class="container">
        <div class="row"> 
                <br><br><br>
            <h1 class="section-heading">Cleaning  Room</h1>
            <div class="page-header" style="text-align:center">
            <span id='monthw' style='font-size:4rem;color:blue;'></span>
            </div>
            <div class="pull-left form-inline" style='margin-left: 10rem;'><br>
                <div class="btn-group">
                    <button class="btn btn-primary" data-calendar-nav="prev"><i class="fa fa-arrow-left"></i>  </button>
                    <button class="btn" data-calendar-nav="today"> </button>
                    <button class="btn btn-primary" data-calendar-nav="next"><i class="fa fa-arrow-right"></i>  </button>
                </div>
                
                <input type="text" name="yearx" id="yearx" value='<?php echo $anio?>' style="width:5rem;text-align:center">
                <input type="hidden" name="monthx" id="monthx" value='<?php echo $mes?>' style="width:5rem;text-align:center">
                <div class="btn-group">
                    <button id="yearw" name="yearw" class="btn btn-warning" style='displa:none' data-calendar-view="year">Year</button>
                    <button class="btn btn-warning active" data-calendar-view="month">Month</button>
                    <button class="btn btn-warning" data-calendar-view="week">Week</button>
                    <button style='display:none' class="btn btn-warning" data-calendar-view="day">Day</button>
                </div>
                
            </div>
            <div class="pull-right form-inline"><br>
                <button class="btn btn-info" 
                        data-toggle='modal' data-target='#add_evento' style='margin-left:-20rem'>Add Event</button>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->       
        </div>
        <!--ventana modal para el calendario-->
        <div class="modal fade" id="events-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                       <div class="modal-header"> 
                        <!-- <a href="#" data-dismiss="modal" style="float: right;"> <i class="glyphicon glyphicon-remove "></i> </a> -->
                        <br>
                    </div>
                    <div class="modal-body" style="height: 400px">
                        <p>One fine body&hellip;</p>
                    </div>
                    <button type="button" onclick="window.location.reload()" style='position:relative;left:20rem;top:-5rem'
                            class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> close</button>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">

            $("#yearx").keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if(code==13){
                    var anio= $("#yearx").val();
                    location.href='?anio='+anio;
                }
            });

            $("#monthx").keypress(function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if(code==13){
                    var mes= $("#monthx").val();
                    location.href='?mes='+mes;
                }
            });

            function muestrames(){
                var valory= $("#monthx").val();
                if (valory=='01') { $("#monthw").html("January");}
                if (valory=='02') { $("#monthw").html("February");}
                if (valory=='03') { $("#monthw").html("March");}
                if (valory=='04') { $("#monthw").html("April");}
                if (valory=='05') { $("#monthw").html("May");}
                if (valory=='06') { $("#monthw").html("June");}
                if (valory=='07') { $("#monthw").html("July");}
                if (valory=='08') { $("#monthw").html("August");}
                if (valory=='09') { $("#monthw").html("September");}
                if (valory=='10') { $("#monthw").html("October");}
                if (valory=='11') { $("#monthw").html("November");}
                if (valory=='12') { $("#monthw").html("December");}
            }


        (function($){

                var date = new Date();
                /* var yyyy = date.getFullYear().toString(); */

                var yyyy= $('#yearx').val();               
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
                    
                //establecemos los valores del calendario
                var options = {

                    modal: '#events-modal', 

                        modal_type:'iframe',    

                        events_source: '<?=$base_url?>obtener_eventos.php', 

                        view: 'month',             

                        day: yyyy+"-"+mm+"-"+dd,   

                        language: 'in-IN', 

                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,

                        time_start: '08:00', 

                        time_end: '22:00',   

                        time_split: '30',    

                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                            if(!events)
                            {
                                return;
                            }
                            var list = $('#eventlist');
                            list.html('');

                            $.each(events, function(key, val)
                            {
                                $(document.createElement('li'))
                                .html('<a href="">' + val.title + '</a>')
                                .appendTo(list);
                            });
                        },
                        onAfterViewLoad: function(view)
                        {  
                            $('#page-header').text(this.getTitle());
                            $('.btn-group button').removeClass('active');
                            $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                            months: {
                                general: 'label'
                            }
                        }
                    };

                        /* alert(options.day); */
                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                    var $this = $(this);
                    $this.click(function()
                    {   
                        calendar.navigate($this.data('calendar-nav'));
                    });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                    var $this = $(this);
                    $this.click(function()
                    {
                        calendar.view($this.data('calendar-view'));
                    });
                });

                $('#first_day').change(function()
                {
                    var value = $(this).val();
                    value = value.length ? parseInt(value) : null;
                    calendar.setOptions({first_day: value});
                    calendar.view();
                });
            }(jQuery));
        </script>

       

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        
    <form id='nuevoevento' action="" method="post">

        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add New Event - Cleanning Room</h4>
                    </div>
                <div class="modal-body">
                
                    <label for="from" style="float:left;margin-right:1rem">Start.</label>
                    <div class='input-group date' id='from' style="margin-right:1rem">
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <div class='input-group date' id='to' style="float:left;margin-top:-2rem;display:none">
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <br><br>
                    <table style='width:80%;margin-left:5rem;'>
                        <tr><td style='width:48%;'>

                            <table style='border:thin solid black;width:80%;'>
                                <tr><td colspan="2" style='background:#eeee;color:orange'>PCF</td></tr>
                                <tr><td><input type="checkbox" name="pcf_level2" id="pcf_level2"></td> <td>Level 2</td></tr>
                                <tr><td><input type="checkbox" name="pcf_level3" id="pcf_level3"></td> <td>Level 3</td></tr>
                                <tr><td><input type="checkbox" name="pcf_soap" id="pcf_soap"></td><td>Soap</td></tr>
                                <tr><td><input type="checkbox" name="pcf_spk" id="pcf_spk"></td><td>SPK</td></tr>
                            </table>
                        </td>
                        <td>
                            <table style='border:thin solid black;width:80%;'>
                                <tr><td colspan="2" style='background:#eeee;color:orange'>NFS</td></tr>
                                <tr><td><input type="checkbox" name="nfs_level2" id="nfs_level2"></td> <td>Level 2</td></tr>
                                <tr><td><input type="checkbox" name="nfs_level3" id="nfs_level3"></td> <td>Level 3</td></tr>
                                <tr><td><input type="checkbox" name="nfs_soap" id="nfs_soap"></td><td>Soap</td></tr>
                                <tr><td><input type="checkbox" name="nfs_spk" id="nfs_spk"></td><td>SPK</td></tr>
                            </table>
                        </td></tr>
                        <tr><td>
                                <table style='border:thin solid black;width:80%;'>
                                    <tr><td colspan="2" style='background:#eeee;color:orange'>W & D</td></tr>
                                    <tr><td><input type="checkbox" name="WD_level2" id="WD_level2"></td> <td>Level 2</td></tr>
                                    <tr><td><input type="checkbox" name="WD_level3" id="WD_level3"></td> <td>Level 3</td></tr>
                                    <tr><td><input type="checkbox" name="WD_soap" id="WD_soap"></td><td>Soap</td></tr>
                                    <tr><td><input type="checkbox" name="WD_spk" id="WD_spk"></td><td>SPK</td></tr>
                                </table>
                            </td>
                            <td>
                                <table style='border:thin solid black;width:80%;'>
                                    <tr><td colspan="2" style='background:#eeee;color:orange'>Washroom & Spry Dry</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_level2" id="WSD_level2"></td> <td>Level 2</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_level3" id="WSD_level3"></td> <td>Level 3</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_soap" id="WSD_soap"></td><td>Soap</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_spk" id="WSD_spk"></td><td>SPK</td></tr>
                                </table>
                        </td></tr>
                    </table>
                    
                    <input type="hidden" name="class" id="tipo" value="event-info">
                    <br>
                    <label for="body">Comments</label>
                    <textarea id="body" name="event" class="form-control" rows="3"></textarea>

                    <script type="text/javascript">
                  
                        $(function () {
                            $('#from').datetimepicker({
                                language: 'in',
                                minDate: new Date()
                            });
                            $('#to').datetimepicker({
                                language: 'in',
                                minDate: new Date()
                            });

                        });
                    </script>
                </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add</button>
                </div> -->
                <!-- </form> -->

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add New Event - Equipment Cleaning</h4>
                </div>

            <div class="modal-body">
                <!-- <form action="" method="post"> -->
                    <label for="from2" style="float:left;margin-right:1rem">Start</label>
                    <div class='input-group date' id='from2' style="margin-right:1rem">
                        <input type='text' id="from2" name="from2" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <!-- <label for="to" style="float:left;margin-top:-2rem;margin-right:1rem">End</label> -->
                    <div class='input-group date' id='to2' style="float:left;margin-top:-2rem;display:none">
                        <input type='text' name="to2" id="to2" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <br><br>
                    <table style='border:thin solid black;width:80%;margin-left:10%'>
                        <tr><td style='width:48%;text-align:center;'>

                            <table style='width:70%;'>                             
                                <tr><td><input type="checkbox" name="LP_1" id="LP_1"></td> <td>LP #1</td></tr>
                                <tr><td><input type="checkbox" name="LP_2" id="LP_2"></td> <td>LP #2</td></tr>
                                <tr><td><input type="checkbox" name="LP_3" id="LP_3"></td><td>LP #3</td></tr>
                                <tr><td><input type="checkbox" name="LP_4" id="LP_4"></td><td>LP #4</td></tr>
                                <tr><td><input type="checkbox" name="LP_5" id="LP_5"></td><td>LP #5</td></tr>
                                <tr><td><input type="checkbox" name="LP_6" id="LP_6"></td><td>LP #6</td></tr>
                            </table>
                        </td><td>
                            <table style='width:98%;'>                               
                                <tr><td><input type="checkbox" name="equipment_cleanning" id="equipment_cleanning"></td> <td>Equipment Cleanning</td></tr>
                                <tr><td><input type="checkbox" name="silverson" id="silverson"></td> <td>Silverson</td></tr>
                                <tr><td><input type="checkbox" name="ika" id="ika"></td><td>IKA</td></tr>
                                <tr><td><input type="checkbox" name="50_liter" id="50_liter"></td><td>50 Liter</td></tr>
                                <tr><td><input type="checkbox" name="scrubber" id="scrubber"></td><td>Scrubber</td></tr>
                                <tr><td><input type="checkbox" name="bosch_filling_station" id="bosch_filling_station"></td><td>Bosch Filling Station</td></tr>
                                <tr><td><input type="checkbox" name="sd_micro_1" id="sd_micro_1"></td><td>SD micro 1</td></tr>
                                <tr><td><input type="checkbox" name="sd_micro_2" id="sd_micro_2"></td><td>SD micro 2</td></tr>
                            </table>
                        
                        </td></tr>

                    </table>
                    
                    <input type="hidden" name="class2" id="tipo2" value="event-info">

                    <br>

                    <label for="body2">Comments</label>
                    <textarea id="body2" name="event2" class="form-control" rows="3"></textarea>

                    <script type="text/javascript">
                        $(function () {
                            $('#from2').datetimepicker({
                                language: 'in',
                                minDate: new Date()
                            });
                            $('#to2').datetimepicker({
                                language: 'in',
                                minDate: new Date()
                            });

                        });
                    </script>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  <button type="button" onclick="enviarw()" class="btn btn-success"><i class="fa fa-check"></i> Add</button>
                </div>

            </div>
        </div>
    </form>
</div>

    <script>

        function enviarw(){
            
            document.getElementById('nuevoevento').submit();
            /* document.getElementById('nuevoevento').reset(); */
            setTimeout(function(){ 
                window.parent.location.reload();
            }, 2000);
        }


    </script>


</body>
</html>
