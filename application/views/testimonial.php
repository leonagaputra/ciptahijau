<div class="container-fluid" id="top">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Testimonial
            </h1>
            <ol class="breadcrumb">
                <li>
                    Admin Page
                </li>
                <li class="active">
                    Testimonial
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-8">

            <form role="form" id="hdr">                           
                <input name="id" type="hidden" value="<?php echo $datas->HDRPAGES_ID; ?>">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" class="form-control" maxlength="<?php echo $title_maxlength;?>" placeholder="Input Title" value="<?php echo $datas->VTITLE; ?>">
                </div>                          

                <div class="form-group">
                    <label>Text Content</label>
                    <textarea name="desc" id="hdr_desc" class="summernote"class="form-control" rows="3"><?php echo $datas->VDESC; ?></textarea>
                </div>
                <button type="button" class="btn btn-default" onclick="submit_header(this)">Submit</button>
                <button type="reset" class="btn btn-default" onclick="reset_header(this)">Reset</button>
            </form>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-lg-8">

            <div class="form-group" >
                <label id="testimonial">Testimonial</label>
                <br/>
                <button type="button" class="btn btn-default" onclick="testi.add_detail()">Add</button>
                <br/><br/>
                <div id="testi_div" class="table-responsive">
                    <table id="detail_testimonial" class="table table-hover" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Testimonial</th>          
                                <th></th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Testimonial</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        
                        <?php
                        foreach($datas->DETAILS as $detail){
                            echo "<tr>";
                                echo "<td>".$detail->VNAME."</td>";
                                echo "<td>".$detail->VPOSITION."</td>";
                                echo "<td>".$detail->VCOMPANY."</td>";
                                echo "<td>".$detail->VDESC."</td>";
                                echo "<td><button type='button' class='btn btn-default' onclick='testi.edit_detail(this, ".$detail->HDRPAGES_ID." ,".$detail->DTLPAGES_ID.")'>Edit</button></td>";
                            echo "</tr>";
                        }
                        ?>
                       
                    </table>
                </div>
            </div>

        </div>                    
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->