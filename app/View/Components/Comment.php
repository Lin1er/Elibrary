<?php

namespace App\View\Components;

use App\Models\Comment as ModelsComment;
use App\Models\Book as ModelsBook;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{

    /**
    * The comment instance.
    *
    * @var \App\Models\Comment
    */
    public ?ModelsComment $comment = null;
    public ?ModelsBook $book = null;

    /**
     * Create a new component instance.
     */
    public function __construct(?ModelsComment $comment = null, ?ModelsBook $book = null)
    {
        $this->comment = $comment;
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment');
    }
}
