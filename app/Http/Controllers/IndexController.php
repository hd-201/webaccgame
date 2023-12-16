<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Nick;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\Service;

class IndexController extends Controller
{
    public function home(){
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        $slider = Slider::orderBy('id', 'desc')->where('status', 1)->get();
        $nick = Nick::orderBy('id', 'desc')->get();
        $category = Category::withCount('nick')->orderBy('id', 'DESC')->get();
        $service = Service::orderBy('id', 'DESC')->get();
        return view('pages.home', compact('category', 'slider','instruct','service'));
    }
    public function dichvu(){
        $service = Service::orderBy('id', 'DESC')->get();
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        return view('pages.service',compact('instruct', 'service'));
    }
    public function dichvucon($slug){
        $service = Service::where('slug',$slug)->first();
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        return view('pages.sub_service', compact('slug','instruct', 'service'));
    }
    public function danhmuc_game($slug){
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        $nick = Nick::orderBy('id', 'desc')->get();
        $category = Category::where('slug',$slug)->withCount('nick')->first();
        // dd($category);
        return view('pages.category', compact('instruct', 'category'));
    }
    public function mua_nick(){
        $category = Category::withCount('nick')->orderBy('id', 'DESC')->get();
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        return view('pages.list_game', compact('instruct','category'));
    }
    public function mua_nick_slug($slug){
        $category = Category::where('slug',$slug)->first();
        $nicks = Nick::where('category_id',$category->id)->where('status', 1)->paginate(16);
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        return view('pages.nickgame', compact('slug','instruct','nicks', 'category'));
    }
    public function nick_detail($code){
        $nick_game = Nick::where('code',$code)->first();
        $nick = Nick::find($nick_game->id ?? 0);
        $category = Category::where('id',$nick->category_id)->first();
        $nicks = Nick::where('category_id',$category->id)->orderBy('id', 'desc')->get();
        $gallery = Gallery::where('nick_id',$nick->id)->orderBy('id','DESC')->get();
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        return view('pages.nick_detail', compact('instruct','nick','category','gallery','nicks'));
    }
    public function video_highlight(){
        $videos = Video::orderBy('id', 'DESC')->where('status',1)->paginate(30);
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        return view('pages.video', compact('videos', 'instruct'));
    }
    public function show_video(Request $request){
        $data = $request->all();
        $video = Video::find($data['id']);
        $output['video_title'] = $video->title;
        $output['video_description'] = $video->description;
        $output['video_link'] = $video->link;
        echo json_encode($output);
    }
    public function blogs(){
        $blogs = Blog::orderBy('id', 'DESC')->where('type','blogs')->paginate(30);
        $instruct = Blog::orderBy('id', 'DESC')->where('type','instruct')->get();
        return view('pages.blogs', compact('blogs', 'instruct'));
    }
    public function blog_detail($slug){
        $blog = Blog::where('slug', $slug)->first(); 
        return view('pages.blog_detail', compact('blog'));
    }
    public function buy_card(){
        return view('pages.buycard');
    }
    public function recharge_card(){
        return view('pages.recharge_card');
    }
    public function recharge_atm(){
        return view('pages.recharge_atm');
    }
    public function account(){
        return view('pages.account');
    }
    public function history(){
        return view('pages.history');
    }
    public function purchased_account(Request $request){
        // dd($request->all());
        return view('pages.purchased_account');
    }
    public function pay($id){
        $nick_game = Nick::where('code',$id)->first();
        $nick = Nick::find($nick_game->id ?? 0);
        return response()->json([
            'code' => $nick->code,
            'title' => $nick->title,
            'price' => $nick->price,
            // Thêm các trường thông tin khác cần thiết của sản phẩm
        ]);
    }
}
