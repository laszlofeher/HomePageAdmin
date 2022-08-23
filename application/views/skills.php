<button class="btn btn-primary" type="button">add</button>
<?php
    $count = 0;
    foreach ($skills as $key => $value) {
        if($count == 0 || $count % 4 == 0){
?> 
<div class="row">
    <?php
        }
    ?>
    <!-- .col -->
    <div class="col-md-3">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?php print($value['name']); ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <input type="text" class="knob" value="<?php print($value['percent']); ?>" data-width="90" data-height="90" data-fgColor="#3c8dbc">
                <div class="knob-label"><?php print($value['name']); ?></div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <?php
        $count++;
        if($count % 4 == 0){
    ?>
</div>
<!-- /.row -->
    <?php
        }
    ?>

<?php
    
    }
?>
</div>
<!-- /.row -->