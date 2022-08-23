<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center" id="fileUploaderHolder4AboutPicture">
                        <img class="profile-user-img img-fluid img-circle" id="aboutPicture"
                             src="../home/assets/img/<?php isset($aboutme['picture']) ? print($aboutme['picture']) : print('') ; ?>"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?php isset($aboutme['firstname']) ? print($aboutme['firstname'].' '.$aboutme['lastname']) : print(''); ?></h3>

                    <p class="text-muted text-center"><?php isset($aboutme['profession']) ? print($aboutme['profession']) : print(''); ?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Phone</b> <a class="float-right"><?php print($aboutme['phone']); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right"><?php print($aboutme['email']); ?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timelinework" data-toggle="tab">Timeline work</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timelineedu" data-toggle="tab">Timeline education</a></li>
                        <li class="nav-item"><a class="nav-link" href="#generate" data-toggle="tab">Generate cv</a></li>
                    </ul>
                </div><!-- /.card-header -->
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="iTitle" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iTitle" name="" value="<?php print($aboutme['title']); ?>" placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iFirstname" class="col-sm-2 col-form-label">First name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iFirstname" name="" value="<?php print($aboutme['firstname']); ?>" placeholder="First name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iLastname" class="col-sm-2 col-form-label">Last name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iLastname" name="" value="<?php print($aboutme['lastname']); ?>" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iWork" class="col-sm-2 col-form-label">Work</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iWork" name="" value="<?php print($aboutme['work']); ?>" placeholder="Profession">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iBirthday" class="col-sm-2 col-form-label">Birthday</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iBirthday" name="" value="<?php print($aboutme['birthday']); ?>"  placeholder="Birthday">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iPhone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iPhone" name="" value="<?php print($aboutme['phone']); ?>"  placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="iEmail" name="" value="<?php print($aboutme['email']); ?>" placeholder="Email">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iWebsite" name="" value="<?php print($aboutme['website']); ?>" placeholder="Website">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iCity" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iCity" name="" value="<?php print($aboutme['city']); ?>" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="iAddress" name="" value="<?php print($aboutme['address']); ?>" placeholder="Address">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="iAbouttext" class="col-sm-2 col-form-label">About text</label>
                                    <div class="col-sm-10">
                                        <textarea id="iAbouttext" name="iAbouttext" rows="5" cols="100"><?php print($aboutme['abouttext']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iLeadtext" class="col-sm-2 col-form-label">Lead text</label>
                                    <div class="col-sm-10">
                                        <textarea id="iLeadtext" name="iLeadtext" rows="5" cols="100"><?php print($aboutme['leadtext']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iContent" class="col-sm-2 col-form-label">Content</label>
                                    <div class="col-sm-10">
                                        <textarea id="iContent" name="iContent" rows="5" cols="100"><?php print($aboutme['content']); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="button" class="btn btn-danger" id="saveProfileButton">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->    
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timelinework">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                
                                <?php  
                                foreach ($cvwork as $key => $value) {
                                ?>
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-danger">
                                        <?php  print($value['from'].'-'.$value['to']); ?>
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-briefcase bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-smile-beam"></i><?php print($value['position']); ?></span>
                                        <h3 class="timeline-header"><a href="#"><?php print($value['sector'].'/'.$value['assignament']); ?></a> <?php print($value['employer']); ?></h3>

                                        <div class="timeline-body">
                                            <?php print($value['memo']); ?>
                                        </div>
                                        <div class="timeline-footer">
                                            <button class="btn btn-primary btn-sm" data-work-id="<?php print($value['id']); ?>" id="workEditItemButton_<?php print($value['id']); ?>">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-work-id="<?php print($value['id']); ?>" data-work-name="<?php print($value['employer']); ?>" id="workDeleteItemButton_<?php print($value['id']); ?>">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <?php
                                }
                                ?>
                            </div>
                            <button type="button" id="workNewItemButton" class="btn btn-primary btn-block">New Item</button>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timelineedu">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <?php  
                                foreach ($cvedu as $key => $value) {
                                ?>
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-danger">
                                        <?php  print($value['from'].'-'.$value['to']); ?>
                                    </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-user-graduate bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#"><?php  print($value['school']); ?></a> <?php  print($value['faculty']); ?></h3>

                                        <div class="timeline-body">
                                            <?php print($value['memo']); ?>
                                        </div>
                                        <div class="timeline-footer">
                                            <button class="btn btn-primary btn-sm" data-edu-id="<?php print($value['id']); ?>" id="eduEditItemButton_<?php print($value['id']); ?>">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-edu-id="<?php print($value['id']); ?>" data-edu-name="<?php print($value['school']); ?>" id="eduDeleteItemButton_<?php print($value['id']); ?>">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <?php
                                }
                                ?>
                            </div>
                            <button type="button" id="eduNewItemButton" class="btn btn-primary btn-block">New Item</button>
                        </div>
                        <!-- /.tab-pane -->
                        <!-- .tab-pane -->
                        <div class="tab-pane" id="generate">
                            <a href="index.php/profile/generatecv1" id="generate_cv_1" class="btn btn-primary btn-block">Generate cv 1 to excel</a>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
