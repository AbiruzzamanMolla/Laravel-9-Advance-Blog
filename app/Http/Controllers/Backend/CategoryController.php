<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        abortIf('view.category');
        $categories = Category::latest()->paginate(10);
        $last_created = Category::latest('created_at')
        ->first()->created_at;
        return view('backend.category.index', ['categories' => $categories, 'last_created' => $last_created]);
    }

    public function store(Request $request)
    {
        abortIf('store.category');
        $request->validate([
            'title' => 'required|unique:categories,title'
        ]);

        $created = Category::create($request->except('_token'));
        $created ? flashSuccess('Category Created Successfully!') : flashError('Something went wrong!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        abortIf('edit.category');
        $last_updated = Category::latest('updated_at')
        ->first()->updated_at;
        $categories = Category::latest()->paginate(10);
        return view('backend.category.index',[
            'categories' => $categories,
            'last_updated' => $last_updated,
            'categoryData' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        abortIf('update.category');
        $request->validate([
            'title' => 'required|unique:categories,title,'.$category->id,
        ]);

        $edited = $category->update($request->except('_token'));
        $edited ? flashSuccess('Category updated!') : flashSuccess('Something went wrong...');

        return redirect()->route('admin.categories.edit', $category->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        abortIf('delete.category');
        $data = $category->delete();
        if($data) flashSuccess('Category Deleted!');
        return response()->json([
            'message' => 'Category deleted successfully!',
            'success' => $data
        ]);
    }
}
