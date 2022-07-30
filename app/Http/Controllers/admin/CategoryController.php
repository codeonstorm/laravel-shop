<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $result['data']=Category::Paginate(5);
        return view('admin/category',$result);
    }


    public function manage_category(Request $request,$slug='')
    {
        if($slug!=''){
           $arr=Category::where(['slug'=>$slug])->get();
           if(empty($arr[0])){
             $request->session()->flash('message','category not exists');
             return redirect('admin/category');
           }

            $result['category_name']=$arr['0']->name;
            $result['category_slug']=$arr['0']->slug;
            $result['parent_category_id']=$arr['0']->parent_id;
            $result['category_image']=$arr['0']->img;
            $result['is_home']=$arr['0']->is_home;
            $result['is_home_selected']="";
            if($arr['0']->is_home==1){
                $result['is_home_selected']="checked";
            }
            $result['id']=$arr['0']->id;
                $result['is_edit']=1;

            $result['categories']=Category::where(['status'=>1])->where('id','!=',$result['id'])->get();
        }else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['parent_category_id']='';
            $result['category_image']='';
            $result['is_home']="";
            $result['is_home_selected']="";
            $result['id']=0;
            $result['is_edit']=0;

            $result['categories']=Category::where(['status'=>1])->get();

        }

        return view('admin/manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
      //  return $request->file( );
       if($request->add) $request->flash();
        $request->validate([
            'category_name'=>'required',
            'category_image'=>'mimes:jpeg,jpg,png',
            'parent_category'=>'required|integer',
            'category_slug'=>'required|unique:categories,slug,'.$request->post('id'),
        ]);
      if($request->parent_category>0){
        $request->validate(['parent_category'=>'exists:categories,id']);
      }

        if($request->has('update') && $request->post('id')>0){
          $model=Category::find($request->post('id'));
          if(empty($model)){
            $request->session()->flash('message','something goes rong!');
            return redirect('admin/category/manage_category/');
          }
              $msg="Category updated";
        }else{
            $model=new Category();
            $request->validate(['category_image'=>'required']);
            $msg="Category inserted";
        }

        if($request->hasfile('category_image')){

            if($request->post('id')>0){
                $arrImage=Category::where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/category/'.$arrImage[0]->category_image)){
                    Storage::delete('/public/media/category/'.$arrImage[0]->category_image);
                }
            }

            $image=$request->file('category_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/category',$image_name);
            $model->img=$image_name;
        }
        $model->name=$request->post('category_name');
        $model->slug=$request->post('category_slug');
        $model->parent_id=$request->post('parent_category');
        $model->is_home=0;
        if($request->post('is_home')!==null){
            $model->is_home=1;
        }
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');

    }

    public function delete(Request $request,$slug){
      $check = Category::where('slug', $slug);
      if($check->doesntExist()){
        $request->session()->flash('message','Category does\'nt exits');
        return redirect('admin/category');
      }
        $model=Category::find($check->value('id'));
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('admin/category');
    }

    public function status(Request $request,$status,$slug){
        $check = Category::where('slug', $slug);
        if($check->doesntExist()){
          $request->session()->flash('message','Category does\'nt exits');
          return redirect('admin/category');
        }
        $model=Category::find($check->value('id'));

        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('admin/category');
    }
}
