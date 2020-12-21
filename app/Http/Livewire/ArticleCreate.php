<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Article;
use App\Models\Tag;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleCreate extends Component
{
    use WithFileUploads;

	public $headline;
	public $subheadline;
	public $image;
    public $body;
	public $category;
	public $subcategory;
	public $tags;
    public $newTag;

    protected $rules = [
        'headline' => ['required', 'min:12', 'max:150'],
        'subheadline' => ['required', 'min:50', 'max:300'],
        'image' => ['required', 'mimes:jpeg, png'],
        'body' => ['required', 'min:240', 'max:20000'],
        'category' => ['required'],
        'subcategory' => ['required'],
    ];

    public function mount()
    {
        $this->tags = collect();
    }

	public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addTag()
    {
        if(!$this->tags->contains($this->newTag)) {
            $this->tags->push($this->newTag);
        }
    }

    public function removeTag($tag)
    {
        foreach ($this->tags as $key => $value) {
            if($value == $tag) {
                $this->tags->forget($key);
            }
        }
    }

    public function store()
    {   
        $this->validate();
        
        //dd($this->tags);

        $imagePath = '/storage/images/articles/'.$this->image->hashName();
        Storage::disk('images')->put('/', $this->image);

        Article::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'subcategory_id' => $this->subcategory,
            'headline' => $this->headline,
            'subheadline' => $this->subheadline,
            'body' => $this->body,
            'image' => $imagePath
        ]);

        foreach ($this->tags as $tag) {
            $tagId = Tag::where('name', $tag)->pluck('id');

            if(!count($tagId)) {
                Tag::create([
                    'name' => $tag,
                ]);
            }
            
            DB::table('article_tag')->insert([
                'article_id' => Article::max('id'),
                'tag_id' => count($tagId) ? $tagId->first() : Tag::max('id'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $this->reset(['headline', 'subheadline', 'image', 'body', 'category', 'subcategory', 'tags']);
        session()->flash('alertMessage', 'New article is created');
        return redirect()->route('admin.articles.edit', Article::max('id'));
    }

    public function render()
    {
    	$category = Category::all();
    	if($this->category) {
    		$subcategories = Subcategory::where('category_id', $this->category)->get();
    	} else {
    		$subcategories = Subcategory::where('category_id', 1)->get();	
    	}

        return view('livewire.article-create',[
        	'categories' => $category,
        	'subcategories' => $subcategories
        ]);
    }
}
