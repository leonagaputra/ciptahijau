var testi = {
    temp:null,
    add_detail : function(){   
        //show_loading();
        var html = "";
        //html += "<fieldset id='add_field'>";
        html += "<form role=\"form\">";
            //html += "<fieldset id='add_field'>";
            html += '<div class="form-group">';
                html += "<label>Name</label>";
                html += '<input id="dtl_name" name="name" class="form-control" >';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Position</label>";
                html += '<input id="dtl_position" name="position" class="form-control" >';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Company</label>";
                html += '<input id="dtl_company" name="company" class="form-control" >';
            html += '</div>';
            html += "<fieldset id='testi_summernote'>";
                html += '<div class="form-group">';
                    html += "<label>Testimonial</label>";
                    html += '<textarea id="dtl_testi" name="testimonial" class="summernote2 form-control" rows="3"></textarea>';
                html += '</div>';
            html += "</fieldset>";
            html += '<button id="submit" type="button" class="btn btn-default" onclick="testi.save_add()">Submit</button>';
            //html += "</fieldset>";
            html += '<button type="reset" class="btn btn-default" onclick="window.location.href=\'testimonial\'">Back</button>';
        html += "</form>";
        //html += "</fieldset>";
        
        this.temp = $("#testi_div").html();
        $("#testi_div").html(html);
        $('.summernote2').summernote();
        //hide_overlay();
    },
    edit_detail : function(obj, hdr_id, dtl_id){    
        //show_loading();
        var tr_obj = $(obj).parent().parent();
        var name = $($(tr_obj).children()[0]).text();
        var position = $($(tr_obj).children()[1]).text();
        var company = $($(tr_obj).children()[2]).text();
        var testi = $($(tr_obj).children()[3]).html();
        var html = "";
        html += "<form role=\"form\">";
            html += '<input name="hdr_id" id="hdr_id" type="hidden" value="'+hdr_id+'">';
            html += '<input name="dtl_id" id="dtl_id" type="hidden" value="'+dtl_id+'">';
            html += '<div class="form-group">';
                html += "<label>Name</label>";
                html += '<input id="dtl_name" name="name" class="form-control" value="'+name+'">';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Position</label>";
                html += '<input id="dtl_position" name="position" class="form-control" value="'+position+'">';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Company</label>";
                html += '<input id="dtl_company" name="company" class="form-control" value="'+company+'">';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Testimonial</label>";
                html += '<textarea id="dtl_testi" name="testimonial" class="summernote2 form-control" rows="3">'+testi+'</textarea>';
            html += '</div>';
            html += '<button type="button" id="submit" class="btn btn-default" onclick="testi.save_edit()">Submit</button>';
            html += '<button type="reset" class="btn btn-default" onclick="window.location.href=\'testimonial\'">Back</button>';
        html += "</form>";
        
        this.temp = $("#testi_div").html();
        $("#testi_div").html(html);
        $('.summernote2').summernote();
        //hide_overlay();
    },
    cancel_edit : function(){
        $("#testi_div").html(this.temp);
        this.temp = null;
        //$('#detail_testimonial').dataTable();
    },
    save_edit : function(){
       var hdr_id = $("#hdr_id").val();
       var dtl_id = $("#dtl_id").val();
       var dtl_name = $("#dtl_name").val();
       var dtl_position = $("#dtl_position").val();
       var dtl_company = $("#dtl_company").val();
       var dtl_testi = $("#dtl_testi").code();
       
       var result = "";
        result += "hdr_id=" + hdr_id;
        result += "&dtl_id=" + dtl_id;
        result += "&dtl_name=" + dtl_name;
        result += "&dtl_position=" + dtl_position;
        result += "&dtl_company=" + dtl_company;
        result += "&desc=" + dtl_testi.replace(/&nbsp;/g," ");
        
        show_loading();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: result,
            url: main.base_url + "index.php/backend/update_detail",
            error: function (jqxhr, exc) {
                show_success_loading(0);
            },
            success: function (msg) {
                //msgs = $.parseJSON(msg);
                //console.log(msg);
                show_success_loading(1);                
            }
        });
    },
    save_add : function(){       
       var dtl_name = $("#dtl_name").val();
       var dtl_position = $("#dtl_position").val();
       var dtl_company = $("#dtl_company").val();
       var dtl_testi = $("#dtl_testi").code();
       
       var result = "";
        result += "dtl_name=" + dtl_name;
        result += "&dtl_position=" + dtl_position;
        result += "&dtl_company=" + dtl_company;
        result += "&desc=" + dtl_testi.replace(/&nbsp;/g," ");
        //console.log(dtl_testi.replace(/&nbsp;/g," "));
        
        show_loading();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: result,
            url: main.base_url + "index.php/backend/add_detail",
            error: function (jqxhr, exc) {
                show_success_loading(0);
            },
            success: function (msg) {
                //msgs = $.parseJSON(msg);
                //console.log(msg);
                $("#dtl_name").attr('disabled',"");
                $("#dtl_position").attr('disabled',"");
                $("#dtl_company").attr('disabled',"");
                $("#testi_summernote").attr('disabled',"");
                $("#submit").addClass('disabled');
                show_success_loading(1);                
            }
        });
    }
}