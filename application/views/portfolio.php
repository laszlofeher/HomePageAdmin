<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Portfolio</h3>
    </div>

    <div class="card-body p-0">
        <button type="button" class="btn btn-primary" id="newPortfolioItemButton">New Portfolio</button>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Pictures
                    </th>
                    <th style="width: 59%">
                        Title and description
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($portfolio as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Picture" class="table-avatar" src="<?php print('../assets/theme/images/portfolio/' . $value['picture']); ?>">
                                </li>
                                <?php
                                $pictures = explode(';', $value['pictures']);
                                foreach ($pictures as $key => $picture) {
                                    if(strlen($picture) > 0){
                                ?>
                                    <li class="list-inline-item">
                                        <img alt="Picture" class="table-avatar" src="<?php print('../assets/theme/images/portfolio/' . $picture); ?>">
                                    </li>
                                <?php
                                    }
                                }
                                ?>

                            </ul>
                        </td>
                        <td>
                            <a>
                                <?php
                                print($value['title']);
                                ?>
                            </a>
                            <br/>
                            <small>
                                <?php
                                print($value['description']);
                                ?>
                            </small>
                        </td>
                        <td class="project-actions text-right">
                            <button class="btn btn-primary btn-sm" id="portfolioItemView_<?php print($value['id']) ; ?>" data-id = "<?php print($value['id']) ;?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </button>
                            <button class="btn btn-info btn-sm" id="portfolioItemEdit_<?php print($value['id']) ; ?>" data-id = "<?php print($value['id']) ;?>">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm" id="portfolioItemDelete_<?php print($value['id']) ; ?>" data-id = "<?php print($value['id']) ;?>">
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
<div class="modal" tabindex="-1" role="dialog" id="viewPortfolioItem">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview portfolio details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <iframe id="viewPortfolioItemFrame" src="" width="100%" height="500px" frameborder="0" allow="fullscreen" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end of view item modal window -->
<!-- new item modal window -->
<div class="modal fade" id="newPortfolioItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <label for="itemTitle">Title of Portfolio item:</label>
                        <input type="text" class="form-control" id="itemTitle" placeholder="Item title">
                    </div>
                    <div class="form-group">
                        <textarea class="textarea" placeholder="Item description" id="itemDescription"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="itemBoxTitle">Title of Portfolio box:</label>
                        <input type="text" class="form-control" id="itemBoxTitle" placeholder="Item portfolio box title">
                    </div>
                    <div class="form-group">
                        <label for="itemBoxDescription">Description of Portfolio box:</label>
                        <input type="text" class="form-control" id="itemBoxDescription" placeholder="Item portfolio box description">
                    </div>
                    <div class="form-group">
                        <label for="itemWebSiteLink">Website link:</label>
                        <input type="text" class="form-control" id="itemWebSiteLink" placeholder="Item website">
                    </div>
                    <div id="actions" class="row">
                        <div class="col-lg-6">
                            <div class="btn-group w-100">
                                <span class="btn btn-success col fileinput-button">
                                    <i class="fas fa-plus"></i>
                                    <span>Add files</span>
                                </span>
                                <button type="submit" class="btn btn-primary col start">
                                    <i class="fas fa-upload"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning col cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Cancel upload</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="fileupload-process w-100">
                                <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table table-striped files" id="previews">
                        <div id="template" class="row mt-2">
                            <div class="col-auto">
                                <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                            </div>
                            <div class="col d-flex align-items-center">
                                <p class="mb-0">
                                    <span class="lead" data-dz-name></span>
                                    (<span data-dz-size></span>)
                                </p>
                                <strong class="error text-danger" data-dz-errormessage></strong>
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-primary start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-danger delete">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Item</button>
            </div>
        </div>
    </div>
</div>
<!-- end of new item modal window -->
<!-- edit item modal window -->
<div class="modal fade" id="editPortfolioItem" tabindex="-1" aria-labelledby="editPortfolioItemLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPortfolioItemLabel">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editItemTitle">Title of Portfolio item:</label>
                        <input type="text" class="form-control" id="editItemTitle" placeholder="Item title" value="">
                    </div>
                    <div class="form-group">
                        <textarea class="textarea" placeholder="Item description" id="editItemDescription"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="editItemBoxTitle">Title of Portfolio box:</label>
                        <input type="text" class="form-control" id="editItemBoxTitle" placeholder="Item portfolio box title" value="">
                    </div>
                    <div class="form-group">
                        <label for="editItemBoxDescription">Description of Portfolio box:</label>
                        <input type="text" class="form-control" id="editItemBoxDescription" placeholder="Item portfolio box description" value="">
                    </div>
                    <div class="form-group">
                        <label for="editItemWebSiteLink">Website link:</label>
                        <input type="text" class="form-control" id="editItemWebSiteLink" placeholder="Item website" value="">
                    </div>
                    <div id="actions" class="row">
                        <div class="col-lg-6">
                            <div class="btn-group w-100">
                                <span class="btn btn-success col fileinput-button">
                                    <i class="fas fa-plus"></i>
                                    <span>Add files</span>
                                </span>
                                <button type="submit" class="btn btn-primary col start">
                                    <i class="fas fa-upload"></i>
                                    <span>Start upload</span>
                                </button>
                                <button type="reset" class="btn btn-warning col cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span>Cancel upload</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="fileupload-process w-100">
                                <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table table-striped files" id="previews">
                        <div id="template" class="row mt-2">
                            <div class="col-auto">
                                <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                            </div>
                            <div class="col d-flex align-items-center">
                                <p class="mb-0">
                                    <span class="lead" data-dz-name></span>
                                    (<span data-dz-size></span>)
                                </p>
                                <strong class="error text-danger" data-dz-errormessage></strong>
                            </div>
                            <div class="col-4 d-flex align-items-center">
                                <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-primary start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-warning cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Cancel</span>
                                    </button>
                                    <button data-dz-remove class="btn btn-danger delete">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Item</button>
            </div>
        </div>
    </div>
</div>
<!-- end of edit item modal window -->
<!-- delete item modal window -->
<div class="modal" tabindex="-1" role="dialog" id="deletePortfolioItemModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete item from portfolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="deletePortfolioItemId" value="" />
          <p>Delete this portfolio item:<b id="deletePortfolioItemTitle"></b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- end of delete item modal window -->