<?php
    function checkStr($str,$default)
    {
        $ret_str=$default;
        if(isset($_POST[$str]))
        {
            $ret_str=htmlspecialchars($_POST[$str]);
        }
        elseif(isset($_GET[$str]))
        {
            $ret_str=htmlspecialchars($_GET[$str]);
        }
        return $ret_str;
    }
    $id = checkStr('iid',' ');
    $sernum = checkStr('sernum',' ');
    $message = array();
    $xmlDoc = new DOMDocument();
    $xmlDoc->load("xml/goods.xml");
    $medicines = array();
    foreach( $xmlDoc->getElementsByTagName("product") as $someItem)
    {
        if($someItem->getAttribute("sernum") == $sernum && $someItem->getAttribute("iid") == $id)
        {
            if($someItem->nodeType != XML_TEXT_NODE)
            {
                $parameters = array();
                foreach($someItem->childNodes as $parameter)
                {
                    switch($parameter->nodeName)
                    {
                        case 'image': $medicines['image'] = $parameter->nodeValue; break;
                        case 'name': $medicines['name'] = $parameter->nodeValue; break;
                        case 'description': $medicines['description'] = $parameter->nodeValue; break; 
                        case 'param': 
                        $param = array();
                        foreach($parameter->childNodes as $par)
                        {
                            if($par->nodeName=='nameofParam')
                                $param['name']=$par->nodeValue;
                            elseif($par->nodeName=='valofParam')
                                $param['value']=$par->nodeValue;
                        }
                        $parameters[]=$param;
                        unset($param);break;
                    }
                    $medicines['params']=$parameters;
                }
            }
        }
    }
    $message = json_encode($medicines, JSON_UNESCAPED_UNICODE);
    echo $message;
