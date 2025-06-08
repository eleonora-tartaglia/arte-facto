<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    // 🎯 Champs du formulaire (bindés dynamiquement)
    public $title, $locality, $category, $description, $price, $image, $status = 'available', $type = 'immediate';
    
    // 🧹 Pour savoir si on édite un article ou pas
    public $articleId = null;

    // 🌀 UI State
    public $showFormModal = false;
    public $confirmingDeleteId = null;

    // 🔎 Recherche et filtres
    public $search = '';
    public $filterCategory = null;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // 🧮 Règles de validation du formulaire
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'locality' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|string',
            'status' => 'required|in:available,sold,in_cart',
            'type' => 'required|in:auction,immediate',
        ];
    }

    /**
     * ⚙️ Réinitialise le formulaire
     */
    public function resetForm()
    {
        $this->reset([
            'title', 'locality', 'category', 'description', 'price', 'image', 'status', 'type',
            'articleId', 'showFormModal'
        ]);
    }

    /**
     * 🔁 Tri dynamique
     */
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    /**
     * 🔍 Mise à jour de la recherche et du filtre
     */
    public function triggerSearch()
    {
        // Tu peux aussi remettre à zéro la pagination si nécessaire
        $this->resetPage();
    }


    public function updatingFilterCategory()
    {
        $this->resetPage();
    }


    /**
     * ✏️ Préparation du formulaire pour l’édition
     */
    public function edit($id)
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut ajouter ou modifier un article.');
        }

        $article = Article::findOrFail($id);
        $this->articleId = $article->id;
        $this->title = $article->title;
        $this->locality = $article->locality;
        $this->category = $article->category;
        $this->description = $article->description;
        $this->price = $article->price;
        $this->image = $article->image;
        $this->status = $article->status;
        $this->type = $article->type;
        $this->showFormModal = true;
    }

    /**
     * ➕ Création ou mise à jour d’un article
     */
    public function save()
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut ajouter ou modifier un article.');
        }

        $this->validate();

        Article::updateOrCreate(
            ['id' => $this->articleId],
            [
                'title' => $this->title,
                'locality' => $this->locality,
                'category' => $this->category,
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

    /**
     * 🗑️ Confirmation de suppression
     */
    public function confirmDelete($id)
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut supprimer un article.');
        }

        $this->confirmingDeleteId = $id;
    }

    /**
     * 💥 Suppression d’un article
     */
    public function delete()
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            abort(403, 'Seul un admin peut supprimer un article.');
        }

        Article::destroy($this->confirmingDeleteId);
        session()->flash('message', 'Article supprimé');
        $this->confirmingDeleteId = null;
    }

    /**
     * 🧠 Affichage dynamique
     */
    public function render()
    {
        $articles = Article::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%");
                });
            })
    
            ->when($this->filterCategory, fn($query) =>
                $query->where('category', $this->filterCategory)
            )
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.article-index', [
            'articles' => $articles,
        ]);
    }
}
