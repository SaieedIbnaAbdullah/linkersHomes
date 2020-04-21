<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectCategory;
use DB;
use App\Models\ProjectPost;

class showController extends Controller
{
    public function show(){
    	return view('frontSide.body');
    }
    public function showCustom(){
    	return view('site.realestate.what_we_build.custom_design.index');
    }
    public function showAbout(){
    	return view('site.realestate.why_linkers_homes.about_linkershomes.index');
    }
    public function showContact(){
    	return view('site.realestate.contact.index');
    }
 
    public function showHouseLand(){
        return view('house&land.house_land');
    }
    public function showOurProcess(){
        return view('site.realestate.our_services.our_process.index');
    }
    public function showPromotions(){
        return view("site.realestate.our_services.promotions.index");
    }
    public function showInclusions(){
        return view("site.realestate.our_services.inclusions.index");
    }
    public function showCarrers(){
        return view('site.realestate.why_linkers_homes.carrers.index');
    }
    public function showKnockDownRebuild(){
        return view('site.realestate.what_we_build.knock_down_rebuild.index');
    }
    public function showDoubleStorey(){
        $datas = DB::table('project_categories')->where('parent_id', '=', 9)->get();
        return view('site.realestate.what_we_build.double_storey.index', compact('datas'));
    }
    public function showSingleStorey(){
        $datas = DB::table('project_categories')->where('parent_id', '=', 14)->get();
        return view('site.realestate.what_we_build.single_storey.index',compact('datas'));
    }
    public function showDuplex(){
        $datas = DB::table('project_categories')->where('parent_id', '=', 1)->get();
        return view('site.realestate.what_we_build.duplex.index', compact('datas'));
    }
    public function showWhereWeBuild(){
        return view('site.realestate.our_services.where_we_build.index');
    }
    public function showBlog(){ 
        return view('Blog.blog');
    }
    public function showSupplier(){
        return view('site.realestate.why_linkers_homes.our_suppliers.index');
    }
    public function showTriplex(){
        return view('Triplex.triplex');
    }
    public function showHouseGranny(){
        $datas = DB::table('project_posts')->where('project_category_id', '=', 8)->get();
        return view('site.realestate.what_we_build.house_granny_flat.index',compact('datas'));
    }
    public function showDisplayHome(){
        return view('DisplayHomes.displayHomes');
    }
    public function showClientPortal(){
        return view('Client-Portal.client_portal');
    }
    public function showGranny(){
        $datas = DB::table('project_posts')->where('project_category_id', '=', 7)->get();
        
        return view('site.realestate.what_we_build.granny_flat.index', compact('datas'));
    }
    public function showMultiDwellings(){
        return view('site.realestate.what_we_build.multi_dwellings.index');
    }
    public function pointsDifferentitaion(){
        return view('site.realestate.why_linkers_homes.points_of_differentiation.index');
    }
    public function showDuplexProductList($id){
       $datas = DB::table('project_posts')->where('project_category_id', '=', $id)->get();
       
        return view('site.realestate.what_we_build.duplex.list', compact('datas'));
    }
    public function showDuplexProductDetails($id){
        $datas = ProjectPost::find($id);

        return view('site.realestate.what_we_build.duplex.product_details', compact('datas'));
    }

    public function showGrannyFlatDetails($id){
       $datas = ProjectPost::find($id);
       // dd($datas);
        return view('site.realestate.what_we_build.granny_flat.product_details',compact('datas'));
    }

    public function showHouseGrannyFlatDetails($id){
        $datas = ProjectPost::find($id);
        return view('site.realestate.what_we_build.house_granny_flat.product_details', compact('datas'));
    }
    public function showDoubleStoreyList($id){
        $datas = DB::table('project_posts')->where('project_category_id', '=', $id)->get();
        return view('site.realestate.what_we_build.double_storey.list',compact('datas'));
    }

     public function showDoubleStoreyProductDetails($id){
        $datas = ProjectPost::find($id);
        return view('site.realestate.what_we_build.double_storey.product_details', compact('datas'));
    }

    public function showSingleStoreyList($id){
        $datas = DB::table('project_posts')->where('project_category_id', '=', $id)->get();
        return view('site.realestate.what_we_build.single_storey.list',compact('datas'));
    }

    public function showSingleStoreyProductDetails($id){
        $datas = ProjectPost::find($id);
        return view('site.realestate.what_we_build.single_storey.product_details', compact('datas'));
    }

   
}
