<?php

namespace App\Http\Controllers;
use App\Models\ImageModel;
use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;



class ImageUploadController extends Controller
{
    public function showUploadForm(){
        return view('image');
    }


    public function uploadImgProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $product = new product;
        $product->Pname = $request->input('name');
        $product->price = $request->input('price');
        $product->cateid = $request->input('cate');
        $product->save();
  
    
        // Kiểm tra xem người dùng đã tải lên ảnh chưa
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $image = new Image;
            $image->name = $request->file('image')->getClientOriginalName();
            $image->url = $imagePath;
        
            // Kiểm tra xem có sản phẩm nào tương ứng không
            if ($product) {
                $product->images()->save($image);
            } else {
                // Xử lý lỗi nếu sản phẩm không tồn tại
            }
        }
        
    }
    public function showImage($id)
    {
        $image = ImageModel::find($id);
        return view('showImage', compact('image'));
    }
        


}
