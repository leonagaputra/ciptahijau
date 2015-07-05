<div class="container-fluid" id="top">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                About Us
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    Admin Page
                                </li>
                                <li class="active">
                                    About Us
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-8">

                            <form role="form" id="hdrabout">                           
                                <input name="id" type="hidden" value="<?php echo $datas->HDRPAGES_ID;?>">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" class="form-control" maxlength="<?php echo $title_maxlength;?>" placeholder="Input Title" value="<?php echo $datas->VTITLE;?>">
                                </div>                          

                                <div class="form-group">
                                    <label>Text Content</label>
                                    <textarea name="desc" id="about_desc" class="summernote"class="form-control" rows="3"><?php echo $datas->VDESC;?></textarea>
                                </div>
                                <button type="button" class="btn btn-default" onclick="about_us.submit_header(this)">Submit</button>
                                <button type="reset" class="btn btn-default" onclick="about_us.reset_header(this)">Reset</button>
                            </form>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row">
                        <div class="col-lg-8">
                            
                                <div class="form-group">
                                    <label>Details</label>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>   
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>  
                                            <?php
                                            if($datas){
                                                foreach($datas->DETAILS as $detail){
                                                    echo "<tr>";
                                                    echo '<td style="white-space: nowrap">'.$detail->VTITLE.'</td>';
                                                    echo '<td>'.$detail->VDESC.'</td>';                                                   
                                                    echo '<td>'
                                                    . '<button type="button" class="btn btn-default editbutton" onclick="about_us.edit_detail(this,'.$detail->HDRPAGES_ID.','.$detail->DTLPAGES_ID.')" >Edit</button> '
                                                    . '<button type="button" class="btn btn-default updatebutton" style="display:none" onclick="about_us.save_edit(this)">Save</button>'
                                                    . '<button type="button" class="btn btn-default updatebutton" style="display:none" onclick="about_us.cancel_edit(this)">Cancel</button>'
                                                    . '</td>';
                                                    echo "</tr>";
                                                }
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                                

                        </div>                    
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->