<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?php print(base_url()); ?>" >
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
        <!-- Amsify -->
        <link rel="stylesheet" href="assets/plugins/jquery.amsify.suggestags/css/amsify.suggestags.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <?php
            $this->load->view('navbar');
            ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php
            $this->load->view('menu');
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v1</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <?php
                    if (isset($page)) {
                        $this->load->view($page);
                    }
                    ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php
            $this->load->view('footer');
            ?>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="assets/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="assets/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="assets/plugins/moment/moment.min.js"></script>
        <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.js"></script>
        <!-- Bootstrap Switch -->
        <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- Amsify -->
        <script src="assets/plugins/jquery.amsify.suggestags/js/jquery.amsify.suggestags.js"></script>

        <script>
            $(function () {

                /* jQueryKnob */
                $('.knob').knob({
                    /*change : function (value) {
                     //console.log("change : " + value);
                     },
                     release : function (value) {
                     console.log("release : " + value);
                     },
                     cancel : function () {
                     console.log("cancel : " + this.value);
                     },*/
                    draw: function () {

                        // "tron" case
                        if (this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                                    ,
                                    sa = this.startAngle          // Previous start angle
                                    ,
                                    sat = this.startAngle         // Start angle
                                    ,
                                    ea                            // Previous end angle
                                    ,
                                    eat = sat + a                 // End angle
                                    ,
                                    r = true

                            this.g.lineWidth = this.lineWidth

                            this.o.cursor
                                    && (sat = eat - 0.3)
                                    && (eat = eat + 0.3)

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.value)
                                this.o.cursor
                                        && (sa = ea - 0.3)
                                        && (ea = ea + 0.3)
                                this.g.beginPath()
                                this.g.strokeStyle = this.previousColor
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                                this.g.stroke()
                            }

                            this.g.beginPath()
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                            this.g.stroke()

                            this.g.lineWidth = 2
                            this.g.beginPath()
                            this.g.strokeStyle = this.o.fgColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
                            this.g.stroke()

                            return false
                        }
                    }
                })
                $('.card').on('removed.lte.cardwidget', function () {
                    $('#modal-default').modal('show');
                })
                /* END JQUERY KNOB */

                if ($('#newPortfolioItemButton').length != 0 && $('#newPortfolioItem').length != 0) {
                    $('#newPortfolioItemButton').on('click', function () {

                        $('#newPortfolioItem').modal('show');
                    });

                    // DropzoneJS Demo Code Start
                    Dropzone.autoDiscover = false

                    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
                    var previewNode = document.querySelector("#template")
                    previewNode.id = ""
                    var previewTemplate = previewNode.parentNode.innerHTML
                    previewNode.parentNode.removeChild(previewNode)

                    var myDropzone = new Dropzone(document.body, {// Make the whole body a dropzone
                        url: "/target-url", // Set the url
                        thumbnailWidth: 80,
                        thumbnailHeight: 80,
                        parallelUploads: 20,
                        previewTemplate: previewTemplate,
                        autoQueue: false, // Make sure the files aren't queued until manually added
                        previewsContainer: "#previews", // Define the container to display the previews
                        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
                    })

                    myDropzone.on("addedfile", function (file) {
                        // Hookup the start button
                        file.previewElement.querySelector(".start").onclick = function () {
                            myDropzone.enqueueFile(file)
                        }
                    })

                    // Update the total progress bar
                    myDropzone.on("totaluploadprogress", function (progress) {
                        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
                    })

                    myDropzone.on("sending", function (file) {
                        // Show the total progress bar when upload starts
                        document.querySelector("#total-progress").style.opacity = "1"
                        // And disable the start button
                        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
                    })

                    // Hide the total progress bar when nothing's uploading anymore
                    myDropzone.on("queuecomplete", function (progress) {
                        document.querySelector("#total-progress").style.opacity = "0"
                    })

                    // Setup the buttons for all transfers
                    // The "add files" button doesn't need to be setup because the config
                    // `clickable` has already been specified.
                    document.querySelector("#actions .start").onclick = function () {
                        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
                    }
                    document.querySelector("#actions .cancel").onclick = function () {
                        myDropzone.removeAllFiles(true)
                    }
                    // DropzoneJS Demo Code End

                }
                //View portfolio item
                if ($("button[id^='portfolioItemView_']").length != 0) {
                    $("button[id^='portfolioItemView_']").on('click', function () {
                        $.post("index.php/Portfolio/getPortfolioItemPreviewUrl/" + $(this).data('id'))
                                .done(function (data) {
                                    $('#viewPortfolioItemFrame').attr('src', data);
                                });
                        $('#viewPortfolioItem').modal('show');
                    })
                }

                //Edit portfolio item
                if ($("button[id^='portfolioItemEdit_']").length != 0) {
                    $("button[id^='portfolioItemEdit_']").on('click', function () {
                        $.post("index.php/Portfolio/getPortfolioItemById/" + $(this).data('id'))
                                .done(function (data) {
                                    var resultObject = JSON.parse(data);
                                    $('#editItemTitle').val(resultObject.title);
                                    $('#editItemDescription').val(resultObject.description);
                                    $('#editItemBoxTitle').val(resultObject.curiosity);
                                    $('#editItemBoxDescription').val(resultObject.curiositydescription);
                                    $('#editItemWebSiteLink').val(resultObject.url);
                                });
                        $('#editPortfolioItem').modal('show');
                    })
                }
                //Delete portfolio item
                if ($("button[id^='portfolioItemDelete_']").length != 0) {
                    $("button[id^='portfolioItemDelete_']").on('click', function () {
                        $.post("index.php/Portfolio/getPortfolioItemById/" + $(this).data('id'))
                                .done(function (data) {
                                    var resultObject = JSON.parse(data);
                                    $('#deletePortfolioItemTitle').text(resultObject.title);
                                });
                        $('#deletePortfolioItemModal').modal('show');
                    })
                }

                //View blog Item
                if ($("button[id^='blogItemView_']").length != 0) {
                    $("button[id^='blogItemView_']").on('click', function () {
                        $.post("index.php/Blog/getBlogItemPreviewUrl/" + $(this).data('id'))
                                .done(function (data) {
                                    $('#viewBlogItemFrame').attr('src', data);
                                });
                        $('#viewBlogItem').modal('show');
                    })
                }
                //new blog item
                //newBlogEntryItemButton
                if ($("#newBlogEntryItemButton").length != 0) {
                    $("#newBlogEntryItemButton").on('click', function () {
                        $('#blogSmallContent').summernote();
                        $('#blogContent').summernote();
                        $('#blogFaceContent').summernote();
                        $('#publicday').datetimepicker({icons: {time: 'far fa-clock'}, format: 'YYYY-MM-DD HH:mm:ss'});
                        $('#blogCategory').amsifySuggestags({}, 'destroy');
                        $('#blogTags').amsifySuggestags({}, 'destroy');

                        
                        $('#blogCategory').amsifySuggestags({
                            type : 'bootstrap',
                            tagLimit: 1,
                            suggestionsAction : {
                                    minChars: 1,
                                    type : 'POST',
                                    url : './MyHomePageAdmin/index.php/Blog/getCategory'
                            }
                            
                        });   
                        
                        $('#blogTags').amsifySuggestags({
                            type : 'bootstrap',

                            suggestionsAction : {
                                    minChars: 1,
                                    type : 'POST',
                                    url : './MyHomePageAdmin/index.php/Blog/getTags'
                            }
                        });
                        /*
                         $('.input-images').imageUploader();
                         */

                        $("#autoLeadTextSwitch").bootstrapSwitch('state', $(this).prop('checked'));
                        $("#draftSwitch").bootstrapSwitch('state', $(this).prop('checked'));

                        $('#autoLeadTextSwitch').on('switchChange.bootstrapSwitch', function (e, data) {

                            //$('#myswitch').bootstrapSwitch('state', !data, true);
                            if (data)
                            {
                                $('#autoLeadTextForm').show();
                                $('#leadTextForm').hide();
                            } else
                            {
                                $('#leadTextForm').show();
                                $('#autoLeadTextForm').hide();
                            }

                        });

                        $('#newBlogItem').modal('show');
                    });
                }
                
                //newBlogEntryFromWordItemButton
                if ($("#newBlogEntryFromWordItemButton").length != 0) {
                    $("#newBlogEntryFromWordItemButton").on('click', function () {
                        $('#blogSmallContent').summernote();
                        $('#blogContent').summernote();
                        $('#blogFaceContent').summernote();
                        $('#publicday').datetimepicker({icons: {time: 'far fa-clock'}, format: 'YYYY-MM-DD HH:mm:ss'});
                        $('#blogCategory').amsifySuggestags({}, 'destroy');
                        $('#blogTags').amsifySuggestags({}, 'destroy');

                        
                        $('#blogCategory').amsifySuggestags({
                            type : 'bootstrap',
                            tagLimit: 1,
                            suggestionsAction : {
                                    minChars: 1,
                                    type : 'POST',
                                    url : './MyHomePageAdmin/index.php/Blog/getCategory'
                            }
                            
                        });   
                        
                        $('#blogTags').amsifySuggestags({
                            type : 'bootstrap',

                            suggestionsAction : {
                                    minChars: 1,
                                    type : 'POST',
                                    url : './MyHomePageAdmin/index.php/Blog/getTags'
                            }
                        });
                        /*
                         $('.input-images').imageUploader();
                         */

                        $("#autoLeadTextSwitch").bootstrapSwitch('state', $(this).prop('checked'));
                        $("#draftSwitch").bootstrapSwitch('state', $(this).prop('checked'));

                        $('#autoLeadTextSwitch').on('switchChange.bootstrapSwitch', function (e, data) {

                            //$('#myswitch').bootstrapSwitch('state', !data, true);
                            if (data)
                            {
                                $('#autoLeadTextForm').show();
                                $('#leadTextForm').hide();
                            } else
                            {
                                $('#leadTextForm').show();
                                $('#autoLeadTextForm').hide();
                            }
                        });
                        $('#newBlogItemFromFile').modal('show');
                    });
                }
                
                
                //Save Blog Item
                if ($('#saveBlogItem').length != 0) {
                    $('#saveBlogItem').on('click', function () {
                        console.log($('#blogTags').val());
                        alert($('#autoLeadTextSwitch').bootstrapSwitch('state'));
                        $.post("index.php/Blog/saveBlogItem",
                                {title: $('#blogTitle').val(),
                                leadSwitch: $('#autoLeadTextSwitch').bootstrapSwitch('state'),
                                autoLeadTextLength : $('#autoLeadTextLength').val(),
                                blogSmallContent: $('#blogSmallContent').val(),
                                blogContent: $('#blogContent').val(),
                                publicday: $('#publicdayInput').val(),
                                draft: $('#draftSwitch').bootstrapSwitch('state'),
                                tags: $('#blogTags').val(),
                                category : $('#blogCategory').val()
                                })
                                .done(function (data) {
                                    //alert("Data Loaded: " + data);
                                    $('#newBlogItem').modal('hide');
                                });
                    });
                }

                //Edit Blog Item
                if ($("button[id^='blogItemEdit_']").length != 0) {
                    $("button[id^='blogItemEdit_']").on('click', function () {
                        $.post("index.php/Blog/getBlogEntryById/", {id: $(this).data('id')})
                                .done(function (data) {
                                    var resultObject = JSON.parse(data);
                                    $('#eblogId').val(resultObject.id);
                                    $('#eblogTitle').val(resultObject.title);
                                    $('#eblogSmallContent').val(resultObject.blogsmallcontent);
                                    $('#eblogSmallContent').summernote();
                                    $('#eblogContent').val(resultObject.blogcontent);
                                    $('#eblogContent').summernote();
                                    $('#eblogFaceContent').summernote();
                                    $('#edraftSwitch').val(resultObject.draft);
                                    $('#epublicdayInput').val(resultObject.publicday);
                                    
                                    $('#epublicday').datetimepicker({icons: {time: 'far fa-clock'}, format: 'YYYY-MM-DD HH:mm:ss'});
                                    
                                    $("#eautoLeadTextSwitch").bootstrapSwitch('state', $(this).prop('checked'));
                                    $("#edraftSwitch").bootstrapSwitch('state', $(this).prop('checked'));

                                    $('#eautoLeadTextSwitch').on('switchChange.bootstrapSwitch', function (e, data) {

                                        //$('#myswitch').bootstrapSwitch('state', !data, true);
                                        if (data)
                                        {
                                            $('#eautoLeadTextForm').show();
                                            $('#eleadTextForm').hide();
                                        } else
                                        {
                                            $('#eleadTextForm').show();
                                            $('#eautoLeadTextForm').hide();
                                        }
                                    });
                                    $('#eblogCategory').val('');
                                    /*
                                    $('#eblogCategory').amsifySuggestags({
                                        type : 'bootstrap',
                                        tagLimit: 1,
                                        suggestions: resultObject.category,
                                        suggestionsAction : {
                                                minChars: 1,
                                                type : 'POST',
                                                url : './MyHomePageAdmin/index.php/Blog/getCategory'
                                        }

                                    });   */
                                    console.log('---- category-----');
                                    console.log(resultObject.category);
                                    amsifySuggestagsEBlogCategory = new AmsifySuggestags($('#eblogCategory'));
                                    amsifySuggestagsEBlogCategory._settings({
                                        type : 'bootstrap',
                                        tagLimit: 1,
                                        suggestions: resultObject.category,
                                        suggestionsAction : {
                                                minChars: 1,
                                                type : 'POST',
                                                url : './MyHomePageAdmin/index.php/Blog/getCategory'
                                        }});
                                    amsifySuggestagsEBlogCategory._init();
                                    amsifySuggestagsEBlogCategory.addTag(resultObject.categoryname);
                                    
                                    $('#eblogTags').val('');
                                    /*
                                    $('#eblogTags').amsifySuggestags({
                                        type : 'bootstrap',
                                        suggestions: resultObject.tags,
                                        suggestionsAction : {
                                                minChars: 1,
                                                type : 'POST',
                                                url : './MyHomePageAdmin/index.php/Blog/getTags'
                                        }
                                    });
                                    */
                                    amsifySuggestagsEBlogTags = new AmsifySuggestags($('#eblogTags'));
                                    amsifySuggestagsEBlogTags._settings({
                                        type : 'bootstrap',
                                        suggestions: resultObject.tags,
                                        suggestionsAction : {
                                                minChars: 1,
                                                type : 'POST',
                                                url : './MyHomePageAdmin/index.php/Blog/getTags'
                                        }
                                    });
                                    amsifySuggestagsEBlogTags._init();
                                    console.log('-----Tagnames------');
                                    console.log(resultObject.tagnames);
                                    console.log('-----Tags-------');
                                    console.log(resultObject.tags);
                                    
                                    for(var k in resultObject.tagnames) {
                                        amsifySuggestagsEBlogTags.addTag(resultObject.tagnames[k]);
                                        console.log(resultObject.tagnames[k]);
                                    }
                                });
                        $('#editBlogItem').modal('show');
                    })
                }

                if ($("#esaveBlogItem").length != 0) {
                    $("#esaveBlogItem").on('click', function () {
                        console.log($('#blogTags').val());
                        $.post("index.php/Blog/saveBlogItem",
                                {id : $('#eblogId').val(),
                                title: $('#eblogTitle').val(),
                                leadSwitch: $('#eautoLeadTextSwitch').bootstrapSwitch('state'),
                                autoLeadTextLength : $('#eautoLeadTextLength').val(),
                                blogSmallContent: $('#eblogSmallContent').val(),
                                blogContent: $('#eblogContent').val(),
                                publicday: $('#epublicdayInput').val(),
                                draft: $('#edraftSwitch').bootstrapSwitch('state'),
                                tags: $('#eblogTags').val(),
                                category : $('#eblogCategory').val()
                                
                                })
                                .done(function (data) {
                                    //alert("Data Loaded: " + data);
                                    $('#editBlogItem').modal('hide');
                                });
                    })
                }
                /*
                 * 
                 */

                //Delete Blog Item
                if ($("button[id^='blogItemDelete_']").length != 0) {
                    $("button[id^='blogItemDelete_']").on('click', function () {
                        var blogEntryId = $(this).data('id');
                        $.post("index.php/Blog/getBlogEntryById/", 
                                {id: blogEntryId
                                })
                                .done(function (data) {
                                    //console.log(data);
                                    var resultObject = JSON.parse(data);
                                    $('#deleteBlogItemTitle').text(resultObject.title);
                                    $('#deleteBlogEntryYesButton').data("id", blogEntryId);
                                });
                        $('#deleteBlogItemModal').modal('show');
                        //delete yes button
                        
                    })
                }
                console.log("delete gomb jön");
                if ($("#deleteBlogEntryYesButton").length != 0) {
                    console.log("delete blog item button ok");
                    $("#deleteBlogEntryYesButton").on('click', function () {
                        $.post("index.php/Blog/deleteBlogEntryById/", 
                                {id : $(this).data('id')})
                                .done(function (data) {
                                    console.log(data);
                                    var resultObject = JSON.parse(data);
                                });
                        $('#deleteBlogItemModal').modal('hide');
                    });
                }
                    
                
                
                // profile 
                //new work item
                if ($("#workNewItemButton").length != 0) {
                    $("#workNewItemButton").on('click', function () {
                        $('#workNewItem').modal('show');
                    });
                }

                //work datetime
                
                if ($("#workDateFrom").length != 0) {
                    $('#workDateFrom').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }

                if ($("#workDateTo").length != 0) {
                    $('#workDateTo').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }
                
                if ($("#eworkDateFrom").length != 0) {
                    $('#eworkDateFrom').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }

                if ($("#eworkDateTo").length != 0) {
                    $('#eworkDateTo').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }
                
                //work item save
                if ($("#workNewItemSaveButton").length != 0) {
                    $("#workNewItemSaveButton").on('click', function () {
                        $.post("index.php/Profile/saveWork",
                                {employer: $('#employer').val(),
                                position: $('#position').val(),
                                from: $('#workDateFrom').data('date'),
                                to: $('#workDateTo').data('date'),
                                memo: $('#wmemo').val()
                                })
                                .done(function (data) {
                                    alert("Data Loaded: " + data);
                                });
                        $('#workNewItem').modal('hide');
                    });
                }
                
                //work item edit
                if ($('[id^=workEditItemButton_]').length != 0) {
                    $('[id^=workEditItemButton_]').on('click', function () {
                        var id = $(this).data('work-id');
                        $.post("index.php/Profile/getWorkById",
                        {id: id
                        })
                        .done(function (data) {
                            var detailJSON = JSON.parse(data);
                            $('#wId').val(detailJSON.id);
                            $('#eEmployer').val(detailJSON.employer);
                            $('#ePosition').val(detailJSON.position);
                            $('#eworkDateFrom').data("datetimepicker").date(detailJSON.from);
                            $('#eworkDateTo').data("datetimepicker").date(detailJSON.to);
                            $('#eWMemo').val(detailJSON.memo);
                            //alert(data);
                            $('#workEditItem').modal('show');
                        });
                    });
                }
                
                // edu item edit save
                if ($('#workEditItemSaveButton').length != 0) {
                    $('#workEditItemSaveButton').on('click', function () {
                        $.post("index.php/Profile/saveWork",
                                {
                                id: $('#wId').val(),
                                employer: $('#eEmployer').val(),
                                position: $('#ePosition').val(),
                                from: $('#eworkDateFrom').data('date'),
                                to: $('#eworkDateTo').data('date'),
                                memo: $('#eWMemo').val()
                                })
                                .done(function (data) {
                                    alert("Data Loaded: " + data);
                                });
                        $('#workEditItem').modal('hide');
                    });
                }
                
                //work item delete
                if ($('[id^=workDeleteItemButton_]').length != 0) {
                    $('[id^=workDeleteItemButton_]').on('click', function () {
                        var id = $(this).data('work-id');
                        var itemName = $(this).data('work-name');
                        $('#workDeletedItemName').text(itemName);
                        $('#workDeleteItem').data('work-id', id);

                        $('#workDeleteItem').modal('show');
                    });
                }
                
                //work item delete yes
                if ($("#workDeleteItemYesButton").length != 0) {
                    $("#workDeleteItemYesButton").on('click', function () {
                        $.post("index.php/Profile/deleteWork",
                                {id: $('#workDeleteItem').data('work-id'),
                                })
                                .done(function (data) {
                                    alert("Data Loaded: " + data);
                                });
                        $('#workDeleteItem').modal('hide');
                    });
                }

                //new edu item
                if ($("#eduNewItemButton").length != 0) {
                    $("#eduNewItemButton").on('click', function () {
                        $('#eduNewItem').modal('show');
                    });
                }

                //edu datetime
                //Date picker
                if ($("#eduDateFrom").length != 0) {
                    $('#eduDateFrom').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }

                if ($("#eduDateTo").length != 0) {
                    $('#eduDateTo').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }
                
                if ($("#eeduDateFrom").length != 0) {
                    $('#eeduDateFrom').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }

                if ($("#eeduDateTo").length != 0) {
                    $('#eeduDateTo').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                }

                //edu item save
                if ($("#eduNewItemSaveButton").length != 0) {
                    $("#eduNewItemSaveButton").on('click', function () {
                        $.post("index.php/Profile/saveEducation",
                                {school: $('#school').val(),
                                faculty: $('#faculty').val(),
                                from: $('#eduDateFrom').data('date'),
                                to: $('#eduDateTo').data('date'),
                                memo: $('#memo').val(),
                                })
                                .done(function (data) {
                                    alert("Data Loaded: " + data);
                                });
                        $('#eduNewItem').modal('hide');
                    });
                }
                
                //edu item edit
                if ($('[id^=eduEditItemButton_]').length != 0) {
                    $('[id^=eduEditItemButton_]').on('click', function () {
                        var id = $(this).data('edu-id');
                        $.post("index.php/Profile/getEducationById",
                        {id: id
                        })
                        .done(function (data) {
                            var detailJSON = JSON.parse(data);
                            $('#eId').val(detailJSON.id);
                            $('#eSchool').val(detailJSON.school);
                            $('#eFaculty').val(detailJSON.faculty);
                            $('#eeduDateFrom').data("datetimepicker").date(detailJSON.from);
                            $('#eeduDateTo').data("datetimepicker").date(detailJSON.to);
                            $('#eMemo').val(detailJSON.memo);
                            //alert(data);
                            $('#eduEditItem').modal('show');
                        });
                    });
                }
                
                // edu item edit save
                if ($('#eduEditItemSaveButton').length != 0) {
                    $('#eduEditItemSaveButton').on('click', function () {
                        
                        $.post("index.php/Profile/saveEducation",
                        {id     : $('#eId').val(),
                         school : $('#eSchool').val(),
                         faculty: $('#eFaculty').val(),
                         from   : $('#eeduDateFrom').data("date"),
                         to     : $('#eeduDateTo').data("date"),
                         memo   : $('#eMemo').val()
                        })
                        .done(function (data) {
                            //var detailJSON = JSON.parse(data);
                            $('#eduEditItem').modal('hide');
                        });
                    });
                }
                
                //edu item delete
                if ($('[id^=eduDeleteItemButton_]').length != 0) {
                    $('[id^=eduDeleteItemButton_]').on('click', function () {
                        var id = $(this).data('edu-id');
                        var itemName = $(this).data('edu-name');
                        $('#eduDeletedItemName').text(itemName);
                        $('#eduDeleteItem').data('edu-id', id);

                        $('#eduDeleteItem').modal('show');
                    });
                }
                

                //edu item delete yes
                if ($("#eduDeleteItemYesButton").length != 0) {
                    $("#eduDeleteItemYesButton").on('click', function () {
                        $.post("index.php/Profile/deleteEducation",
                                {id: $('#eduDeleteItem').data('edu-id'),
                                })
                                .done(function (data) {
                                    alert("Data Loaded: " + data);
                                });
                        $('#eduDeleteItem').modal('hide');
                    });
                }
                
                
                
                // Profile
                // save profile
                if ($("#saveProfileButton").length != 0) {
                    $("#saveProfileButton").on('click', function () {
                        $.post("index.php/Profile/saveProfile",
                                {title: $('#iTitle').val(),
                                firstname: $('#iFirstname').val(),
                                lastname: $('#iLastname').val(),
                                work: $('#iWork').val(),
                                birthday: $('#iBirthday').val(),
                                phone: $('#iPhone').val(),
                                email: $('#iEmail').val(),
                                website: $('#iWebsite').val(),
                                phone: $('#iPhone').val(),
                                city: $('#iCity').val(),
                                address: $('#iAddress').val(),
                                abouttext: $('#iAbouttext').val(),
                                leadtext: $('#iLeadtext').val(),
                                content: $('#iContent').val(),
                                })
                                .done(function (data) {
                                    alert("Data Loaded: " + data);
                                });
                    });
                }
                //profile picture upload
                if ($('#aboutPicture').length != 0) {
                    $('#aboutPicture').on('click', function () {
                        var input = $('<input/>')
                                    .attr('type', "file")
                                    .attr('name', "file")
                                    .attr('id', "fileUploader4AboutPicture")
                                    .attr('style',"display:none;");
                        //append the created file input
                        $('#fileUploaderHolder4AboutPicture').append(input);
                        input.click();
                        input.change(function(){
                            console.log(input[0].files[0]);
                            var formData = new FormData(); 
                            formData.append("picture", input[0].files[0]);
                            $.ajax({
                                    url: "index.php/Profile/uploadPicture",
                                    type: "POST",
                                    data: formData,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    success: function(data) {
                                        var responseObject = JSON.parse(data);
                                        $('#aboutPicture').attr('src', './assets/dist/img/'+responseObject.picture);
                                    },
                                    error: function(e) {
                                            //$("#err").html(e).fadeIn();
                                    }
                            });
                        });
                    });
                }

                //activity section
                //activity item add button
                if ($('[id^=addActivityButton_]').length != 0) {
                    $('[id^=addActivityButton_]').on('click', function () {
                        var id = $(this).data('activity-id');
                        $.post("index.php/Activity/addDetailToActivity",
                        {activityid: id,
                         activitydetailname : 'new activity detail item'   
                        })
                        .done(function (data) {
                            
                        });
                    });
                }
                //activity edit title 
                if ($('[id^=editActivityTitle_]').length != 0) {
                    $('[id^=editActivityTitle_]').on('click', function () {
                        var id = $(this).data('activity-id');
                        console.log(id);
                        $('#activityTitle_'+id).hide();
                        $('#activityTitleInput_'+id).val($('#activityTitle_'+id).text());
                        $('#activityTitleInputDiv_'+id).show();
                    });
                }
                //activity save title 
                if ($('[id^=activityTitleSaveButton_]').length != 0) {
                    $('[id^=activityTitleSaveButton_]').on('click', function () {
                        var id = $(this).data('activity-id');
                        console.log(id);
                        $.post("index.php/Activity/saveAcivityTitle",
                        {activityid: id,
                         activityTitle : $('#activityTitleInput_'+id).val()  
                        })
                        .done(function (data) {
                            
                        });
                        
                        $('#activityTitleInputDiv_'+id).hide();
                        $('#activityTitle_'+id).html($('#activityTitleInput_'+id).val()+'<button type="button" data-activity-id="'+id+'" id="editActivityTitle_'+id+'" class="btn btn-primary float-right"><i class="fa fa-pen"></i></button>');
                        $('#editActivityTitle_'+id).on('click', function () {
                            var id = $(this).data('activity-id');
                            console.log(id);
                            $('#activityTitle_'+id).hide();
                            $('#activityTitleInput_'+id).val($('#activityTitle_'+id).text());
                            $('#activityTitleInputDiv_'+id).show();
                        });
                        $('#activityTitle_'+id).show();
                    });
                }
                //activity edit subtitle 
                if ($('[id^=editActivitySubTitle_]').length != 0) {
                    $('[id^=editActivitySubTitle_]').on('click', function () {
                        var id = $(this).data('activity-id');
                        console.log(id);
                        $('#activitySubTitle_'+id).hide();
                        $('#activitySubTitleInput_'+id).val($('#activitySubTitle_'+id).text());
                        $('#activitySubTitleInputDiv_'+id).show();
                    });
                }
                
                //activity save subtitle 
                if ($('[id^=activitySubTitleSaveButton_]').length != 0) {
                    $('[id^=activitySubTitleSaveButton_]').on('click', function () {
                        var id = $(this).data('activity-id');
                        console.log(id);
                        $.post("index.php/Activity/saveActivitySubTitle",
                        {activityid: id,
                         activitySubTitle : $('#activitySubTitleInput_'+id).val()  
                        })
                        .done(function (data) {
                            
                        });
                        
                        $('#activitySubTitleInputDiv_'+id).hide();
                        $('#activitySubTitle_'+id).html($('#activitySubTitleInput_'+id).val()+'<button type="button" data-activity-id="'+id+'" id="editActivitySubTitle_'+id+'" class="btn btn-primary float-right"><i class="fa fa-pen"></i></button>');
                        $('#editActivitySubTitle_'+id).on('click', function () {
                            var id = $(this).data('activity-id');
                            console.log(id);
                            $('#activitySubTitle_'+id).hide();
                            $('#activitySubTitleInput_'+id).val($('#activitySubTitle_'+id).text());
                            $('#activitySubTitleInputDiv_'+id).show();
                        });
                        $('#activitySubTitle_'+id).show();
                    });
                }
                // activity edit detailitem
                if ($('[id^=editActivityDetailName_]').length != 0) {
                    $('[id^=editActivityDetailName_]').on('click', function () {
                        var activityDetialid = $(this).data('activitydetail-id');
                        console.log(activityDetialid);
                        $('#activityDetailName_'+activityDetialid).hide();
                        $('#activityDetailNameInput_'+activityDetialid).val($('#activityDetailName_'+activityDetialid).text().trim());
                        $('#activityDetailNameDiv_'+activityDetialid).show();
                    });
                }
                
                //activite detial name save
                
                if ($('[id^=activityDetialNameSaveButton_]').length != 0) {
                    $('[id^=activityDetialNameSaveButton_]').on('click', function () {
                        var id = $(this).data('activitydetail-id');
                        console.log(id);
                        $.post("index.php/Activity/saveActivityDetailName",
                        {activityDetialId: id,
                         activityDetailName : $('#activityDetailNameInput_'+id).val()  
                        })
                        .done(function (data) {
                            
                        });
                        
                        $('#activityDetailNameDiv_'+id).hide();
                        $('#activityDetailName_'+id).html($('#activityDetailNameInput_'+id).val()+'<button type="button" data-activitydetail-id="'+id+'" id="editActivityDetailName_'+id+'" class="btn btn-warning float-right"><i class="fa fa-pen"></i></button><button type="button" id="deleteActivityDetailName_'+id+'" class="btn btn-warning float-right"><i class="fa fa-minus"></i></button>');
                        $('#editActivityDetailName_'+id).on('click', function () {
                            var activityDetialid = $(this).data('activitydetail-id');
                            console.log(activityDetialid);
                            $('#activityDetailName_'+activityDetialid).hide();
                            $('#activityDetailNameInput_'+activityDetialid).val($('#activityDetailName_'+activityDetialid).text().trim());
                            $('#activityDetailNameDiv_'+activityDetialid).show();
                        });
                        $('#deleteActivityDetailName_'+id).on('click', function () {
                            $('#activityDetailDeleteItem').modal('show');
                        })
                        $('#activityDetailName_'+id).show();
                    });
                    
                }    
                
                //activity delete detailItem
                if ($('[id^=deleteActivityDetailName_]').length != 0) {
                    $('[id^=deleteActivityDetailName_]').on('click', function () {
                        var id = $(this).data('activitydetail-id');
                        console.log(id);
                        
                        $('#activityDetailDeleteItem').data('activityDetailsItem-id',id);
                        $('#activityDetialDeleteItemYesButton').data('activityDetailsItem-id',id);
                        $.post("index.php/Activity/getActivityDetailById",
                        {id: id
                        })
                        .done(function (data) {
                            var detailJSON = JSON.parse(data);
                            $('#activityDetialDeletedItemName').text(detailJSON.name);
                            $('#activityDetailDeleteItem').modal('show');
                        });
                    })
                }
                
                if ($('#activityDetialDeleteItemYesButton').length != 0) {
                    $('#activityDetialDeleteItemYesButton').on('click', function () {
                        var id = $(this).data('activityDetailsItem-id');
                        
                        $.post("index.php/Activity/deleteActivityDetailName",
                        {activityDetialId: id
                        })
                        .done(function (data) {
                            $('#activityDetailNameListItem_'+id).remove();
                            $('#activityDetailDeleteItem').modal('hide');
                        });
                        
                    });
                }
                
                //Testimonals 
                //testimonals picture upload
                if ($('[id^=testimonalsPicture_]').length != 0) {
                    $('[id^=testimonalsPicture_]').on('click', function () {
                        var id = $(this).data('testimonals-id');
                        console.log(id);
                        var input = $('<input/>')
                                    .attr('type', "file")
                                    .attr('name', "file")
                                    .attr('id', "fileUploader"+id)
                                    .attr('style',"display:none;");
                        //append the created file input
                        $('#fileUploaderHolder_'+id).append(input);
                        input.click();
                        input.change(function(){
                            console.log(input[0].files[0]);
                            var formData = new FormData(); 
                            formData.append("picture", input[0].files[0]);
                            formData.append("id",id);
                            $.ajax({
                                    url: "index.php/Testimonals/uploadPicture",
                                    type: "POST",
                                    data: formData,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    success: function(data) {
                                        var responseObject = JSON.parse(data);
                                        $('#testimonalsPicture_'+id).attr('src', './assets/dist/img/testimonalspicture/'+responseObject.picture);
                                    },
                                    error: function(e) {
                                            //$("#err").html(e).fadeIn();
                                    }
                            });
                        });
                    });
                }
                //testimonals name edit
                if ($('[id^=editTestimonalsName_]').length != 0) {
                    $('[id^=editTestimonalsName_]').on('click', function () {
                        var id = $(this).data('testimonals-id');
                        $('#testimonalsName_'+id).hide();
                        $('#testimonalsNameInput_'+id).val($('#testimonalsName_'+id).text().trim());
                        $('#testimonalsNameInputDiv_'+id).show();
                    });
                }
                
                //testimonals name save
                if ($('[id^=testimonalsNameSaveButton_]').length != 0) {
                    $('[id^=testimonalsNameSaveButton_]').on('click', function () {
                        var id = $(this).data('testimonals-id');
                        console.log(id);
                        $.post("index.php/Testimonals/saveTestimonalsName",
                        {testimonalsId: id,
                         testimonalsName : $('#testimonalsNameInput_'+id).val()  
                        })
                        .done(function (data) {
                            
                        });
                         
                        $('#testimonalsNameInputDiv_'+id).hide();
                        $('#testimonalsName_'+id).html($('#testimonalsNameInput_'+id).val()+'<button type="button" data-testimonals-id="'+id+'" id="editTestimonalsName_'+id+'" class="btn btn-primary float-right"><i class="fa fa-pen"></i></button>');
                        $('#editTestimonalsName_'+id).on('click', function () {
                            var testimonalsNameid = $(this).data('testimonals-id');
                            console.log(testimonalsNameid);
                            $('#testimonalsName_'+testimonalsNameid).hide();
                            $('#testimonalsNameInput_'+testimonalsNameid).val($('#testimonalsName_'+testimonalsNameid).text().trim());
                            $('#testimonalsNameInputDiv_'+testimonalsNameid).show();
                        });
                        
                        $('#testimonalsName_'+id).show();
                    });
                    
                }
                
                //testimonals role edit
                if ($('[id^=editTestimonalsRole_]').length != 0) {
                    $('[id^=editTestimonalsRole_]').on('click', function () {
                        var id = $(this).data('testimonals-id');
                        $('#testimonalsRole_'+id).hide();
                        $('#testimonalsRoleInputDiv_'+id).show();
                    });
                }
                
                //testimonals role save
                if ($('[id^=testimonalsRoleSaveButton_]').length != 0) {
                    $('[id^=testimonalsRoleSaveButton_]').on('click', function () {
                        var id = $(this).data('testimonals-id');
                        console.log(id);
                        $.post("index.php/Testimonals/saveTestimonalsRole",
                        {testimonalsId: id,
                         testimonalsRole : $('#testimonalsRoleInput_'+id).val()  
                        })
                        .done(function (data) {
                            
                        });
                         
                        $('#testimonalsRoleInputDiv_'+id).hide();
                        $('#testimonalsRole_'+id).html($('#testimonalsRoleInput_'+id).val()+'<button type="button" data-testimonals-id="'+id+'" id="editTestimonalsRole_'+id+'" class="btn btn-primary float-right"><i class="fa fa-pen"></i></button>');
                        $('#editTestimonalsRole_'+id).on('click', function () {
                            var testimonalsNameid = $(this).data('testimonals-id');
                            console.log(testimonalsNameid);
                            $('#testimonalsRole_'+testimonalsNameid).hide();
                            $('#testimonalsRoleInput_'+testimonalsNameid).val($('#testimonalsRole_'+testimonalsNameid).text().trim());
                            $('#testimonalsRoleInputDiv_'+testimonalsNameid).show();
                        });
                        
                        $('#testimonalsRole_'+id).show();
                    });
                    
                }
                
                //testimonals comment edit enabled
                if ($('[id^=testimonalsCommentEditButton_]').length != 0) {
                    $('[id^=testimonalsCommentEditButton_]').on('click', function () {
                        var id = $(this).data('testimonals-id');
                        $('#comment_'+id).attr('readonly', false);
                        $(this).hide();
                        $('#testimonalsCommentSaveButton_'+id).show();
                        $('#comment_'+id).focus();
                    });
                }
                
                //testimonals comment save
                if ($('[id^=testimonalsCommentSaveButton_]').length != 0) {
                    $('[id^=testimonalsCommentSaveButton_]').on('click', function () {
                        var id = $(this).data('testimonals-id');
                        $('#comment_'+id).attr('readonly', true);
                        $.post("index.php/Testimonals/saveTestimonalsComment",
                        {testimonalsId: id,
                         testimonalsComment : $('#comment_'+id).val()  
                        })
                        .done(function (data) {
                            
                        });
                        
                        $(this).hide();
                        $('#testimonalsCommentEditButton_'+id).show();
                        
                    });
                }
                
            });
        </script>
        
        
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>One fine body&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal new education item-->
        <div class="modal fade" id="eduNewItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="school">School</label>
                                    <input type="text" class="form-control" id="school" name="school" placeholder="Enter name of employer">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="faculty">Faculty</label>
                                    <input type="text" class="form-control" id="faculty" name="faculty" placeholder="Enter position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date from:</label>
                                    <div class="input-group date" id="eduDateFrom" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#eduDateFrom"/>
                                        <div class="input-group-append" data-target="#eduDateFrom" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date to:</label>
                                    <div class="input-group date" id="eduDateTo" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#eduDateTo"/>
                                        <div class="input-group-append" data-target="#eduDateTo" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="memo">Memo</label>
                                    <textarea class="form-control" id="memo" name="memo" placeholder="Enter memo from position"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="eduNewItemSaveButton">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal edit education item-->
        <div class="modal fade" id="eduEditItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" id="eId" name="eId"  />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="eSchool">School</label>
                                    <input type="text" class="form-control" id="eSchool" name="school" placeholder="Enter name of employer">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="eFaculty">Faculty</label>
                                    <input type="text" class="form-control" id="eFaculty" name="faculty" placeholder="Enter position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date from:</label>
                                    <div class="input-group date" id="eeduDateFrom" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#eeduDateFrom"/>
                                        <div class="input-group-append" data-target="#eeduDateFrom" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date to:</label>
                                    <div class="input-group date" id="eeduDateTo" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#eeduDateTo"/>
                                        <div class="input-group-append" data-target="#eeduDateTo" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="eMemo">Memo</label>
                                    <textarea class="form-control" id="eMemo" name="eMemo" placeholder="Enter memo from position"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="eduEditItemSaveButton">Save</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- modal delete eudcation item -->
        <div class="modal fade" id="eduDeleteItem" data-edu-id="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Item</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="eduDeletedItemName"></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" id="eduDeleteItemYesButton">Yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal new work item-->
        <div class="modal fade" id="workNewItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="employer">Employer</label>
                                    <input type="text" class="form-control" id="employer" name="employer" placeholder="Enter name of employer">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" class="form-control" id="position" name="position" placeholder="Enter position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date from:</label>
                                    <div class="input-group date" id="workDateFrom" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#workDateFrom"/>
                                        <div class="input-group-append" data-target="#workDateFrom" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date to:</label>
                                    <div class="input-group date" id="workDateTo" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#workDateTo"/>
                                        <div class="input-group-append" data-target="#workDateTo" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="wmemo">Memo</label>
                                    <textarea class="form-control" id="wmemo" name="wmemo" placeholder="Enter memo from position"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="workNewItemSaveButton">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal edit work item-->
        <div class="modal fade" id="workEditItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" id="wId" name="wId" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="eEmployer">Employer</label>
                                    <input type="text" class="form-control" id="eEmployer" name="eEmployer" placeholder="Enter name of employer">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ePosition">Position</label>
                                    <input type="text" class="form-control" id="ePosition" name="ePosition" placeholder="Enter position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date from:</label>
                                    <div class="input-group date" id="eworkDateFrom" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#eworkDateFrom"/>
                                        <div class="input-group-append" data-target="#eworkDateFrom" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date to:</label>
                                    <div class="input-group date" id="eworkDateTo" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#eworkDateTo"/>
                                        <div class="input-group-append" data-target="#eworkDateTo" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="eWMemo">Memo</label>
                                    <textarea class="form-control" id="eWMemo" name="eWMemo" placeholder="Enter memo from position"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="workEditItemSaveButton">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- modal delete work item -->
        <div class="modal fade" id="workDeleteItem" data-work-id="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Item</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="workDeletedItemName"></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" id="workDeleteItemYesButton">Yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
        <!-- modal delete activityItemName -->
        <div class="modal fade" id="activityDetailDeleteItem" data-activityDetailsItem-id="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Item</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="activityDetialDeletedItemName"></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" data-activityDetailsItem-id="" id="activityDetialDeleteItemYesButton">Yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </body>
</html>
