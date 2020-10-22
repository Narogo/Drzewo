<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drzewo;

class DrzewoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $drzewo = new Drzewo();
        $drzewo->name = request('name');
        $drzewo->Parent_id = request('selected');
        $drzewo->save();
        return request('selected');
    }


    public function edit(Request $request)
    {
        $id = Drzewo::find($request->selected);
        $drzewo = Drzewo::find($request->selected);
        $drzewo->Parent_id = request('selectedM');
        $drzewo->update();

        return 'przeniesiono';
    }

    public function update(Request $request)
    {
        $drzewo = Drzewo::find($request->selected);
        $drzewo->name = request('newName');
        $drzewo->update();

        return "update";
    }

    public function delete(Request $request)
    {
        $id = $request->selected;

        $drzewo = Drzewo::findOrfail($id);
        $drzewo->child()->delete();
        $drzewo->delete();
    }

    public function deleteAll()
    {
        $drzewo = Drzewo::query()->delete();

            return 'xd';
    }

    public function show()
    {
        // kod do wyświetlenia w vue
       /* $b = array();

        $drzewo = Drzewo::all();

        foreach ($drzewo as $drz)
        {
            $b["id"] = $drz->id;
            $b["name"] = $drz->name;
            $b["Parent_id"] = $drz->Parent_id;
            $data[] = $b;
        }

        foreach ($data as $key=> &$value)
        {
            $output[$value["id"]] =&$value;
        }
        foreach ($data as $key=> &$value)
        {
            if($value["Parent_id"] && isset($output[$value["Parent_id"]]))
            {
                $output[$value["Parent_id"]]["nodes"][]=&$value;
            }
        }
        foreach ($data as $key=> &$value)
        {
            if($value["Parent_id"] && isset($output[$value["Parent_id"]]))
            {
                unset($data[$key]);
            }
        }
       //dd($data);
        return $data;*/

        $drzewo = Drzewo::all();

        return $drzewo;
    }

    public function showTree()
    {
        $drzewo = Drzewo::where('Parent_id',1)->get();

        return view('tree.parent', compact('drzewo'));

    }
}
