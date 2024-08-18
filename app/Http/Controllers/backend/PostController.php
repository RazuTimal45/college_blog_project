<?php
namespace App\Http\Controllers\backend;


use Illuminate\Http\Request;
use App\Models\backend\Post;
use App\Models\backend\Category;
use App\Models\backend\Tag;
use App\Http\Requests\backend\PostRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class PostController extends BackendBaseController
{
    protected $panel = 'Post';
    protected $base_route = 'backend.posts.';
    protected $base_view = 'backend.posts.';
    protected $model;
    // protected $recommendationService;

    function __construct()
    {
        $this->model = new Post();
        // $this->recommendationService = $recommendationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = $this->model->orderBy('rank', 'asc')->get();

        if ($data['records']->isEmpty()) {
            Alert::error('No Data', 'No Data found');
            return redirect()->route($this->base_route . 'create');
        }

        return view($this->__loadToView($this->base_view . 'index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::pluck('name', 'id');
        $data['tags'] = Tag::active()->pluck('name', 'id');

        return view($this->__loadToView($this->base_view . 'create'), compact('data'));
    }

    /**
     * Check if the title already exists.
     */
    public function checkTitle(Request $request)
    {
        $title = $request->title;

        if ($title) {
            $existingTitles = $this->model->where('title', $title)->get();

            if ($existingTitles->isNotEmpty()) {
                return response()->json(['message' => 'exist']);
            }

            return response()->json(['message' => 'nodata']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

     protected function generateTagsFromDescription($description)
     {
         // Tokenize the description into words
         $words = str_word_count(strtolower(strip_tags($description)), 1);
 

         $wordCounts = array_count_values($words);
 

         arsort($wordCounts);
 
         $stopWords = ['the', 'and', 'a', 'to', 'of', 'in', 'with', 'on', 'for', 'is', 'that','you', 'more','your','she','he'];
         $tags = array_diff(array_keys($wordCounts), $stopWords);
 
         return array_slice($tags, 0, 5);
     }
     public function store(PostRequest $request)
     {
         DB::beginTransaction();
         try {
             $request->request->add(['slug' => Str::slug($request->input('title'))]);
             $request->request->add(['created_by' => auth()->user()->id]);
             $request->request->add(['user_id' => auth()->user()->id]);
 
             if ($request->hasFile('image_file')) {
                 $image = $request->file('image_file');
                 $imageFilename = uniqid() . '.' . $image->getClientOriginalExtension();
                 $image->move('images/posts/', $imageFilename);
                 $request->request->add(['image' => $imageFilename]);
             }
 
             $request->request->add(['content' => $request->input("description")]);
             $post = $this->model->create($request->all());
 
             // Generate tags from the description
             $tags = $this->generateTagsFromDescription($request->input("description"));
 
             foreach ($tags as $tagName) {
                 $tag = Tag::firstOrCreate(['name' => $tagName]);
                 $post->tags()->attach($tag->id);
             }
 
             DB::commit();
             Alert::success('Success', $this->panel . ' Added successfully');
         } catch (\Exception $exception) {
             DB::rollBack();
             Alert::error('Error', 'Oops....Error occurred: ' . $exception->getMessage());
         }
 
         return redirect()->route($this->base_route . 'index');
     }
 
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['record']=$this->model->find($id);
        if(!$data['record']){
            Alert::error('No Data','Data Not Found');
            return view($this->__loadToView($this->base_view.'index'));
        }else{
            return view($this->__loadToView($this->base_view.'show'),compact('data'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the record to be edited
        $record = $this->model->find($id);
    

        if (!$record) {
            Alert::error('No Data', 'No Data Found');
            return redirect()->route($this->base_route . 'index');
        }
    

        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
    
        
        $assigned_tags = $record->tags->pluck('id')->toArray(); 
    
        $data = [
            'record' => $record,
            'categories' => $categories,
            'tags' => $tags,
            'assigned_tags' => $assigned_tags, 
        ];

        return view($this->__loadToView($this->base_view . 'edit'), compact('data'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        // dd($request->input('tags'));
        $data['records']=$this->model->find($id);
        $request->request->add(['updated_by' => auth()->user()->id]);
        if($request->hasfile('image_file')) {
            $filename = uniqid() . '.' . $request->file('image_file')->getClientOriginalExtension();
            $request->file('image_file')->move('images/posts/', $filename);
            $request->request->add(['image' => $filename]);
            if ($data['records']->image && file_exists(public_path('images/posts/' . $data['records']->image))) {
                unlink(public_path('images/posts/' . $data['records']->image));
            }
        }
            $d=$data['records']->update($request->all());
            if($d){
                $data['records']->categories()->sync($request->input("categories"));
                $data['records']->tags()->sync($request->input("tag_id"));
                Alert::success('success',$this->panel.' updated successfully');
            }else{
                Alert::error('error','Oops... error occurred');
            }
            return redirect()->route($this->base_route.'index');
    }
    public function destroy(string $id)
    {
        $data=$this->model->find($id);
        $d=$data->delete();
        if($d){
            Alert::success('success',$this->panel.' deleted success');
        }else{
            Alert::error('error','Oops... something went wrong');
        }
        return redirect()->route($this->base_route.'index');
    }
    public function trash(){
        $data['records']=$this->model->onlyTrashed()->get();
        if(count($data['records'])<1){
            Alert::error('No Data','No Trash Data Found');
            return redirect()->route($this->base_route.'index');
        }
        return view($this->__loadToView($this->base_view.'trash'),compact('data'));
    }
    public function permanentDelete($id){
        $data['record']=$this->model->where('id',$id)->onlyTrashed()->first();
        if ($data['record']->image && file_exists(public_path('images/posts/' . $data['record']->image))) {
            unlink(public_path('images/posts/' . $data['record']->image));
        }
        if(!$data['record']){
            Alert::error('error','Oops ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        if($data['record']->forceDelete()){
            Alert::success('success', $this->panel. ' Deleted Permanently');
        } else {
            Alert::error('error','Oops ... error occurred while deleting record');
        }
        return redirect()->route($this->base_route.'index');
    }
    public function restore($id){
        $data['record']=$this->model->where('id',$id)->onlyTrashed()->first();
        if (!$data['record']){
            Alert::error('error','Oops ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        if($data['record']->restore()){
            Alert::success('success', $this->panel . ' Recovered Successfully');
        } else {
            Alert::error('error','Oops ... error occurred while recovering record');
        }
        return redirect()->route($this->base_route . 'index');
    }
}
