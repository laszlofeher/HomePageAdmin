<button class="btn btn-primary" type="button">add</button>
<br>
<?php
if(isset($testimonals)){
    $acount = count($testimonals);
    $rowCount = ceil($acount / 3);

for($row = 0; $row < $rowCount; $row++){
?>
<div class="row">
<?php
    $end = $acount < ($row+1)*3 ? $acount : ($row+1)*3;
    for($box = $row*3; $box < $end; $box++){
?>
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info">
                <div class="input-group input-group-sm mb-1" style="display:none;" id="testimonalsNameInputDiv_<?php print($testimonals[$box]['id']); ?>">
                  <input type="text" class="form-control" id="testimonalsNameInput_<?php print($testimonals[$box]['id']); ?>">
                  <span class="input-group-append">
                      <button type="button" class="btn btn-info btn-flat" data-testimonals-id="<?php print($testimonals[$box]['id']); ?>" id="testimonalsNameSaveButton_<?php print($testimonals[$box]['id']); ?>"><i class="fa fa-save"></i></button>
                  </span>
                </div>
                <h3 id="testimonalsName_<?php print($testimonals[$box]['id']); ?>"><?php print($testimonals[$box]['name']);  ?><button type="button" data-testimonals-id="<?php print($testimonals[$box]['id']); ?>" id="editTestimonalsName_<?php print($testimonals[$box]['id']); ?>" class="btn btn-primary float-right"><i class="fa fa-pen"></i></button></h3>
                <div class="input-group input-group-sm mb-1" style="display:none;" id="testimonalsRoleInputDiv_<?php print($testimonals[$box]['id']); ?>">
                  <input type="text" class="form-control" id="testimonalsRoleInput_<?php print($testimonals[$box]['id']); ?>">
                  <span class="input-group-append">
                      <button type="button" class="btn btn-info btn-flat" data-testimonals-id="<?php print($testimonals[$box]['id']); ?>" id="testimonalsRoleSaveButton_<?php print($testimonals[$box]['id']); ?>"><i class="fa fa-save"></i></button>
                  </span>
                </div>
                <h5 id="testimonalsRole_<?php print($testimonals[$box]['id']); ?>"><?php print($testimonals[$box]['role']);  ?><button type="button" data-testimonals-id="<?php print($testimonals[$box]['id']); ?>" id="editTestimonalsRole_<?php print($testimonals[$box]['id']); ?>" class="btn btn-primary float-right"><i class="fa fa-pen"></i></button></h5>
            </div>
            <div class="widget-user-image" id="fileUploaderHolder_<?php print($testimonals[$box]['id']); ?>">
                <img data-testimonals-id="<?php print($testimonals[$box]['id']); ?>" id="testimonalsPicture_<?php print($testimonals[$box]['id']); ?>" class="img-circle elevation-2" src="<?php if(strlen($testimonals[$box]['picture']) > 0){ print('./assets/dist/img/testimonalspicture/'.$testimonals[$box]['picture']); } else {print('./assets/dist/img/noimage.png');}  ?>" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <textarea readonly class="form-control" id="comment_<?php print($testimonals[$box]['id']); ?>" name="comment_<?php print($testimonals[$box]['id']); ?>" rows="5" ><?php print($testimonals[$box]['comment']);  ?></textarea>
                </div>
                <button type="button" class="btn btn-info btn-flat" data-testimonals-id="<?php print($testimonals[$box]['id']); ?>" id="testimonalsCommentEditButton_<?php print($testimonals[$box]['id']); ?>"><i class="fa fa-pen"></i></button>
                <button style="display: none;" type="button" class="btn btn-info btn-flat" data-testimonals-id="<?php print($testimonals[$box]['id']); ?>" id="testimonalsCommentSaveButton_<?php print($testimonals[$box]['id']); ?>"><i class="fa fa-save"></i></button>
            </div>
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
