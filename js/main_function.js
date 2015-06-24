var main = {
    base_url : null,
    base_app : null
}

function show_message(str, title, width)
{
    if(title == undefined)title = "Pesan"
    var html = "<div id='message'>";
    html += str;
    html += "</div>";

    $("#message").unbind();
    $("#message").remove();
    $("body").append(html);
    $("#message").dialog({
        title :title,
        resizable:false,
        modal : true,
        draggable : false,
        width : width ? width : 300
    });
}

function show_loading(append, obj) {
    if(window.stop !== undefined)
    {
         window.stop();
    }
    else if(document.execCommand !== undefined)
    {
         document.execCommand("Stop", false);
    }

    if(!append){
        $("#right").empty();
        $("#right").html('<img id="loading" src="'+main.base_app+'assets/img/ajax-loader.gif"/>');
    }
    else{
        if($("#loading").length)
        {

        }
        else{
            var t_obj = obj? obj : "right";
            $("#" + t_obj).append('<img id="loading" src="'+main.base_app+'assets/img/ajax-loader.gif"/>');
        }
            
    }
}

function show_home(){
    $.ajax({
        type:"POST",
        //data:"id="+id,
        dataType:"html",
        url:main.base_url+"index.php/menu/show_beranda",
        success:function(msg){            
            $("#right").empty();
            var html = msg;
            
            $("#right").append(html);
            html = null;
        }
    });
}