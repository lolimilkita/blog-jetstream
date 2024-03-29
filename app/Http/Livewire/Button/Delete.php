<?php

namespace App\Http\Livewire\Button;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class Delete extends Component
{
    public $post;
    public $confirmingPostDeletion = false;

    public function confirmPostDeletion()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-post');
        $this->confirmingPostDeletion = true;
    }

    public function deletePost()
    {
        File::delete(public_path('app/public/images/' . $this->post->cover_image));
        $this->post->delete();

        session()->flash('success', 'Post Successfully Deleted');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.button.delete');
    }
}
