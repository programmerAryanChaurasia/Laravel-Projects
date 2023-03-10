<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {   
        $data = Product::all();
        /* echo "<pre>";
        print_r($data[1]['image']);
        die(); */
        return view('admin.product',['data'=>$data]);
    }

    public function manage_product($id='')//id ka default value null diya h because manage category page par error nahi aaye.
    {
        if($id>0){
            $arr = Product::where(['id'=>$id])->get();

            $result['name']=$arr['0']->name;
            $result['slug']=$arr['0']->slug;
            $result['categort_id']=$arr['0']->categort_id;
            $result['brand']=$arr['0']->brand;
            $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['technical_specification']=$arr['0']->technical_specification;
            $result['uses']=$arr['0']->uses;
            $result['Warranty']=$arr['0']->Warranty;
            $result['image']=$arr['0']->image;
            $result['id']=$arr['0']->id;

            /* Attribute updation start */
            $result['productAttrArr']=DB::table('products_attr')->where(['products_id'=>$id])->get();

            $productImagesArr=DB::table('product_images')->where(['products_id'=>$id])->get();
            if(!isset($$productImagesArr[0])){
                $result['productImagesArr'][0]['id']='';
                $result['productImagesArr'][0]['images']='';
            }
            else{
                $result['productImagesArr']=$productImagesArr;
            }

            /*Attribute updation end */
        }
        else{
            $result['name']='';
            $result['slug']='';
            $result['categort_id']='';
            $result['brand']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['uses']='';
            $result['Warranty']='';
            $result['image']='';
            $result['id']='';

            /* Attribute updation start */
            $result['productAttrArr'][0]['id']='';/* new */
            $result['productAttrArr'][0]['sku']='';
            $result['productAttrArr'][0]['mrp']='';
            $result['productAttrArr'][0]['price']='';
            $result['productAttrArr'][0]['size_id']='';
            $result['productAttrArr'][0]['color_id']='';
            $result['productAttrArr'][0]['qty']='';
            $result['productAttrArr'][0]['attr_image']='';
            $result['productAttrArr'][0]['products_id']='';
            /*Attribute updation end */
            /*Product Attribute Image */
           
        }
/*         echo '<pre>';
        print_r($result['productAttrArr']);
        die();
 */
        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        $result['sizes']=DB::table('sizes')->where(['status'=>1])->get();
        $result['colors']=DB::table('colors')->where(['status'=>1])->get();
       /*  echo '<pre>';
        print_r($result['category']);
        die(); */
        return view('admin.manage_product',$result);
    }

    public function manage_product_process(Request $request)
    {
        /* echo "<pre>";
        print_r($request->mrp[3]);
        die(); */
        
        if($request->id>0){
            $image_validation='mimes:jpeg,jpg,png';
        }
        else{
            $image_validation='required|mimes:jpeg,jpg,png';
        }

        $request->validate([
            'name'=>'required',
            'image'=>$image_validation,
            'slug' => 'required|unique:products,slug'/* .$request->post('id')  */,
            'attr_image.*'=>'mimes:jpeg,jpg,png'  
        ]);
        if($request->post('id')>0)
        {
            $model = Product::find($request->id);
            $msg="Product Updated";
        }
        else {
            $model = new Product;
            $msg="Data inserted Successfully!";
        }
     

            $model->name=$request->name;
            $model->slug=$request->slug;
            $model->categort_id=$request->categort_id;
            $model->brand=$request->brand;
            $model->model=$request->model;
            $model->short_desc=$request->short_desc;
            $model->desc=$request->desc;
            $model->keywords=$request->keywords;
            $model->technical_specification=$request->technical_specification;
            $model->uses=$request->uses;
            $model->Warranty=$request->Warranty;
            $model->image=$request->image;
            $model->status = 1;    
               
        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }       
        $model->save(); 
        $pid=$model->id;
       
        /* product attribute start */
        $paidpArr=$request->paid;/* new */
        $skuArr=$request->sku;
        $mrpArr=$request->mrp;
        $priceArr=$request->price;
        $sizeIdArr=$request->size_id;
        $colorIdArr=$request->color_id;
        $qtyArr=$request->qty;

        /* echo "<pre>";
        print_r($paidpArr);
        die(); */

        foreach ($skuArr as $key => $value) {
            $productAttributeArr['products_id']=$pid;
            $productAttributeArr['sku']=$skuArr[$key];
            $productAttributeArr['mrp']=$mrpArr[$key];
            $productAttributeArr['price']=$priceArr[$key];
            $productAttributeArr['qty']=$qtyArr[$key];
            if($sizeIdArr[$key]==''){
                $productAttributeArr['size_id']=0;
            }
            else{
                $productAttributeArr['size_id']=$sizeIdArr[$key];
            }
            if($colorIdArr[$key]==''){
                $productAttributeArr['color_id']=0;
            }
            else{
                $productAttributeArr['color_id']= $colorIdArr[$key];
            }
            if($request->hasfile("attr_image.$key")){
                $rand=rand('111111111','999999999');
                $attr_image=$request->file("attr_image.$key");
                $ext=$attr_image->extension();
                $image_name=$rand.'.'.$ext;//Not use here time() method for inserting image because if more then one image are inserting then it save same name for all images and only one image save in database.
                $request->file("attr_image.$key")->storeAs('/public/media',$image_name);
                $productAttributeArr['attr_image']=$image_name;
            }
            else{
                $productAttributeArr['attr_image']='';
            }

            if($paidpArr[$key]!=''){
                DB::table('products_attr')->where(['id'=>$paidpArr[$key]])->update($productAttributeArr);
            }
            else{
                DB::table('products_attr')->insert( $productAttributeArr);
            }
            
        }
        /*  product attribute end   */

        session()->flash('message',$msg);
        return redirect()->route('product');
    }
    
    public function delete(Request $request,$id)
    {
        Product::destroy($id);
        session()->flash('message','Data Deteted Successfully');
        return redirect()->route('product');
        
    } 
    public function product_attr_delete(Request $request,$pAId,$pId)
    {

        DB::table('products_attr')->where(['id'=>$pAId])->delete();
        return redirect('admin/product/manage_product/'.$pId);
        
    } 
    public function product_images_delete(Request $request,$piId,$pId)
    {

        DB::table('product_images')->where(['id'=>$piId])->delete();
        return redirect('admin/product/manage_product/'.$pId);
        
    } 
    public function status(Request $request,$status,$id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('message','Product Status Updated!!');
        return redirect()->route('product');

      
    } 
}
