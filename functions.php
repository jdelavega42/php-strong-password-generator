<?php
function password_generator($my_array, $my_length, $repeat)
{
    $my_password = "";

    if (count($my_array) < $my_length && $repeat === 'false') {
        $my_password = 'Caratteri insufficienti';
    } else {
        while (strlen($my_password) < $my_length) {
            $char_index = rand(0, count($my_array));
            if ($repeat === 'false') {
                if (!str_contains($my_password, $my_array[$char_index])) {
                    $my_password .= $my_array[$char_index];
                };
            } else {
                $my_password .= $my_array[$char_index];
            };
        }
    }
    
    return $my_password;
};
