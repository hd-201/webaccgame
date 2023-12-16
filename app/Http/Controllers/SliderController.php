<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::orderBy('id', 'desc')->paginate(5);
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:slider|max:255',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'status' => 'required'
            ],
            [
                'title.unique' => 'Tên danh mục đã có vui lòng điền tên khác',
                'title.required' => 'Vui lòng điền tiêu đề danh mục',
                'description.required' => 'Vui lòng điền mô tả danh mục',
                'image.required' => 'Vui lòng chọn hình ảnh',
            ]
        );


        $slider = new Slider();
        $slider->title = $data['title'];
        $slider->description = $data['description'];
        $slider->status = $data['status'];

        //Them hinh anh vao folder
        $get_image = $request->image;
        $path = 'uploads/slider/';
        $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
        $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
        $get_image->move($path, $new_image);
        $slider->image = $new_image;

        $slider->save();
        return redirect()->route('slider.index')->with('status','Thêm slider thành công!');
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
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required|max:255',
                'status' => 'required'
            ],
            [
                'title.required' => 'Vui lòng điền tiêu đề danh mục',
                'description.required' => 'Vui lòng điền mô tả danh mục'
            ]
        );
        $slider = Slider::find($id);
        $slider->title = $data['title'];
        $slider->description = $data['description'];
        $slider->status = $data['status'];

        //Thêm hình ảnh vào folder và db
        $get_image = $request->image;

        //Nếu người dùng chọn ảnh khác thì mới update
        if($get_image){
            //Bỏ hình ảnh cũ
            $path_del = 'uploads/slider/'.$slider->image;
            if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì gỡ ảnh
                unlink($path_del);
            }
            //Thêm mới hình ảnh
            $path = 'uploads/slider/';
            $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
            $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
            $get_image->move($path, $new_image);
            $slider->image = $new_image;
        }
        $slider->save();
        return redirect()->back()->with('status','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        $path_del = 'uploads/slider/'.$slider->image;
        if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì xóa ảnh
            unlink($path_del);
        }
        $slider->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
