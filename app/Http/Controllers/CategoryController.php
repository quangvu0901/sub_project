<?php

namespace App\Http\Controllers;

use App\Constants\Params;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::search()->paginate(Params::LIMIT_SHOW);

        return view('cms/category/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',\App\Constants\Category::ACTIVE_STATUS)->get();

        return view('cms/category/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $categories = new Category();
            $categories->fill($data);
            $categories->save();

//            $categories->subCats()->attach($request->parent_id);
            DB::commit();

            return redirect('categories/index');
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subs = SubCategory::all();
        $categories = Category::where('status', \App\Constants\Category::ACTIVE_STATUS)->where('id',$id)->get();

        return view('cms/category/edit', compact('categories','subs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $categories = Category::find($id);
            $categories->fill($data);
//            $categories->subCats()->sync($request->parent_id);
            $categories->update();
            DB::commit();

            return redirect('categories/index');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect('categories/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id)->delete($data);

        return redirect('categories/index');
    }
}
