<?php

function inputFields ($type, $name, $placeholder, $value, $autoComplete){
    $ele = "<div class=\"form-group my-4\">
                <input type='$type' name='$name' placeholder='$placeholder' class=\"form-control\" value='$value' autocomplete='$autoComplete'>
            </div>";

    echo $ele;
}

function getImage($str){
    $img_directory_seperate = explode('/', $str);
    return $imge_directory = end($img_directory_seperate);
}