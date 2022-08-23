<button class="btn btn-primary" type="button">add</button>
<br>
<?php
if(isset($activities)){
    $acount = count($activities);
    $rowCount = ceil($acount / 3);

for($row = 0; $row < $rowCount; $row++){
?>
<div class="row">
    <?php
        $end = $acount < ($row+1)*3 ? $acount : ($row+1)*3;
        for($box = $row*3; $box < $end; $box++){
    ?>
    
    <div class="col-md-4">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-warning">
                <!-- /.widget-user-image -->
                
                <div class="input-group input-group-sm mb-1" style="display:none;" id="activityTitleInputDiv_<?php print($activities[$box]['id']); ?>">
                  <input type="text" class="form-control" id="activityTitleInput_<?php print($activities[$box]['id']); ?>">
                  <span class="input-group-append">
                      <button type="button" class="btn btn-info btn-flat" data-activity-id="<?php print($activities[$box]['id']); ?>" id="activityTitleSaveButton_<?php print($activities[$box]['id']); ?>"><i class="fa fa-save"></i></button>
                  </span>
                </div>
                <h3 id="activityTitle_<?php print($activities[$box]['id']); ?>"><?php print($activities[$box]['title']); ?><button type="button" data-activity-id="<?php print($activities[$box]['id']); ?>" id="editActivityTitle_<?php print($activities[$box]['id']); ?>" class="btn btn-primary float-right"><i class="fa fa-pen"></i></button></h3>
                <div class="input-group input-group-sm mb-1" style="display:none;" id="activitySubTitleInputDiv_<?php print($activities[$box]['id']); ?>">
                  <input type="text" class="form-control" id="activitySubTitleInput_<?php print($activities[$box]['id']); ?>">
                  <span class="input-group-append">
                      <button type="button" class="btn btn-info btn-flat" data-activity-id="<?php print($activities[$box]['id']); ?>" id="activitySubTitleSaveButton_<?php print($activities[$box]['id']); ?>"><i class="fa fa-save"></i></button>
                  </span>
                </div>
                <h5 id="activitySubTitle_<?php print($activities[$box]['id']); ?>"><?php print($activities[$box]['subtitle']); ?><button type="button" data-activity-id="<?php print($activities[$box]['id']); ?>" id="editActivitySubTitle_<?php print($activities[$box]['id']); ?>" class="btn btn-primary  float-right"><i class="fa fa-pen"></i></button></h5>
            </div>
            <div class="card-footer p-0">
                <ul class="nav flex-column">
                    <?php
                    for($line = 0; $line < count($activities[$box]['names']); $line++){
                    ?>
                    <li class="nav-item" id="activityDetailNameListItem_<?php print($activities[$box]['names'][$line]['id']);  ?>">
                        <div class="input-group input-group-sm mb-1" style="display:none;" id="activityDetailNameDiv_<?php print($activities[$box]['names'][$line]['id']);  ?>">
                            <input type="text" class="form-control" id="activityDetailNameInput_<?php print($activities[$box]['names'][$line]['id']);  ?>">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-info btn-flat" data-activitydetail-id="<?php print($activities[$box]['names'][$line]['id']);  ?>" id="activityDetialNameSaveButton_<?php print($activities[$box]['names'][$line]['id']);  ?>"><i class="fa fa-save"></i></button>
                            </span>
                        </div>
                        <p class="nav-link" id="activityDetailName_<?php print($activities[$box]['names'][$line]['id']);  ?>">
                            <?php print($activities[$box]['names'][$line]['name']);  ?><button type="button" data-activitydetail-id="<?php print($activities[$box]['names'][$line]['id']);  ?>" id="editActivityDetailName_<?php print($activities[$box]['names'][$line]['id']);  ?>" class="btn btn-warning float-right"><i class="fa fa-pen"></i></button><button type="button" data-activitydetail-id="<?php print($activities[$box]['names'][$line]['id']);  ?>" id="deleteActivityDetailName_<?php print($activities[$box]['names'][$line]['id']);  ?>" class="btn btn-warning float-right"><i class="fa fa-minus"></i></button>
                        </p>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <button class="btn btn-primary" type="button" id="addActivityButton_<?php print($activities[$box]['id']); ?>" data-activity-id="<?php print($activities[$box]['id']); ?>">add activity</button>
        </div>
        <!-- /.widget-user -->
    </div>
    <!-- /.col -->
    <?php
        }
    ?>
    
</div>
<!-- /.row -->
<?php
}
}
?>
