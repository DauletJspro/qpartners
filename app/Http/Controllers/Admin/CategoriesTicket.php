<?php

namespace App\Http\Controllers\Admin;

use App\Models\CategoryTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesTicket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

        $categories = CategoryTicket::all();

        return view('categories2.index', compact('categories'));
    }

    public function create()
    {
        return view('categories2.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category = new CategoryTicket([
            'name' => $request->input('name'),
        ]);

        $category->save();

        return redirect()
            ->back()
            ->with("status", "Category Created!");
    }
}
