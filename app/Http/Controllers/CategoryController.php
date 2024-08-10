<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category/create-category');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = Category::create([
            'name' => $validatedData['name'],
        ]);

        return redirect()->route('category.all')->with(
            'status',
            'New Category was added successfully.'
        );
    }

    public function index()
    {
        $category = User::where('role', User::USER_ROLE_ADMIN)->get();
        return view('category/index', ['categories' => $category]);
    }

    public function view(int $id) {
        $categories = Category::findOrFail($id);
        return view('category.view', ['category'=>$categories]);
    }

    public function destroy(int $id) {
        $category = Category::findOrFail($id);
        $category -> delete();
        return redirect()->back();

    }
}
