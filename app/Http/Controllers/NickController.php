<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Category;
use App\Models\Accessory;

class NickController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nicks = Nick::with('category')->withCount('gallery')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.nick.index', compact('nicks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('admin.nick.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $attribute = [];
        foreach($data['attribute'] as $key => $attri){
            foreach($data['name_attribute'] as $key2 => $name_attri){
                if($key==$key2){
                    $attribute[] = $name_attri.':'.$attri;
                }
            }
        } 
        $nick = new Nick();
        $nick->title = $data['title'];
        $nick->attribute = json_encode($attribute, JSON_UNESCAPED_UNICODE);
        $nick->category_id = $data['category_id'];
        $nick->price = $data['price'];
        $nick->status = $data['status'];
        $nick->description = $data['description'];
        $nick->code = random_int(100000, 999999);

        //Them hinh anh vao folder
        $get_image = $request->image;
        $path = 'uploads/nick/';
        $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
        $name_image = current(explode('.', $get_name_image)); //hinh123.png -> tách dấu chấm và lấy ra hinh123
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
        $get_image->move($path, $new_image);
        $nick->image = $new_image;

        $nick->save();
        return redirect()->route('nick.index')->with('status','Thêm danh mục thành công!');
    }
    public function choose_category(Request $request){
        $data = $request->all();
        $access = Accessory::where('category_id',$data['category_id'])->where('status', 1)->get();
        $result = '';
        foreach($access as $key => $value){
            $result.='<div class="form-group">
            <label for="exampleInputEmail1">'.$value->title.'</label>
            <input type="hidden" value="'.$value->title.'" name="name_attribute[]" >
            <input name="attribute[]" class="form-control" required>
        </div>';
        }
        return response()->json([
            'result' => $result,
            'message' => 'success'
        ]);
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
        $nick = Nick::find($id);
        $categories = Category::orderBy('id','DESC')->get();
        
        return view('admin.nick.edit', compact('nick','categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $nick = Nick::find($id);
        $nick->title = $data['title'];
        $nick->attribute = $data['attribute'];
        $nick->price = $data['price'];
        $nick->status = $data['status'];
        $nick->description = $data['description'];
        $nick->code = random_int(100000, 999999);

        //Thêm hình ảnh vào folder và db
        $get_image = $request->image;

        //Nếu người dùng chọn ảnh khác thì mới update
        if($get_image){
            //Bỏ hình ảnh cũ
            $path_del = 'uploads/nick/'.$nick->image;
            if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì gỡ ảnh
                unlink($path_del);
            }
            //Thêm mới hình ảnh
            $path = 'uploads/nick/';
            $get_name_image = $get_image->getClientOriginalName(); // -> hinh123.png
            $name_image = current(explode('.', $get_name_image));//hinh123.png -> tách dấu chấm và lấy ra hinh123
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); // lấy hinh123 random thêm 2 số vào sau và gắn đuôi .png
            $get_image->move($path, $new_image);
            $nick->image = $get_name_image;
        }

        $nick->save();
        return redirect()->route('nick.index')->with('status','Sửa danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nick = Nick::find($id);
        $path_del = 'uploads/nick/'.$nick->image;
        if(file_exists($path_del)){ //Nếu tồn tại đường dẫn thì xóa ảnh
            unlink($path_del);
        }
        $nick->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
