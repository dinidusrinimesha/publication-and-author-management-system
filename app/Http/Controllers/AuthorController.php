<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    public function create()
    {
        return view('authors/author-form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', function ($attribute, $value, $fail) {
                $age = Carbon::parse($value)->age;
                if ($age < 15) {
                    $fail('The ' . $attribute . ' must be at least 15 years old');
                }
            }],
            'gender' => ['required', 'string',],
            'contact_number' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'role' => User::USER_ROLE_AUTHOR,
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'contact_number' => $validatedData['contact_number'],
            'city' => $validatedData['city'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['email']),
            'created_by' => Auth::user()->id, //nullable
            'is_active' => true, //default true
            'is_default_password_changed' => false, //default true
            // is_active
            // is_default_password_changed
            // created_by
        ]);

        return redirect()->route('author.all')->with(
            'status',
            'New Author was added successfully.'
        );
    }

    public function index()
    {
        $authors = User::where('role', User::USER_ROLE_AUTHOR)->get();
        return view('authors/index', ['authors' => $authors]);
    }

    public function view(int $id) {
        $author = User::findOrFail($id);
        return view('authors.view', ['author'=>$author]);
    }

    public function edit(int $id) {
        $author = User::findOrFail($id);
        //dd($author);
        return view('authors.edit', ['author'=>$author]);
    }

    public function toggleActiveUser(int $id) {
        $author = User::findOrFail($id);
        $author->is_active = ! $author->is_active;
        $author->save();

        return redirect()->back();

    }

    public function inactiveUser(int $id) {
        $author = User::findOrFail($id);
        $author->is_active = false;
        $author->save();

        return redirect()->back();

    }

    public function update(int $id, Request $request) {

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', function ($attribute, $value, $fail) {
                $age = Carbon::parse($value)->age;
                if ($age < 15) {
                    $fail('The ' . $attribute . ' must be at least 15 years old');
                }
            }],
            'gender' => ['required', 'string',],
            'contact_number' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $author = User::findOrFail($id);

        $author->first_name = $validatedData['first_name'];
        $author->last_name = $validatedData['last_name'];
        $author->dob = $validatedData['dob'];
        $author->gender = $validatedData['gender'];
        $author->cotact_number = $validatedData['contact_number'];
        $author->city = $validatedData['city'];
        $author->email = $validatedData['email'];
        $author->save();
       
    }

    public function destroy(int $id) {
        $author = User::findOrFail($id);
        $author -> delete();
        return redirect()->back();
    }
}
