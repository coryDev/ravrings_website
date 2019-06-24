<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends AdminController
{
    public function index()
    {
        $data = Cate::paginate(15);
        return view('layouts.admin.categories.index', ['cates' => $data]);
    }

    public function create()
    {
        return view('layouts.admin.categories.create');
    }

    public function reload()
    {
        return view('layouts.admin.categories.reload');
    }

    public function store(Request $request)
    {
        // $model->create($request->merge(['password' => bcrypt($request->get('password'))])->all());

        if ($request->has('url')) {

            $count = $request->has('ignore_first') ? 0 : 1;

            $file_lines = file($request->input('url'));

            if (count($file_lines) > 1) Cate::truncate();

            foreach ($file_lines as $line) {
                
                if ($count > 0) {
                    Cate::create(array('name' => trim($line)));
                }
                $count++;
            }
            return redirect()->route('admin.categories')->withStatus(__('All categories successfully created.'));

        } else if ($request->has('name')) {

            $cate = Cate::create(array('name' => trim($request->input('name'))));

            if ($cate) {
                return redirect()->route('admin.categories')->withStatus(__('New category successfully created.'));
            }
        } else {
            
            return view('layouts.admin.categories.reload');
        }
        
    }

    public function edit(Cate $cate)
    {
        return view('layouts.admin.categories.edit', compact('cate'));
    }

    public function update(Request $request)
    {
        // $user->update(
        //     $request->merge(['password' => bcrypt($request->get('password'))])
        //         ->except([$request->get('password') ? '' : 'password']
        // ));

        return redirect()->route('admin.categories')->withStatus(__('Category successfully updated.'));
    }

    public function destroy($id)
    {
        Cate::find($id)->delete();
        return redirect()->route('admin.categories')->withStatus(__('Category successfully deleted.'));
    }
}