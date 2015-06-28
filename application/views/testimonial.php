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

            <form role="form">                           
                <input name="id" type="hidden" value="<?php echo $datas->HDRPAGES_ID; ?>">
                <div class="form-group">
                    <label>Title</label>
                    <input name="title" class="form-control" placeholder="Input Title" value="<?php echo $datas->VTITLE; ?>">
                </div>                          

                <div class="form-group">
                    <label>Text Content</label>
                    <textarea name="desc" class="summernote"class="form-control" rows="3"><?php echo $datas->VDESC; ?></textarea>
                </div>
                <button type="button" class="btn btn-default">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-lg-8">

            <div class="form-group" >
                <label>Testimonial</label>
                <div id="testi_div">
                    <table id="detail_testimonial" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Testimonial</th>                            
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Testimonial</th>
                            </tr>
                        </tfoot>

                        <tr onclick="testi.edit_detail(this, 1)">
                            <td>Baba</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger345 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger89 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger99 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger9 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger8 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger7 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger6 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger5 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger4 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger3 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                        <tr>
                            <td>Tiger2 Nixon</td>
                            <td>CEO</td>
                            <td>BCA</td>
                            <td>Ok banget</td>                        
                        </tr>
                    </table>
                </div>
            </div>

        </div>                    
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->