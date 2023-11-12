<?php

namespace App\Http\Controllers;

use App\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    public function index(Request $request)
    {
        $editions = Edition::paginate();

        return view('admin.edition.index', compact('editions'));
    }

    public function create(int $id = null)
    {
        $edition = null;

        if ($id) {
            $edition = Edition::where('id', $id)->first();
        }
        
        return view('admin.edition.form', compact('edition'));
    }

    public function save(Request $request, int $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string|min:1|max:1000',
            'banner' => 'nullable|file:png,jpg,jpeg,gif',
            'description' => 'required|string|min:1|max:10000',
            'max_participants' => 'required|integer',
            'inscriptions_begins_at' => 'required|date',
            'inscriptions_ends_at' => 'required|date',
        ]);

        $data = $request->only([
            'name',
            'banner',
            'description',
            'max_participants',
            'inscriptions_begins_at',
            'inscriptions_ends_at',
        ]);

        if ($id) {
            Edition::where('id', $id)->update($data);

            $message = "Edição atualizada com sucesso";
        } else {
            Edition::create($data);
            
            $message = "Edição criada com sucesso";
        }

        return redirect('admin/editions')->with('message', $message);
    }

    public function view(int $id)
    {
        $edition = Edition::where('id', $id)->first();

        if (!$edition) {
            return redirect('admin.editions.index')->with('error', 'Edição não encontrada ou excluída');
        }

        return redirect('admin.editions.view', compact('edition'));
    }

    public function delete(int $id)
    {
        Edition::where('id', $id)->delete();

        return redirect('admin.editions.index')->with('message', 'Edição excluída com sucesso');
    }
}
