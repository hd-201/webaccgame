<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $category = Category::orderBy('id', 'desc')->paginate(5);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
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
                'title.unique' => 'Tên danh mục đã có vui lòng điền tên khác',
                'title.required' => 'Vui lòng điền tiêu đề danh mục',
                'slug.unique' => 'Tên slug danh mục đã có vui lòng điền tên khác',
                'slug.required' => 'Vui lòng điền slug danh mục',
                'description.required' => 'Vui lòng điền mô tả danh mục',
                'image.required' => 'Vui lòng chọn hình ảnh',
            ]
        );


        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];

        //Them hinh anh vao folder
        $get_image = $request->image;
        $path = 'uploads/category/';
        $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
        $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
        $get_image->move($path, $new_image);
        $category->image = $new_image;

        $category->save();
        return redirect()->route('category.index')->with('status','Thêm danh mục thành công!');

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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
                'title.required' => 'Vui lòng điền tiêu đề danh mục',
                'slug.required' => 'Vui lòng điền slug danh mục',
                'description.required' => 'Vui lòng điền mô tả danh mục'
            ]
        );
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];

        //Thêm hình ảnh vào folder và db
        $get_image = $request->image;

        //Nếu người dùng chọn ảnh khác thì mới update
        if($get_image){
            //Bỏ hình ảnh cũ
            $path_del = 'uploads/category/'.$category->image;
            if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì gỡ ảnh
                unlink($path_del);
            }
            //Thêm mới hình ảnh
            $path = 'uploads/category/';
            $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
            $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
            $get_image->move($path, $new_image);
            $category->image = $new_image;
        }
        $category->save();
        return redirect()->back()->with('status','Thêm ảnh thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $path_del = 'uploads/category/'.$category->image;
        if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì xóa ảnh
            unlink($path_del);
        }
        $category->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
