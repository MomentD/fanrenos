<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Music;
use App\Models\Album;
use App\Models\Visitor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->user = new User;
        $this->article = new Article;
        $this->tag = new Tag;
        $this->comment = new Comment;
        $this->link = new Link;
        $this->music = new Music;
        $this->album = new Album;
        $this->visitor = new Visitor;
        $this->models = array('user','article','tag','comment','link','music','album');//存在软删除模型
    }

    /**
     * 首页
     * @return [type] [description]
     */
    public function index()
    {
        $today_s = date('Y-m-d 00:00:00',time());
        $today_e = date('Y-m-d 23:59:59',time());
        $data['user_count'] = $this->user->all()->count();
        $data['article_count'] = $this->article->all()->count();
        $data['comment_count'] = $this->comment->all()->count();
        $data['view_count'] = $this->article->all()->sum('view_count');
        $data['all_visitor_count'] = $this->visitor->all()->sum('clicks');
        $data['today_visitor_count'] = $this->visitor->where('created_at','>',$today_s)->orWhere(function($query) use ($today_s,$today_e){
            $query->where('updated_at','<',$today_e)->where('updated_at','>',$today_s);
        })->sum('clicks');
        return view('admin.home.index',$data);
    }

    /**
     * 访客记录
     * @return [type] [description]
     */
    public function getVisitor(){
        $visitor = $this->visitor->orderBy('updated_at','desc')->get()->toArray();
        return response()->json($visitor);
    }

    /**
     * 恢复被软删除的信息
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function recycle_normal($handle,$id){
        if(!in_array($handle, $this->models)){
            return redirect()->back()->withErrors('不存在的模型，请检查');
        }
        if($handle=='user' || $handle=='article'){
            $this->$handle->withoutGlobalScopes()->onlyTrashed()->where('id',(int)$id)->restore();
            //如果是用户信息，恢复后需要调整用户的状态
            if($handle=='user'){
                $this->user->withoutGlobalScopes()->where('id',(int)$id)->update(['status'=>1]);
            }
        }else{
            $this->$handle->onlyTrashed()->where('id',(int)$id)->restore();
        }

        return redirect('/dashboard/'.$handle.'/index')
                        ->withSuccess("恢复成功");
    }

    /**
     * 批量删除（只针对存在软删除的model）
     * @param  [type] $model [description]
     * @return [type]        [description]
     */
    public function batch_delete(Request $request,$model){
        if(!in_array($model, $this->models)){
            return redirect()->back()->withErrors('不存在的模型，请检查');
        }
        $pid = $request->get('pid');
        $id_arr = explode(',', $pid);

        $this->$model->destroy($id_arr);

        return response()->json(['status'=>'success']);
    }
}
