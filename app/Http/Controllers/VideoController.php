<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->paginate(5);
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $video = new Video();
        $video->title = $data['title'];
        $video->slug = $data['slug'];
        $video->description = $data['description'];
        $video->link = $data['link'];
        $video->status = $data['status'];

        //Them hinh anh vao folder
        $get_image = $request->image;
        $path = 'uploads/video/';
        $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
        $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
        $get_image->move($path, $new_image);
        $video->image = $new_image;

        $video->save();
        return redirect()->route('video.index')->with('status','Thêm video thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $video = Video::find($id);
        $video->title = $data['title'];
        $video->slug = $data['slug'];
        $video->description = $data['description'];
        $video->link = $data['link'];
        $video->status = $data['status'];

        //Thêm hình ảnh vào folder và db
        $get_image = $request->image;

        //Nếu người dùng chọn ảnh khác thì mới update
        if($get_image){
            //Bỏ hình ảnh cũ
            $path_del = 'uploads/video/'.$video->image;
            if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì gỡ ảnh
                unlink($path_del);
            }
            //Thêm mới hình ảnh
            $path = 'uploads/video/';
            $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
            $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
            $get_image->move($path, $new_image);
            $video->image = $new_image;
        }
        $video->save();
        return redirect()->back()->with('status','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = video::find($id);
        $path_del = 'uploads/video/'.$video->image;
        if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì xóa ảnh
            unlink($path_del);
        }
        $video->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
