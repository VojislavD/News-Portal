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
use Illuminate\Support\Facades\Gate;

class ArticleEdit extends Component
{
    use WithFileUploads;

	public $article;
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
        'image' => ['sometimes', 'nullable', 'mimes:jpeg, png'],
        'body' => ['required', 'min:240', 'max:20000'],
        'category' => ['required'],
        'subcategory' => ['required'],
    ];

	public function mount()
	{
		$this->headline = $this->article->headline;
		$this->subheadline = $this->article->subheadline;
		$this->body = $this->article->body;
		$this->category = $this->article->category->id;
		$this->subcategory = $this->article->subcategory->id;
		$this->tags = $this->article->tags->pluck('name');
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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
    	$this->validate();

        if($this->image) {
			$imagePath = '/storage/images/articles/'.$this->image->hashName();
			Storage::disk('images')->put('/', $this->image);
        } else {
			$imagePath = $this->article->image;
        }

        $this->article->update([
			'category_id' => $this->category,
			'subcategory_id' => $this->subcategory,
			'headline' => $this->headline,
			'subheadline' => $this->subheadline,
			'body' => $this->body,
			'image' => $imagePath
		]);

        DB::table('article_tag')->where('article_id', $this->article->id)->delete();

        foreach ($this->tags as $tag) {
            $tagId = Tag::where('name', $tag)->pluck('id');

            if(!count($tagId)) {
                Tag::create([
                    'name' => $tag,
                ]);
            }
            
            DB::table('article_tag')->insert([
                'article_id' => $this->article->id,
                'tag_id' => count($tagId) ? $tagId->first() : Tag::max('id'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        session()->flash('alertMessage', 'Article is updated');
        return redirect()->route('admin.articles.index');
    }

    public function destroy()
    {
        $this->article->delete();
        session()->flash('alertMessage', 'Article is deleted');
        return redirect()->route('admin.articles.index');
    }

    public function render()
    {
        if(! Gate::allows('update-article', $this->article)) {
            abort(403);
        }
        
    	$category = Category::all();
    	if($this->category) {
    		$subcategories = Subcategory::where('category_id', $this->category)->get();
    	} else {
    		$subcategories = Subcategory::where('category_id', 1)->get();	
    	}

        return view('livewire.article-edit',[
        	'categories' => $category,
        	'subcategories' => $subcategories
        ]);
    }
}
