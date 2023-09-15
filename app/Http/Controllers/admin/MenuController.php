<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::select('id','title','parent_menu_id')->get();
        return view ('admin.pages.menus.index', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.pages.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // `id`, `parent_menu_id`, `serial`, `url`, `title`, `is_active`,
        //  `is_used_this_meta`, `meta_title`, `meta_description`, `meta_keywords`,
        //   `tags`, `created_at`, `updated_at`
        $menu = new Menu;
        $menu->parent_menu_id = $request->parent_menu_id;
        $menu->title = $request->title;
        $menu->serial = $request->serial;
        $menu->url = $request->url;
        $menu->is_active = $request->is_active;
        $menu->is_used_this_meta = $request->is_used_this_meta ?? null;
        $menu->meta_title = $request->meta_title;
        $menu->meta_description = $request->meta_description;
        $menu->meta_keywords = $request->meta_keywords;
        $menu->tags = $request->meta_tags;
        $menu->save();
        return redirect()->back();


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('admin.pages.menus.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
