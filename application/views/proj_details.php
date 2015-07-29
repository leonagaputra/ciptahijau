

<div class="container-fluid" id="top">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Projects
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    Admin Page
                                </li>
                                <li class="active">
                                    Project Details
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-8" id="project_list">                            
                            
                            <div id="toolbar">
                                <button id="add_new" class="btn btn-default" onclick="add_new_project()">
                                    Add New
                                </button>
                            </div>
                            <table id="proj_table" data-toggle="table" data-search="true" data-pagination="true" data-page-list="[5, 10, 20]" data-side-pagination="server" data-url="<?php echo $base_url?>index.php/backend/project_datas">
                                <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">Item ID</th>
                                        <th data-field="title" data-sortable="true">Title</th>
                                        <th data-field="client">Client</th>
                                        <th data-field="location">Location</th>
                                        <th data-field="year">Year</th>
                                    </tr>
                                </thead>
                                <!--<tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Item 1</td>
                                        <td>$1</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Item 2</td>
                                        <td>$2</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Item 3</td>
                                        <td>$3</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Item 1</td>
                                        <td>$1</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Item 2</td>
                                        <td>$2</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Item 3</td>
                                        <td>$3</td>
                                    </tr>
                                </tbody>-->
                            </table>
                        </div>
                        <div class="col-lg-8" id="proj_details_div" style="display: none;">                            
                            <form role="form" id="proj_details_form">                           
                                <input name="itemid" id="itemid" type="hidden" >
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" id="title" class="form-control" maxlength="100"  required="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" id="desc" class="summernote" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Client</label>
                                    <input name="client" id="client" class="form-control" maxlength="100"  >
                                </div>
                                <div class="form-group">
                                    <label>Market</label>
                                    <input name="market" id="market" class="form-control" maxlength="100"  >
                                </div>
                                <div class="form-group">
                                    <label>Service</label>
                                    <input name="service" id="service" class="form-control" maxlength="100"  >
                                </div>
                                <div class="form-group">
                                    <label>Wide Scale</label>
                                    <input name="wdscl" id="wdscl" class="form-control" maxlength="45"  >
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input name="location" id="location" class="form-control" maxlength="100"  >
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <select class="form-control" id="year">
                                        <?php
                                            $year = date("Y");
                                            for($i = $year; $i >= 2000; $i--){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Length of Work</label>
                                    <input name="length" id="length" class="form-control" maxlength="100"  >
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input name="status" id="status" class="form-control" maxlength="45"  >
                                </div>

                                <button type="button" id="add_new_button" class="btn btn-default" onclick="enable_form_add()" disabled="">Add New </button>
                                <button type="button" id="submit_button" class="btn btn-default" onclick="add_new_project_submit()">Submit </button>
                                <button type="reset" id="reset_button" class="btn btn-default" >Reset </button>
                                <button type="button" class="btn btn-default" onclick="add_new_project_back()">Back</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->