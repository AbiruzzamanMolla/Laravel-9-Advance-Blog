<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.setting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateWebsite(Request $request)
    {
        $request->validate([
            'site_name' => 'required|max:255',
            'site_logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'site_subscribe_text' => 'required|max:255',
            'site_contact_email' => 'required|max:255|email'
        ]);
        $WebsiteSetting = WebsiteSetting::first();
        $posted = $WebsiteSetting->update($request->except('_token', '_method', 'site_logo'));
        if ($request->hasFile('site_logo')) {
            if($WebsiteSetting->site_logo !== 'frontend/images/logo.png'){
                deletePhoto($WebsiteSetting->site_logo);
            }
            $site_logo =  uploadFile($request->site_logo, 'images/settings/');
            $WebsiteSetting->update([
                'site_logo' => $site_logo
            ]);
        }
        session()->flash('website', true);
        $posted ? flashSuccess('Settings Updated Successfully!') : flashError('Opps! Somethings went wrong!');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAbout(Request $request)
    {
        $request->validate([
            'site_short_bio' => 'required|max:255',
            'site_image_bio' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'site_long_bio' => 'required'
        ]);
        $WebsiteSetting = WebsiteSetting::first();
        $posted = $WebsiteSetting->update($request->except('_token', '_method', 'site_image_bio'));
        if ($request->hasFile('site_image_bio')) {
            if($WebsiteSetting->site_image_bio !== 'frontend/images/logo.png'){
                deletePhoto($WebsiteSetting->site_image_bio);
            }
            $site_image_bio =  uploadFile($request->site_image_bio, 'images/settings/');
            $WebsiteSetting->update([
                'site_image_bio' => $site_image_bio
            ]);
        }
        session()->flash('about', true);
        $posted ? flashSuccess('Settings Updated Successfully!') : flashError('Opps! Somethings went wrong!');
        return back();
    }

    public function updateSocial(Request $request)
    {
        $request->validate([
            'site_social_link_facebook' => 'required|max:255|url',
            'site_social_link_twitter' => 'required|max:255|url',
            'site_social_link_instagram' => 'required|max:255|url',
            'site_social_link_linkedin' => 'required|max:255|url',
        ]);
        $WebsiteSetting = WebsiteSetting::first();
        $posted = $WebsiteSetting->update($request->except('_token', '_method', 'site_image_bio'));

        session()->flash('social', true);
        $posted ? flashSuccess('Settings Updated Successfully!') : flashError('Opps! Somethings went wrong!');
        return back();
    }
}
