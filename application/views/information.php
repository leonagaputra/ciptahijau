<div class="container-fluid" id="top">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Information
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    Admin Page
                                </li>
                                <li class="active">
                                    Information
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-8">

                            <form role="form" id="information_form">                                                           
                                <?php
                                $i = 0;
                                foreach($datas as $data){ 
                                    if($i == 0){
                                        echo '<input name="hdrsettings_id" type="hidden" value="'.$data->HDRSETTINGS_ID.'">';
                                    }
                                    echo '<div class="form-group">';
                                        echo '<label>'.$data->VITEMNAME.'</label>';
                                        echo '<input name="'.$data->DTLSETTINGS_ID.'" class="form-control" value="'. $data->VITEMVALUE .'">';
                                    echo '</div>'; 
                                    $i++;
                                }
                                    
                                ?>
                                
                                <button type="button" class="btn btn-default" onclick="update_information(this)">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->