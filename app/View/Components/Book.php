<?php

namespace App\View\Components;

use App\Models\Book as ModelsBook;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Validation\ValidationException;

class Book extends Component
{
    /**
     * The book instance.
     *
     * @var \App\Models\Book
     */
    public ?ModelsBook $book = null;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $width
     * @param  \App\Models\Book  $book
     */
    public function __construct(?ModelsBook $book = null)
    {
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        try {
        if (is_null($this->book)) {
                // Handle the case where the width or book is not set
                throw new \InvalidArgumentException('The width and book properties are required.');
            }

            return view('components.book', ['book' => $this->book]);
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

