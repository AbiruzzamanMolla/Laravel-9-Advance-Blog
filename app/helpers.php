<?php

function uploadImage($image){
    $imageName = time().'.'.$image->extension();
    // Public Folder
    $image->move(public_path('images'), $imageName);
    $url = 'images/'.$imageName;
    return $url;
}