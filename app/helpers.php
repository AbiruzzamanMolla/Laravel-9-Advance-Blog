<?php

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Storage;

function uploadImage(?object $image, string $oldImage = null){
    if(file_exists($oldImage)){
        @unlink($oldImage);
    }
    $imageName = time().'.'.$image->extension();
    // Public Folder
    $image->move(public_path('images'), $imageName);
    $url = 'images/'.$imageName;
    return $url;
}

function uploadFile($file, $path = 'files/'){
    $fileName = $file->getClientOriginalName();
    // Folder
    $file->move(public_path($path), $fileName);
    $url = $path.$fileName;
    return $url;
}

function abortIf(string $permission){
    if (!auth()->user()->hasPermission($permission)) { // you can pass an id or slug
        return abort(403);
    }
}

function userCan(string $permission)
{
    return auth()->user()->hasPermission($permission);
}

function alertUserCanNot(string $permission){
    if(!auth()->user()->hasPermission($permission)){
        flashWarning('Opps! Permission Denied!');
        return true;
    }
    return false;
}

function flashSuccess(string $msg)
{
    session()->flash('success', $msg);
}

function flashWarning(string $msg)
{
    session()->flash('warning', $msg);
}

function flashError(string $msg)
{
    session()->flash('error', $msg);
}


function uploadPhote(?object $file, string $path): string
{
    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    Storage::putFileAs("public/$path", $file, $fileName);

    return "storage/$path/" . $fileName;
}

/**
 * image delete
 *
 * @param string $image
 * @return void
 */
function deletePhoto(?string $image)
{
    $imageExists = file_exists($image);

    if ($imageExists) {
        @unlink($image);
    }
}

function website(){
    return WebsiteSetting::first();
}
