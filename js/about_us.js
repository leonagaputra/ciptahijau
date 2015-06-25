var about_us = {
    temp:null,
    edit_detail : function(obj, hdr_id, dtl_id){
        //console.log($(obj).children());
        //$(obj).children();
        this.temp = $($(obj).parent().parent()).html();
        var title = $($(obj).parent().parent().children()[0]).text();
        var desc = $($(obj).parent().parent().children()[1]).text();
        $($(obj).parent().parent().children()[0]).html("<input type='text' id='dtl_title' name='dtl_title' value='"+title+"'>");
        var textarea = "<textarea class='som' cols='50' rows='4' name='dtl_desc' id='dtl_desc'>";
        textarea += desc;
        textarea += "</textarea>";
        $($(obj).parent().parent().children()[1]).html(textarea);
        $(obj).next().show();
        $(obj).next().next().show();
        //console.log(editbutton);
        $(".editbutton").hide();        
        $('.som').summernote();
    },
    cancel_edit : function(obj){
        $(".editbutton").show();
        $(".updatebutton").hide();
        $($(obj).parent().parent()).html(this.temp);
        this.temp = null;
    },
    save_edit : function(obj){
        $(".editbutton").show();
        $(".updatebutton").hide();
        var title = $("#dtl_title").val();
        var desc = $("#dtl_desc").code();
        $($(obj).parent().parent().children()[0]).html(title);
        $($(obj).parent().parent().children()[1]).html(desc);
    }
}