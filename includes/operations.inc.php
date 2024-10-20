<?php

function inputFields ($type, $name, $placeholder, $value, $autoComplete){
    $ele = "<div class=\"form-group my-4\">
                <input type='$type' name='$name' placeholder='$placeholder' class=\"form-control\" value='$value' autocomplete='$autoComplete'>
            </div>";

    echo $ele;
}