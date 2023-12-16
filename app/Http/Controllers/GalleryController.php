<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Nick;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $get_image = $request->image;
        $nick_id = $request->nick_id;
        $nick = Nick::find($nick_id);
        if($get_image){
            foreach($get_image as $img){

            
            //Bỏ hình ảnh cũ
            $path_del = 'uploads/gallery/'.$nick->image;
            if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì gỡ ảnh
                unlink($path_del);
            }
            //Thêm mới hình ảnh
            $path = 'uploads/gallery/';
            $get_name_image = $img->getClientOriginalName(); // -> hinh123.png
            $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
            $new_image = $name_image.rand(0, 99).'.'.$img->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
            $img->move($path, $new_image);
            
            $gallery = new Gallery();
            $gallery->title = $nick->title;
            $gallery->nick_id = $nick->id;
            $gallery->image = $new_image;
            $gallery->save();
            }
        }
        return redirect()->back()->with('status','Thêm ảnh thành công!');

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
        $gallery = Gallery::where('nick_id', $id)->get();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::find($id);
        $path_del = 'uploads/gallery/'.$gallery->image;
        if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì xóa ảnh
            unlink($path_del);
        }
        $gallery->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
