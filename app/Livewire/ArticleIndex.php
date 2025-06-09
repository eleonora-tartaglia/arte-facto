<?php
namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    // 🎯 Champs du formulaire
    public $title, $locality, $category_id, $description, $price, $image, $status = 'available', $type = 'immediate';
    
    // 🧹 Article en cours d'édition
    public $articleId = null;

    // 🌀 UI
    public $showFormModal = false;
    public $confirmingDeleteId = null;

    // 🔍 Recherche et tri
    public $search = '';
    public $filterCategory = null;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // 📂 Catégories disponibles
    public $categories = [];

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'locality' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
            'status' => 'required|in:available,sold,in_cart',
            'type' => 'required|in:auction,immediate',
        ];
    }

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function resetForm()
    {
        $this->reset([
            'title', 'locality', 'category_id', 'description', 'price', 'image', 'status', 'type',
            'articleId', 'showFormModal'
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function triggerSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterCategory()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut modifier un article.');
        }

        $article = Article::findOrFail($id);

        $this->articleId = $article->id;
        $this->title = $article->title;
        $this->locality = $article->locality;
        $this->category_id = $article->category_id;
        $this->description = $article->description;
        $this->price = $article->price;
        $this->image = $article->image;
        $this->status = $article->status;
        $this->type = $article->type;
        $this->showFormModal = true;
    }

    public function save()
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut créer ou modifier un article.');
        }

        $this->validate();

        Article::updateOrCreate(
            ['id' => $this->articleId],
            [
                'title' => $this->title,
                'locality' => $this->locality,
                'category_id' => $this->category_id,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $this->image,
                'status' => $this->status,
                'type' => $this->type,
            ]
        );

        session()->flash('message', $this->articleId ? 'Article mis à jour' : 'Article créé avec succès');
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut supprimer un article.');
        }

        $this->confirmingDeleteId = $id;
    }

    public function delete()
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut supprimer un article.');
        }

        Article::destroy($this->confirmingDeleteId);
        session()->flash('message', 'Article supprimé');
        $this->confirmingDeleteId = null;
    }

    public function render()
    {
        $articles = Article::with('category')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                      ->orWhere('description', 'like', "%{$this->search}%");
                });
            })
            ->when($this->filterCategory, fn($query) =>
                $query->whereHas('category', fn($q) =>
                    $q->where('name', 'like', "%{$this->filterCategory}%")
                )
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.article-index', [
            'articles' => $articles,
            'categories' => $this->categories,
        ]);
    }
}
