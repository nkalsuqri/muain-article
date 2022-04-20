<?php

namespace App\Http\Controllers\Article;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('articles.articles.all',compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=ArticleCategory::all();
        return view('articles.articles.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        if($request->hasFile('icon')){
            $file=$request->icon;
            //$new_file=time().$file->getClientOriginalName();
            $imageName = time().'.'.$request->icon->extension();

            $file->move(public_path('files'), $imageName);
        }
        Article::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "category_id"=>$request->category_id,
            "note"=>$request->note,
            "icon"=>'files/'.$imageName,


        ]);
        return back()
        ->with('success','You have successfully added .')
        ->with('image',$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article,$id)
    {
        $article=Article::find($id);
        $categories=ArticleCategory::all();

        if($article!=null){
            return view('articles.articles.edit',compact('article','categories'));

        }
        else{
            return redirect('/articles');

        }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //dd($request);
        //return;

        $article=Article::find($request->id);
        if($request->hasFile('icon')){
            $file=$request->icon;
            //$new_file=time().$file->getClientOriginalName();
            $imageName = time().'.'.$request->icon->extension();
            $file->move(public_path('files'), $imageName);

            $article->icon='files/'.$imageName;

        }
        $article->title=$request->title;
        $article->description=$request->description;
        $article->category_id=$request->category_id;
        $article->note=$request->note;

        $article->update();
        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article,$id)
    {
        $atticle=Article::find($id);

        if($atticle!=null)
        {
        $atticle->destroy($id);
        return redirect('/articles')->with('success','You have successfully Deleted .');;
        }
        else{
            return redirect('/articles');

        }
    }
}
