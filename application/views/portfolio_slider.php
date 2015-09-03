$(function () {
    $("#elastic_grid_demo").elastic_grid({
        'hoverDirection': true,
        'hoverDelay': 0,
        'hoverInverse': false,
        'expandingSpeed': 500,
        'expandingHeight': 500,
        'items':
                [
                    <?php
                        //print_r($datas);exit;
                        $i = 0;
                        $string = "";
                        foreach($datas as $data){
                            if($i > 0){
                                $string .= ",";
                            }
                            $string .= "{";
                                $string .= "'title' : '".$data->VTITLE."',\r\n";
                                $string .= "'description' : '".$data->VDESC."',\r\n";
                                $thumb = "[";
                                $lar = "[";
                                $j = 0;
                                if(is_array($data->DETAILS)){
                                    foreach ($data->DETAILS as $detail){
                                        if($j > 0){
                                            $thumb .= ", ";
                                            $lar .= ", ";
                                        }
                                        $thumb .= "'".$thumbnail.$detail->VTHUMBNAIL."'";
                                        $lar .= "'".$large.$detail->VLARGE."'";

                                        $j++;
                                    }
                                }
                                
                                $thumb .= "]";
                                $lar .= "]";
                                $string .= "'thumbnail' : ".$thumb.",\r\n";
                                $string .= "'large' : ".$lar.",\r\n";
                                $string .= "'button_list' : [{'title': 'Download', 'url': 'http://#'}],\r\n";
                                $tags = explode($separator, $data->VTAGS);
                                $tags_val = "[";
                                $k = 0;
                                foreach($tags as $tag){
                                    if($k > 0){
                                        $tags_val .= ", ";
                                    }
                                    $tags_val .= "'".$tag."'";
                                    $k++;
                                }
                                $tags_val .= "]";
                                $string .= "'tags' : ".$tags_val.",\r\n";
                            $string .= "}";
                            $i++;
                        }
                        echo $string;
                    ?>
                    

                ]
    });
});