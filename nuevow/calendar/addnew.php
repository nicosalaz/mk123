<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Event</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <label for="from" style="float:left;margin-right:1rem">Start..</label>
                    <div class='input-group date' id='from' style="margin-right:1rem">
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <!-- <label for="to" style="float:left;margin-top:-2rem;margin-right:1rem">End</label> -->
                    <div class='input-group date' id='to' style="float:left;margin-top:-2rem;display:none">
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br><br>

                    <!-- <label for="tipo">Event type</label> -->

                    <table style='width:90%;'>
                        <tr><td style='width:48%;text-align:center'>

                            <table style='border:thin solid black;width:70%;'>
                                <tr><td colspan="2" style='text-align:center;background:#eeee;color:orange'>PCF</td></tr>
                                <tr><td><input type="checkbox" name="pcf_level2" id="pcf_level2"></td> <td>Level 2</td></tr>
                                <tr><td><input type="checkbox" name="pcf_level3" id="pcf_level3"></td> <td>Level 3</td></tr>
                                <tr><td><input type="checkbox" name="pcf_soap" id="pcf_soap"></td><td>Soap</td></tr>
                                <tr><td><input type="checkbox" name="pcf_spk" id="pcf_spk"></td><td>SPK</td></tr>
                            </table>
                        </td>
                        <td>
                            <table style='border:thin solid black;width:70%;'>
                                <tr><td colspan="2" style='text-align:center;background:#eeee;color:orange'>NFS</td></tr>
                                <tr><td><input type="checkbox" name="nfs_level2" id="nfs_level2"></td> <td>Level 2</td></tr>
                                <tr><td><input type="checkbox" name="nfs_level3" id="nfs_level3"></td> <td>Level 3</td></tr>
                                <tr><td><input type="checkbox" name="nfs_soap" id="nfs_soap"></td><td>Soap</td></tr>
                                <tr><td><input type="checkbox" name="nfs_spk" id="nfs_spk"></td><td>SPK</td></tr>
                            </table>
                        </td></tr>
                        <tr><td>
                                <table style='border:thin solid black;width:70%;'>
                                    <tr><td colspan="2" style='text-align:center;background:#eeee;color:orange'>W & D</td></tr>
                                    <tr><td><input type="checkbox" name="WD_level2" id="WD_level2"></td> <td>Level 2</td></tr>
                                    <tr><td><input type="checkbox" name="WD_level3" id="WD_level3"></td> <td>Level 3</td></tr>
                                    <tr><td><input type="checkbox" name="WD_soap" id="WD_soap"></td><td>Soap</td></tr>
                                    <tr><td><input type="checkbox" name="WD_spk" id="WD_spk"></td><td>SPK</td></tr>
                                </table>
                            </td>
                            <td>
                                <table style='border:thin solid black;width:70%;'>
                                    <tr><td colspan="2" style='text-align:center;background:#eeee;color:orange'>Washroom & Spry Dry</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_level2" id="WSD_level2"></td> <td>Level 2</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_level3" id="WSD_level3"></td> <td>Level 3</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_soap" id="WSD_soap"></td><td>Soap</td></tr>
                                    <tr><td><input type="checkbox" name="WSD_spk" id="WSD_spk"></td><td>SPK</td></tr>
                                </table>
                        </td></tr>

                    </table>
                    
                    <input type="hidden" name="class" id="tipo" value="event-info">

                    <!-- <select class="form-control" name="class" id="tipo">
                        <option value="event-info">Informacion</option>
                        <option value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option value="event-warning">Advertencia</option>
                        <option value="event-special">Especial</option>
                    </select> -->
                    <br>
                   <!--  <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">
                    <br> -->


                    <label for="body">Comments</label>
                    <textarea id="body" name="event" class="form-control" rows="3">.</textarea>

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
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add</button>
              </form>
          </div>
      </div>
  </div>
</div>