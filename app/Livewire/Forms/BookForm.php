<?php

namespace App\Livewire\Forms;

use App\Models\Books;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;
use PhpParser\Node\Stmt\TryCatch;

class BookForm extends Form
{
    #[Validate]
    public $image;
    public $cover;
    public string $name;
    public float $price;
    public string $description;


    public function rules()
    {
        if (request()->route()->getName() === 'admin.books.create') {
            return [
                'image' => 'required"image|max:1024',
                'cover' => 'required"image|max:1024',
                'name' => 'required|max:100',
                'price' => 'required|float',
                'description' => 'required|min:5',
            ];
        } else {
            return [
                'name' => 'required|max:100',
                'price' => 'required',
                'description' => 'required|min:5',
            ];
        }
    }


    public function store(Books $book = null): Books | null
    {
        $this->validate();
        try {
            DB::beginTransaction();
            $imageName = $this->image instanceof TemporaryUploadedFile ? $this->image->getClientOriginalName() : $book->name;
            $coverName = $this->cover instanceof TemporaryUploadedFile ?  $this->cover->getClientOriginalName() : $book->cover;

            $data = [
                'image' => $imageName,
                'cover' => $coverName,
                'name' => $this->name,
                'price' => $this->price,
                'description' => $this->description
            ];

            if ($book) {
                $book->update($data);
            } else {
                $book = Books::create($data);
            }

            if ($this->image instanceof TemporaryUploadedFile) $this->image->storeAs(path: "public/images/$book->uuid", name: $imageName);
            if ($this->cover instanceof TemporaryUploadedFile) $this->cover->storeAs(path: "public/images/$book->uuid", name: $coverName);

            DB::commit();

            return $book;
        } catch (\Exception $th) {
            dd($th);
            DB::rollBack();
            return null;
        }
    }
}
