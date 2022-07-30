<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
  public function index()
  {
      $result['data']=Size::Paginate(5);
      return view('admin/size',$result);
  }


  public function manage_size(Request $request,$slug='')
  {
      if($slug!=''){
         $arr=Size::where(['size'=>$slug])->get();
         if(empty($arr[0])){
           $request->session()->flash('message','size not exists');
           return redirect('admin/size');
         }

          $result['size']=$arr['0']->size;
          $result['id']=$arr['0']->id;
          $result['is_edit']=1;
      }else{
          $result['size']='';
          $result['id']=0;
          $result['is_edit']=0;
      }

      return view('admin/manage_size',$result);
  }

  public function manage_size_process(Request $request)
  {
  //   return $request->post( ); die;
     if($request->add) $request->flash();
      $request->validate([
          'size'=>'required|unique:sizes,size,'.$request->post('id'),
      ]);

      if($request->has('update') && $request->post('id')>0){
        $model=size::find($request->post('id'));
        if(empty($model)){
          $request->session()->flash('message','something goes rong!');
          return redirect('admin/size/manage_category/');
        }
            $msg="size updated";
      }else{
          $model=new size();
          $msg="size inserted";
      }

      $model->size=$request->post('size');
      $model->status=1;
      $model->save();
      $request->session()->flash('message',$msg);
      return redirect('admin/size');

  }

  public function delete(Request $request,$slug){
    $check = Size::where('size', $slug);
    if($check->doesntExist()){
      $request->session()->flash('message','size does\'nt exits');
      return redirect('admin/size');
    }
      $model=Size::find($check->value('id'));
      $model->delete();
      $request->session()->flash('message','size deleted');
      return redirect('admin/size');
  }

  public function status(Request $request,$status,$slug){
      $check = Size::where('size', $slug);
      if($check->doesntExist()){
        $request->session()->flash('message','size does\'nt exits');
        return redirect('admin/size');
      }
      $model=Size::find($check->value('id'));

      $model->status=$status;
      $model->save();
      $request->session()->flash('message','size status updated');
      return redirect('admin/size');
  }
}
