<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\Category;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::pluck('name','id')->all();   
       return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();
        
        if($file=$request->file('image')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $input['image']= $name;
        }
        
        $user->post()->create($input);
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name','id')->all(); 
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $input = $request->all();
        
        if($file=$request->file('image')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $input['image']= $name;
        }
        
        Post::find($id)->update($input);
        return redirect(route('posts.index'));
    } 
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        
         unlink(public_path().'/images/'. $post->image);
        $post->delete();
        
       
        Session::flash('delete_message','post successfully deleted');
        return redirect(route('posts.index'));
    }
    
    public function post($id){
        $post = Post::find($id);
         $categories = Category::all();
        return view('post',compact('post','categories'));
    }
    
    public function postsDelete(Request $request){
        $posts = $request->checkBoxes;
       
        foreach($posts as $post){
            Post::find($post)->delete();
        }
        
        return redirect(route('posts.index')); 
        
    }
    
    public function posts(){
        $posts = Post::paginate(5);
         $categories = Category::all();
        return view('posts', compact('posts','categories'));
    }
}
