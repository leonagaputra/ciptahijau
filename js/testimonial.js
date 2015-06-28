var testi = {
    temp:null,
    edit_detail : function(obj, id){    
        var name = $($(obj).children()[0]).text();
        var position = $($(obj).children()[1]).text();
        var company = $($(obj).children()[2]).text();
        var testi = $($(obj).children()[3]).html();
        var html = "";
        html += "<form role=\"form\">";
            html += '<input name="id" type="hidden" value="'+id+'">';
            html += '<div class="form-group">';
                html += "<label>Name</label>";
                html += '<input name="name" class="form-control" value="'+name+'">';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Position</label>";
                html += '<input name="name" class="form-control" value="'+position+'">';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Company</label>";
                html += '<input name="name" class="form-control" value="'+company+'">';
            html += '</div>';
            html += '<div class="form-group">';
                html += "<label>Testimonial</label>";
                html += '<textarea name="testimonial" class="summernote2 form-control" rows="3">'+testi+'</textarea>';
            html += '</div>';
            html += '<button type="button" class="btn btn-default">Submit</button>';
            html += '<button type="reset" class="btn btn-default" onclick="testi.cancel_edit()">Cancel</button>';
        html += "</form>";
        
        this.temp = $("#testi_div").html();
        $("#testi_div").html(html);
        $('.summernote2').summernote();
        
    },
    cancel_edit : function(){
        $("#testi_div").html(this.temp);
        this.temp = null;
    },
    save_edit : function(){
       
    }
}