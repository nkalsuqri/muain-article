<?php

namespace App\Http\Controllers\Article;
use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $categories=ArticleCategory::all();
        return view('articles.article_category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.article_category.create');
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
            'category' => 'required|max:255',


        ]);

        ArticleCategory::create([
            "category"=>$request->category,
            "description"=>$request->description,
            "note"=>$request->note,


        ]);
        return back()
        ->with('success','You have successfully added .');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory,$id)
    {

        $categorie=ArticleCategory::find($id);
        if($categorie!=null){
                return view('articles.article_category.edit',compact('categorie'));
        }
        else{
            return redirect('/article/category/all');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $request->validate([
            'category' => 'required|max:255',


        ]);
        $articleCategory=ArticleCategory::find($request->id);

        $articleCategory->category=$request->category;
        $articleCategory->description=$request->description;
        $articleCategory->note=$request->note;
        $articleCategory->update();
        return redirect('/article/category/all')->with('success','You have successfully updated .');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory,$id)
    {
        $categorie=ArticleCategory::find($id);

        if($categorie!=null)
        {
        $categorie->destroy($id);
        return redirect('/article/category/all')->with('success','You have successfully Deleted .');;
        }
        else{
            return redirect('/article/category/all');

        }
    }
}
