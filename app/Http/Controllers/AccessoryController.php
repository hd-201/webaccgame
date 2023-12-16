<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Category;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = Accessory::with('category')->orderBy('id', 'desc')->paginate(10);
        return view('admin.accessory.index', compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.accessory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $access = new Accessory();
        $access->title = $data['title'];
        $access->status = $data['status'];
        $access->category_id = $data['category_id'];
        $access->save();
        return redirect()->route('accessory.index')->with('status','Thêm phụ kiện thành công!');
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
        $accessory = Accessory::find($id);
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.accessory.edit', compact('accessory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $access = Accessory::find($id);
        $access->title = $data['title'];
        $access->status = $data['status'];
        $access->category_id = $data['category_id'];
        $access->save();
        return redirect()->back()->with('status','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $access = Accessory::find($id);
        $access->delete();
        return redirect()->back()->with('status','Xóa thành công!');
    }
}
