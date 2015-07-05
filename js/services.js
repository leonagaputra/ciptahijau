var services = {
    temp:null,
    edit_detail : function(obj, hdr_id, dtl_id){
        //console.log($(obj).children());
        //$(obj).children();
        this.temp = $($(obj).parent().parent()).html();
        var title = $($(obj).parent().parent().children()[0]).text();
        var desc = $($(obj).parent().parent().children()[1]).text();
        $($(obj).parent().parent().children()[0]).html("\
            <input type='hidden' name='hdr_id' id='hdr_id' value='"+hdr_id+"'>\n\
            <input type='hidden' name='dtl_id' id='dtl_id' value='"+dtl_id+"'>\n\
            <input type='text' id='dtl_title' name='dtl_title' value='"+title+"'>\n\
        ");
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
        var hdr_id = $("#hdr_id").val();
        var dtl_id = $("#dtl_id").val();
        var title = $("#dtl_title").val();
        var desc = $("#dtl_desc").code();
        
        var result = "";
        result += "hdr_id=" + hdr_id;
        result += "&dtl_id=" + dtl_id;
        result += "&title=" + title;
        result += "&desc=" + desc;
        
        show_loading();
        $.ajax({
            type:"POST",
            dataType:"JSON",
            data : result,
            url:main.base_url+"index.php/backend/update_detail",
            error: function(jqxhr, exc){
                show_success_loading(0);
            },
            success:function(msg){
                //msgs = $.parseJSON(msg);
                //console.log(msg);
                show_success_loading(1);
                $($(obj).parent().parent().children()[0]).html(title);
                $($(obj).parent().parent().children()[1]).html(desc);
            }
        });
       
    },
    submit_header : function(obj){
        var result = "";
        
        result += "id=";        
        result += $("#hdrservices input[name=id]").val();
        result += "&";
        result += "title=";        
        result += $("#hdrservices input[name=title]").val();
        result += "&";
        result += "desc=";
        result += $(".summernote").code();
        result += "&";
        
        //alert(result);
        //return;
        //console.log(result);
        show_loading();
        $.ajax({
            type:"POST",
            dataType:"JSON",
            data : result,
            url:main.base_url+"index.php/backend/update_header",
            error: function(jqxhr, exc){
                show_success_loading(0);
            },
            success:function(msg){
                //msgs = $.parseJSON(msg);
                //console.log(msg);
                show_success_loading(1);
            }
        });
    },
    reset_header:function(obj){
        var result = "";        
        result += "id=";        
        result += $("#hdrservices input[name=id]").val();
        show_loading();
        $.ajax({
            type:"POST",
            dataType:"JSON",   
            data : result,
            url:main.base_url+"index.php/backend/reset_header",
            error: function(jqxhr, exc){
                show_success_loading(0);
            },
            success:function(msg){
                //msgs = $.parseJSON(msg);
                //console.log(msg);
                $("#hdrservices input[name=title]").val(msg.VTITLE);
                $("#services_desc").code(msg.VDESC);
                hide_overlay();
            }
        });
    }
}