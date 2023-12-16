<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $service = Service::orderBy('id', 'desc')->paginate(5);
        return view('admin.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:categories|max:255',
                'slug' => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'status' => 'required'
            ],
            [
                'title.unique' => 'Tên dịch vụ đã có vui lòng điền tên khác',
                'title.required' => 'Vui lòng điền tiêu đề dịch vụ',
                'slug.unique' => 'Tên slug dịch vụ đã có vui lòng điền tên khác',
                'slug.required' => 'Vui lòng điền slug dịch vụ',
                'description.required' => 'Vui lòng điền mô tả dịch vụ',
                'image.required' => 'Vui lòng chọn hình ảnh',
            ]
        );


        $service = new Service();
        $service->title = $data['title'];
        $service->slug = $data['slug'];
        $service->description = $data['description'];
        $service->status = $data['status'];

        //Them hinh anh vao folder
        $get_image = $request->image;
        $path = 'uploads/service/';
        $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
        $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
        $get_image->move($path, $new_image);
        $service->image = $new_image;

        $service->save();
        return redirect()->route('service.index')->with('status','Thêm dịch vụ thành công!');

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
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
                'status' => 'required'
            ],
            [
                'title.required' => 'Vui lòng điền tiêu đề dịch vụ',
                'slug.required' => 'Vui lòng điền slug dịch vụ',
                'description.required' => 'Vui lòng điền mô tả dịch vụ'
            ]
        );
        $service = Service::find($id);
        $service->title = $data['title'];
        $service->slug = $data['slug'];
        $service->description = $data['description'];
        $service->status = $data['status'];

        //Thêm hình ảnh vào folder và db
        $get_image = $request->image;

        //Nếu người dùng chọn ảnh khác thì mới update
        if($get_image){
            //Bỏ hình ảnh cũ
            $path_del = 'uploads/service/'.$service->image;
            if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì gỡ ảnh
                unlink($path_del);
            }
            //Thêm mới hình ảnh
            $path = 'uploads/service/';
            $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
            $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
            $get_image->move($path, $new_image);
            $service->image = $new_image;
        }
        $service->save();
        return redirect()->back()->with('status','Thêm ảnh thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $path_del = 'uploads/service/'.$service->image;
        if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì xóa ảnh
            unlink($path_del);
        }
        $service->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
