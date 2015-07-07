<div class="container-fluid" id="top">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Contact Us
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    Admin Page
                                </li>
                                <li class="active">
                                    Contact Us
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-8">

                            <form role="form" id="hdr">                           
                                <input name="id" type="hidden" value="<?php echo $datas->HDRPAGES_ID;?>">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" class="form-control" maxlength="<?php echo $title_maxlength;?>" placeholder="Input Title" value="<?php echo $datas->VTITLE;?>">
                                </div>                          

                                <div class="form-group">
                                    <label>Text Content</label>
                                    <textarea name="desc" id="hdr_desc" class="summernote"class="form-control" rows="3"><?php echo $datas->VDESC;?></textarea>
                                </div>
                                <button type="button" class="btn btn-default" onclick="submit_header(this)">Submit</button>
                                <button type="reset" class="btn btn-default" onclick="reset_header(this)">Reset</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->