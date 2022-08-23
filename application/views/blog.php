
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Blog items</h3>
    </div>
    <div class="card-body p-0">
        <button type="button" class="btn btn-primary" id="newBlogEntryItemButton">New Blog Entry</button>
        <button type="button" class="btn btn-primary" id="newBlogEntryFromWordItemButton">New Blog Entry From Word</button>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Pictures
                    </th>
                    <th style="width: 45%">
                        Title and description
                    </th>
                    <th style="width: 14%">
                        Public day
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($blogentries as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Picture" class="table-avatar" src="<?php print('../assets/theme/images/portfolio/' . $value['picturepath']); ?>">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a>
                                <?php
                                print(strlen($value['title']) > 0 ? $value['title'] : 'No Title');
                                ?>
                            </a>
                            <br/>
                            <small>
                                <?php
                                print($value['blogsmallcontent']);
                                ?>
                            </small>
                        </td>
                        <td>
                            <?php
                            print($value['publicday']);
                            ?>
                        </td>
                        <td class="project-actions text-right">
                            <button class="btn btn-primary btn-sm" id="blogItemView_<?php print($value['id']) ; ?>" data-id="<?php print($value['id']) ; ?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </button>
                            <button class="btn btn-info btn-sm" id="blogItemEdit_<?php print($value['id']) ; ?>" data-id="<?php print($value['id']) ; ?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" id="blogItemDelete_<?php print($value['id']) ; ?>" data-id="<?php print($value['id']) ; ?>">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- view item modal window -->
<div class="modal" tabindex="-1" role="dialog" id="viewBlogItem">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview blog items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <iframe id="viewBlogItemFrame" src="" width="100%" height="500px" frameborder="0" allow="fullscreen" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end of view item modal window -->
<!-- new item modal window -->
<div class="modal fade" id="newBlogItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="blogTitle">Title of Blog entry:</label>
                        <input type="text" class="form-control" id="blogTitle" placeholder="Item title">
                    </div>
                    <div class="form-group">
                        <label for="autoLeadText">Automatic lead text</label>
                        <input type="checkbox" name="autoLeadTextSwitch" id="autoLeadTextSwitch" checked >
                    </div>
                    <div class="form-group" id="leadTextForm" style="display: none;">
                        <label for="blogSmallContent">Small content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="blogSmallContent"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group" id="autoLeadTextForm">
                        <label for="autoLeadTextLength">Size of Small content of Blog entry:</label>
                        <select id="autoLeadTextLength">
                            <option value="100">100 char</option>
                            <option value="200">200 char</option>
                            <option value="300">300 char</option>
                            <option value="400">400 char</option>
                            <option value="500">500 char</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="blogContent">Content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="blogContent" rows="35"
                                  style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="blogFaceContent">Facebook content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="blogFaceContent"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Publicday:</label>
                        <div class="input-group date" id="publicday" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#publicday" id="publicdayInput"/>
                            <div class="input-group-append" data-target="#publicday" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="draftSwitch">Draft</label>
                        <input type="checkbox" name="draft" id="draftSwitch" checked >
                    </div>
                    <div class="form-group">
                        <label for="blogCategory">Category</label>
                        <input type="text" class="form-control" id="blogCategory">
                    </div>
                    <div class="form-group">
                        <label for="blogTags">Tags</label>
                        <input type="text" class="form-control" id="blogTags" width="200">
                    </div>
                    <div class="form-group">
                        <div class="input-images"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveBlogItem">Save Item</button>
            </div>
        </div>
    </div>
</div>
<!-- end of new item modal window -->
<!-- new item with word modal window -->
<div class="modal fade" id="newBlogItemFromFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="blogTitle">Title of Blog entry:</label>
                        <input type="text" class="form-control" id="blogTitle" placeholder="Item title">
                    </div>
                    <div class="form-group">
                        <label for="autoLeadTextSwitch">Automatic lead text</label>
                        <input type="checkbox" name="autoLeadTextSwitch" id="autoLeadTextSwitch" checked >
                    </div>
                    <div class="form-group" id="leadTextForm" style="display: none;">
                        <label for="blogSmallContent">Small content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="blogSmallContent"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group" id="autoLeadTextForm">
                        <label for="autoLeadTextLength">Size of Small content of Blog entry:</label>
                        <select id="autoLeadTextLength">
                            <option value="100">100 char</option>
                            <option value="200">200 char</option>
                            <option value="300">300 char</option>
                            <option value="400">400 char</option>
                            <option value="500">500 char</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="blogContent">Content of Blog entry:</label>
                        <input type="file" id="inputFile" name="inputFile" />
                    </div>
                    <div class="form-group">
                        <label for="blogFaceContent">Facebook content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="blogFaceContent"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Publicday:</label>
                        <div class="input-group date" id="publicday" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#publicday" id="publicdayInput"/>
                            <div class="input-group-append" data-target="#publicday" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="draftSwitch">Draft</label>
                        <input type="checkbox" name="draft" id="draftSwitch" checked >
                    </div>
                    <div class="form-group">
                        <label for="blogCategory">Category</label>
                        <input type="text" class="form-control" id="blogCategory">
                    </div>
                    <div class="form-group">
                        <label for="blogTags">Tags</label>
                        <input type="text" class="form-control" id="blogTags" width="200">
                    </div>
                    <div class="form-group">
                        <div class="input-images"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveBlogItem">Save Item</button>
            </div>
        </div>
    </div>
</div>
<!-- end of new item with word modal window -->
<!-- edit item modal window -->
<div class="modal fade" id="editBlogItem" tabindex="-1" aria-labelledby="editPortfolioItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="eblogId">
                    <div class="form-group">
                        <label for="eblogTitle">Title of Blog entry:</label>
                        <input type="text" class="form-control" id="eblogTitle" placeholder="Item title">
                    </div>
                    <div class="form-group">
                        <label for="eautoLeadTextSwitch">Automatic lead text</label>
                        <input type="checkbox" name="eautoLeadTextSwitch" id="eautoLeadTextSwitch" checked >
                    </div>
                    <div class="form-group" id="leadTextForm" style="display: none;">
                        <label for="eblogSmallContent">Small content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="eblogSmallContent"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group" id="autoLeadTextForm">
                        <label for="eautoLeadTextLength">Size of Small content of Blog entry:</label>
                        <select id="eautoLeadTextLength">
                            <option value="100">100 char</option>
                            <option value="200">200 char</option>
                            <option value="300">300 char</option>
                            <option value="400">400 char</option>
                            <option value="500">500 char</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="eblogContent">Content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="eblogContent" rows="35"
                                  style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="eblogFaceContent">Facebook content of Blog entry:</label>
                        <textarea class="textarea" placeholder="Item description" id="eblogFaceContent"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Publicday:</label>
                        <div class="input-group date" id="epublicday" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#epublicday" id="epublicdayInput"/>
                            <div class="input-group-append" data-target="#epublicday" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edraftSwitch">Draft</label>
                        <input type="checkbox" name="draft" id="edraftSwitch" checked >
                    </div>
                    <div class="form-group">
                        <label for="eblogCategory">Category</label>
                        <input type="text" class="form-control" id="eblogCategory">
                    </div>
                    <div class="form-group">
                        <label for="eblogTags">Tags</label>
                        <input type="text" class="form-control" id="eblogTags">
                    </div>
                    <div class="form-group">
                        <div class="input-images"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="esaveBlogItem">Save Item</button>
            </div>
        </div>
    </div>
</div>
<!-- end of edit item modal window -->
<!-- delete item modal window -->
<div class="modal" tabindex="-1" role="dialog" id="deleteBlogItemModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete item from blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="deleteBlogItemId" value="" />
          <p>Delete this blog item: <b id="deleteBlogItemTitle"></b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" data-id="-1" id="deleteBlogEntryYesButton">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- end of delete item modal window -->
