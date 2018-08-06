<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function show(Request $request, Category $category)
    {
    	$topics = Topic::where('category_id', $category->id)->paginate(20);

    	return view('web.topics.index', compact('topics'));
    }
}
