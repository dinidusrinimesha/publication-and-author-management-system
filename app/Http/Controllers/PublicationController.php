<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Publication;
use App\Models\Category;

class PublicationController extends Controller
{
    public function registerPublication()
    {
        $categories = Category::all();
        return view('publication/publication-register', compact('categories')); //Passing Data: Using compact, the data is passed to the view.
    }

    public function store(Request $request)
    {

        $requestData = $request->all();
        // dump($requestData);

        $validator = Validator::make($requestData, [
            'pub_name' => ['required', 'string', 'max:100'],
            'author_id' => Auth::id(),
            'category_id' => 'required|exists:categories,id',
            'isbn' => ['required', 'string', 'max:100'],
            'published_date' => ['required', 'date'],
            'cover_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('cover_picture')) {
            $file = $request->file('cover_picture');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/covers/', $fileName);
        }

        $publication = Publication::create([
            'pub_name' => $request->pub_name,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'isbn' => $request->isbn,
            'published_date' => $request->published_date,
            'cover_picture' => $fileName
        ]);

        return redirect()->back()->with(
            'success',
            'Record created successfully'
        );
    }

    public function view(int $id){
        $publication = Publication::findOrFail($id);
        return view('publication.view', ['publication'=>$publication]);
    }
}
