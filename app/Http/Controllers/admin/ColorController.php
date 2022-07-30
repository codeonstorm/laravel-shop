<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
  public function index()
  {
      $result['data']=Color::Paginate(5);
      return view('admin/color',$result);
  }


  public function manage_color(Request $request,$slug='')
  {
      if($slug!=''){
         $arr=Color::where(['name'=>$slug])->get();
         if(empty($arr[0])){
           $request->session()->flash('message','color not exists');
           return redirect('admin/color');
         }

          $result['name']=$arr['0']->name;
          $result['code']=$arr['0']->code;

          $result['id']=$arr['0']->id;
          $result['is_edit']=1;
      }else{
          $result['name']='';
          $result['code']='';
          $result['id']=0;
          $result['is_edit']=0;
      }

      return view('admin/manage_color',$result);
  }

  public function manage_color_process(Request $request)
  {
    //  return $request->file( );
     if($request->add) $request->flash();
      $request->validate([
          'code'=>'required',
          'name'=>'required|unique:colors,name,'.$request->post('id'),
      ]);

      if($request->has('update') && $request->post('id')>0){
        $model=Color::find($request->post('id'));
        if(empty($model)){
          $request->session()->flash('message','something goes rong!');
          return redirect('admin/color/manage_color/');
        }
            $msg="color updated";
      }else{
          $model=new Color();
          $msg="color inserted";
      }

      $model->name=$request->post('name');
      $model->code=$request->post('code');
      $model->status=1;
      $model->save();
      $request->session()->flash('message',$msg);
      return redirect('admin/color');

  }

  public function delete(Request $request,$slug){
    $check = Color::where('name', $slug);
    if($check->doesntExist()){
      $request->session()->flash('message','color does\'nt exits');
      return redirect('admin/color');
    }
      $model=Color::find($check->value('id'));
      $model->delete();
      $request->session()->flash('message','color deleted');
      return redirect('admin/color');
  }

  public function status(Request $request,$status,$slug){
      $check = Color::where('name', $slug);
      if($check->doesntExist()){
        $request->session()->flash('message','color does\'nt exits');
        return redirect('admin/color');
      }
      $model=Color::find($check->value('id'));

      $model->status=$status;
      $model->save();
      $request->session()->flash('message','color status updated');
      return redirect('admin/color');
  }
}
