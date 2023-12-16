<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $blog = Blog::orderBy('id', 'desc')->paginate(5);
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
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
                'content' => 'required',
                'type' => 'required',
                'status' => 'required'
            ],
            [
                'title.unique' => 'Tên danh mục đã có vui lòng điền tên khác',
                'title.required' => 'Vui lòng điền tiêu đề danh mục',
                'slug.unique' => 'Tên slug danh mục đã có vui lòng điền tên khác',
                'slug.required' => 'Vui lòng điền slug danh mục',
                'description.required' => 'Vui lòng điền mô tả danh mục',
                'content.required' => 'Vui lòng điền nội dung',
                'type.required' => 'Vui lòng chọn kiểu',
                'image.required' => 'Vui lòng chọn hình ảnh',
            ]
        );


        $blog = new blog();
        $blog->title = $data['title'];
        $blog->slug = $data['slug'];
        $blog->description = $data['description'];
        $blog->content = $data['content'];
        $blog->status = $data['status'];
        $blog->type = $data['type'];

        //Them hinh anh vao folder
        $get_image = $request->image;
        $path = 'uploads/blog/';
        $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
        $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
        $get_image->move($path, $new_image);
        $blog->image = $new_image;

        $blog->save();
        return redirect()->route('blog.index')->with('status','Thêm blog thành công!');

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
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $blog = blog::find($id);
        $blog->title = $data['title'];
        $blog->slug = $data['slug'];
        $blog->description = $data['description'];
        $blog->content = $data['content'];
        $blog->status = $data['status'];
        $blog->type = $data['type'];

        //Thêm hình ảnh vào folder và db
        $get_image = $request->image;

        //Nếu người dùng chọn ảnh khác thì mới update
        if($get_image){
            //Bỏ hình ảnh cũ
            $path_del = 'uploads/blog/'.$blog->image;
            if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì gỡ ảnh
                unlink($path_del);
            }
            //Thêm mới hình ảnh
            $path = 'uploads/blog/';
            $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
            $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
            $get_image->move($path, $new_image);
            $blog->image = $new_image;
        }
        $blog->save();
        return redirect()->back()->with('status','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = blog::find($id);
        $path_del = 'uploads/blog/'.$blog->image;
        if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì xóa ảnh
            unlink($path_del);
        }
        $blog->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
