<?php
/**
 * REDCap External Module: REDCapCon2020
 * Click the button to look up the max of the value entered and all previously entered values.
 * @author Luke Stevens, Murdoch Children's Research Institute
 */
namespace MRINZ\dashboard;

use ExternalModules\AbstractExternalModule;
use \REDCap as REDCap;

class dashboard extends AbstractExternalModule
{

  public function redcap_every_page_top($project_id) {
    //The script below replaces the form icons on the dashboards to make it easier for colourblind users.
    if($this->getSystemSetting('global_yn') == '1' || in_array(USERID, $this->getSystemSetting('user'))){
    	if (PAGE == 'DataEntry/record_status_dashboard.php' || PAGE == 'DataEntry/record_home.php' || PAGE == 'DataEntry/index.php') {

      ?>
      <style media="screen">
        html { visibility:hidden; }
      </style>

      <script language="JavaScript" type="text/javascript">

      $(document).ready(function(){


          $('img').each(function() {
    				if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_gray.png') {
                $(this).replaceWith('<i class="far fa-circle"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_red.png') {
                $(this).replaceWith('<i class="fas fa-times-circle text-danger"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_yellow.png'){
              $(this).replaceWith('<i class="fas fa-question-circle text-warning"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_orange_tick.png'){
              $(this).replaceWith('<i class="far fa-times-circle text-warning"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_green.png'){
              $(this).replaceWith('<i class="fas fa-check-circle text-success"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_green_tick.png'){
              $(this).replaceWith('<i class="far fa-check-circle text-success"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_red_stack.png'){
              $(this).replaceWith('<i class="fas fa-layer-group fa-fw text-danger"></i><i class="fas fa-times fa-fw text-danger"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_yellow_stack.png'){
              $(this).replaceWith('<i class="fas fa-layer-group fa-fw text-warning"></i><i class="fas fa-question fa-fw text-warning"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_green_stack.png'){
              $(this).replaceWith('<i class="fas fa-layer-group fa-fw text-success"></i><i class="fas fa-check fa-fw text-success"></i>');
            } else if($(this).attr('src') == '<?php echo APP_PATH_WEBROOT; ?>Resources/images/circle_blue_stack.png'){
              $(this).replaceWith('<i class="fas fa-layer-group fa-fw"></i>');
            }
          });

          <?php if(PAGE == 'DataEntry/record_status_dashboard.php' || PAGE == 'DataEntry/record_home.php'){ ?>
            $('#status-icon-legend').find("tr:gt(1)").remove();
            $('#status-icon-legend').append('<tr><td class="nowrap" style="padding-right:5px;"><i class="fas fa-question-circle text-warning"></i> Unverified</td><td class="nowrap" style="padding-right:5px;"><i class="far fa-times-circle text-warning"></i> Partial Survey Response</td></tr>');
            $('#status-icon-legend').append('<tr><td class="nowrap" style="padding-right:5px;"><i class="fas fa-check-circle text-success"></i> Complete </td><td class="nowrap" style="padding-right:5px;"><i class="far fa-check-circle text-success"></i> Completed Survey Response</td></tr>')
            $('#status-icon-legend').append('<tr><td colspan=2 class="nowrap" style="padding-right:5px;"><i class="fas fa-layer-group fa-fw"></i> Many Statuses (Mixed)</td></tr>');
            $('#status-icon-legend').append('<tr><td colspan=2 class="nowrap" style="padding-right:5px;"><i class="fas fa-layer-group fa-fw text-success"></i><i class="fas fa-check fa-fw text-success"></i> Many Statuses (Complete)</td></tr>');
            $('#status-icon-legend').append('<tr><td colspan=2 class="nowrap" style="padding-right:5px;"><i class="fas fa-layer-group fa-fw text-warning"></i><i class="fas fa-question fa-fw text-warning"></i> Many Statuses (Unverified)</td></tr>');
            $('#status-icon-legend').append('<tr><td colspan=2 class="nowrap" style="padding-right:5px;"><i class="fas fa-layer-group fa-fw text-danger"></i><i class="fas fa-times fa-fw text-danger"></i> Many Statuses (Incomplete)</td></tr>');
          <?php } ?>


          document.getElementsByTagName("html")[0].style.visibility = "visible";
      });

    </script>


    <?php
    	}
    }
  }



}
