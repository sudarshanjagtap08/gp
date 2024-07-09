<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Category;
use App\Models\Blogtag;
use App\Models\Tag;
use App\Models\Blogseo;
use App\Models\Toparea;
use Illuminate\Http\Request;
use auth;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkSession');
    }
    public function index(Request $request)
    {
        $blogs = Blog::with('blogcategories.categories','blogtags.tags')->get();
        return view('list/blog/index', compact('blogs'));
    }
    public function AddBlog(Request $request)
    {
        $category = Category::all();
        $tag = Tag::pluck('name');
        return view('list/blog/addblog', compact('category','tag'));
    }
    public function SaveBlog(Request $request)
    {  
        $title = $request->input('title');
        $tagText = $request->input('tags');    
        $tagIds = [];
            foreach ($tagText as $tagName) 
            {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }    
        $categories = $request->input('categories');
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d');
        $blog = new Blog;
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description = $request->input('description');
        // $blog->tags = implode(',', $tagIds);

        $blog->date = $date;
        
        if (request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $blog->image = $filename;
            $destinationPath = './images/blog';
            $image->move($destinationPath , $filename);
        }
        
        $blog->save();
        $lastInsertedId = $blog->id;
        $category_ids = explode(',', $categories);
        foreach ($category_ids  as $category_id) 
        {
            $blog_catagory = new Blogcategory;
            $blog_catagory->blog_id = $lastInsertedId;
            $blog_catagory->category_id  = $category_id;
            $blog_catagory->save();
        } 

        foreach ($tagIds as $tagId) {
            $tag = new Blogtag;
            $tag->blog_id = $lastInsertedId;
            $tag->tag_id = $tagId; 
            $tag->save();
        }
        return redirect()->route('list.blog')->with('success', 'Blog Inserted successfully');
        // return redirect()->route('list.blog');
    }
    public function UpdateBlog(Request $request)
    {  
        $title = $request->input('title');
        $tagText = $request->input('tags');    
        $tagIds = [];
            foreach ($tagText as $tagName) 
            {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }    
        $categories = $request->input('categories');
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d');
        $blog_id = $request->input('blog_id');        
        $blog = Blog::findOrFail($blog_id);
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description = $request->input('description');
        $blog->date = $date;
        if(request()->hasFile('image')){
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $blog->image = $filename;
            $destinationPath = './images/blog';
            $image->move($destinationPath , $filename);
        }
        
        $blog->save();        
        $lastInsertedId = $blog->id;
        $category_ids = explode(',', $categories);        
        if (!empty($category_ids)) {
            $blog->blogcategories()->delete();
                foreach ($category_ids  as $category_id) 
                {
                    $blog_catagory = new Blogcategory;
                    $blog_catagory->blog_id = $lastInsertedId;
                    $blog_catagory->category_id  = $category_id;
                    $blog_catagory->save();
                } 
            }
            if (!empty($tagIds)) {
                $blog->blogtags()->delete();
                foreach ($tagIds as $tagId) {
                    $tag = new Blogtag;
                    $tag->blog_id = $lastInsertedId;
                    $tag->tag_id = $tagId; 
                    $tag->save();
                }
            }
        return redirect()->route('list.blog')->with('success', 'Blog updated successfully');
    }
    // public function saveFile(Request $request)
    // {
    //     $file = $request->file('file'); 
    //     if ($file) {
    //         $uploadPath = public_path('/images');
    //         $fileName = $file->getClientOriginalName();
    //         $file->move($uploadPath, $fileName);
    //         echo "File uploaded successfully.";exit;
    //     } else {
    //         echo "Error uploading the file.";
    //     }
    // }
    public function BlogEdit(Request $request, $id)
    {
        $blogs = Blog::with('blogcategories.categories','blogtags.tags')
                    ->findOrFail($id);
        $category = Category::all();
        $tag = Tag::pluck('name');
        
        return view('list/blog/edit', compact('blogs','category','tag'));
    }
    public function SEOBlog(Request $request, $id)
    {        
        // $imgesdata = Image::where('property_id',$id)->get();
        $blogdata = Blog::with('blogseos')
                            ->findOrFail($id);
        // print_r($blogdata);exit;
        $blogid = $id;        
        return view('list/blog/blog_seo', compact('blogid','blogdata'));
    }
    public function SEOBlogSave(request $request)
    {
        $blogId = $request->input('blog_id');
        $blogseos = Blogseo::firstOrNew(['blog_id' => $blogId]);    
        $blogseos->metatitle = $request->input('metatitle');
        $blogseos->metadescription = $request->input('metadescription');
        $blogseos->metakeyword = $request->input('metakeyword');
        $blogseos->canonical = $request->input('canonical');
        $blogseos->schemacode = $request->input('schemacode');    
        $blogseos->save();  
        // $altTags = $request->input('alt_tags', []);
        // $imgIds = $request->input('imgid', []);

        // foreach ($imgIds as $key => $imgId) {
        //     $propertyImage = Image::findOrFail($imgId);
        //     $propertyImage->alt_tag = $altTags[$key] ?? null;
        //     $propertyImage->save();
        // }
        return redirect()->back()
            ->with('success', 'Blog created successfully.');
    }
}
