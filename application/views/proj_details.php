

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
                        <div class="col-lg-8">

                            <!--<table data-toggle="table" data-url="<?php echo $base_url;?>index.php/backend/project_datas?limit=50&offset=0&order=asc">
                                <thead>
                                    <tr>
                                        <th data-field="id">Item ID</th>
                                        <th data-field="name">Item Name</th>
                                        <th data-field="price">Item Price</th>
                                    </tr>
                                </thead>
                            </table>-->
                            
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
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->