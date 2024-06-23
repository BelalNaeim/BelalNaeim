<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller {
    //

    public function SocialSetting() {
        $social  = DB::table( 'socials' )->first();
        return view( 'backend.setting.social', compact( 'social' ) );
    }

    public function SocialUpdate( Request $request, $id ) {
        $data = [];
        $data[ 'facebook' ] = $request->facebook;
        $data[ 'twitter' ] = $request->twitter;
        $data[ 'youtube' ] = $request->youtube;
        $data[ 'linkedin' ] = $request->linkedin;
        $data[ 'instagram' ] = $request->instgram;
        DB::table( 'socials' )->where( 'id', $id )->update( $data );
        $notification = array(
            'message' => 'Social Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'social.setting' )->with( $notification );
    }

    public function SeoSetting() {
        $seo  = DB::table( 'seos' )->first();
        return view( 'backend.setting.seo', compact( 'seo' ) );
    }

    public function SeoUpdate( Request $request, $id ) {
        $data = [];
        $data[ 'meta_author' ] = $request->meta_author;
        $data[ 'meta_title' ] = $request->meta_title;
        $data[ 'meta_keyword' ] = $request->meta_keyword;
        $data[ 'meta_descrition' ] = $request->meta_descrition;
        $data[ 'google_analytics' ] = $request->google_analytics;
        $data[ 'google_verification' ] = $request->google_verification;
        $data[ 'alexa_analytics' ] = $request->alexa_analytics;
        DB::table( 'seos' )->where( 'id', $id )->update( $data );
        $notification = array(
            'message' => 'SEO Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'seo.setting' )->with( $notification );
    }

    public function PrayerSetting() {
        $prayer = DB::table( 'prayers' )->first();
        return view( 'backend.setting.prayers', compact( 'prayer' ) );
    }

    public function PrayerUpdate( Request $request, $id ) {
        $data = [];
        $data[ 'Fajr' ] = $request->Fajr;
        $data[ 'Duhr' ] = $request->Duhr;
        $data[ 'Asar' ] = $request->Asar;
        $data[ 'Maghrib' ] = $request->Maghrib;
        $data[ 'Isha' ] = $request->Isha;
        $data[ 'Jummah' ] = $request->Jummah;
        DB::table( 'prayers' )->where( 'id', $id )->update( $data );
        $notification = array(
            'message' => 'prayers Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'prayer.setting' )->with( $notification );
    }

    public function LiveTvSetting() {
        $livetv = DB::table( 'livetvs' )->first();
        return view( 'backend.setting.livetv', compact( 'livetv' ) );
    }

    public function LiveTvUpdate( Request $request, $id ) {
        $data = [];
        $data[ 'embeded_code' ] = $request->embeded_code;

        DB::table( 'livetvs' )->where( 'id', $id )->update( $data );
        $notification = array(
            'message' => 'Live Tvs Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'livetvs.setting' )->with( $notification );
    }

    public function ActiveSetting( Request $request, $id ) {
        DB::table( 'livetvs' )->where( 'id', $id )->update( [ 'status'=>1 ] );
        $notification = array(
            'message' => 'Live Tvs Active  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }

    public function DeactiveSetting( Request $request, $id ) {
        DB::table( 'livetvs' )->where( 'id', $id )->update( [ 'status'=>0 ] );
        $notification = array(
            'message' => 'Live Tvs Deactivated  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }

    public function NoticeSetting() {
        $notice = DB::table( 'notice' )->first();
        return view( 'backend.setting.notice', compact( 'notice' ) );
    }

    public function NoticeUpdate( Request $request, $id ) {
        $data = [];
        $data[ 'notice' ] = $request->notice;

        DB::table( 'notice' )->where( 'id', $id )->update( $data );
        $notification = array(
            'message' => 'Notice Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'notice.setting' )->with( $notification );
    }

    public function ActiveNoticeSetting( Request $request, $id ) {
        DB::table( 'notice' )->where( 'id', $id )->update( [ 'status'=>1 ] );
        $notification = array(
            'message' => 'Notice Active  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }

    public function DeactiveNoticeSetting( Request $request, $id ) {
        DB::table( 'notice' )->where( 'id', $id )->update( [ 'status'=>0 ] );
        $notification = array(
            'message' => 'Notice Deactivated  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with( $notification );
    }

    public function AllWebsiteLink() {
        $website = DB::table( 'website' )->orderBy( 'id', 'desc' )->paginate( 5 );
        return view( 'backend.website.index', compact( 'website' ) );
    }

    public function AddWebsiteLink() {
        return view( 'backend.website.create' );
    }

    public function Websitestore( Request $request ) {
        $data = [];
        $data[ 'website_name' ] = $request->website_name;
        $data[ 'website_link' ] = $request->website_link;
        DB::table( 'website' )->insert( $data );
        $notification = array(
            'message' => 'Website Link Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'all.website' )->with( $notification );
    }

    public function EditWebsite( $id ) {
        $website = DB::table( 'website' )->where( 'id', $id )->first();
        return view( 'backend.website.edit', compact( 'website' ) );
    }

    public function UpdateWebsite( Request $request, $id ) {
        $validatedData = $request->validate( [
            'website_name' => 'required|unique:website|max:255',
            'website_link' => 'required|unique:website|max:255'
        ] );

        $data = [];
        $data[ 'website_name' ] = $request->website_name;
        $data[ 'website_link' ] = $request->website_link;
        DB::table( 'website' )->where( 'id', $id )->update( $data );
        $notification = array(
            'message' => 'Website Link Updated  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'all.website' )->with( $notification );
    }

    public function DeleteWebsite( $id ) {
        DB::table( 'website' )->where( 'id', $id )->delete();
        $notification = array(
            'message' => 'Website Dleleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route( 'all.website' )->with( $notification );
    }
}
