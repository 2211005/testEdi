<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use App\Models\TipView; // Importar el modelo TipView
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipController extends Controller
{
    public function index()
{
    // Obtener los tips más populares
    $tips = Tip::orderBy('views', 'desc')->take(12)->get();

    // Obtener los últimos 10 tips vistos
    $latestViewedTips = DB::table('tip_views')
    ->join('tips', 'tip_views.tip_id', '=', 'tips.id')
    ->select('tips.*', 'tip_views.viewed_at')
    ->distinct('tip_views.tip_id')
    ->orderBy('tip_views.viewed_at', 'desc')
    ->limit(10)
    ->get();


    return view('tips.index', compact('tips', 'latestViewedTips'));

}


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx,ppt,pptx,txt|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('document')) {
            $data['document'] = $request->file('document')->store('documents', 'public');
        }

        Tip::create($data);

        return redirect()->route('admin.index')->with('success', 'Tip creado exitosamente');
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $tips = Tip::where('title', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%")
                ->get();
    
    // Obtener los últimos tips vistos
    $latestViewedTips = DB::table('tip_views')
    ->join('tips', 'tip_views.tip_id', '=', 'tips.id')
    ->select('tips.*', 'tip_views.viewed_at')
    ->distinct('tip_views.tip_id')
    ->orderBy('tip_views.viewed_at', 'desc')
    ->limit(10)
    ->get();
    
    return view('tips.index', compact('tips', 'latestViewedTips'));
}


    public function show($id)
{
    $tip = Tip::findOrFail($id);
    $tip->increment('views'); // Incrementar el contador de vistas

    // Eliminar el tip de la tabla de vistas si ya existe
    TipView::where('tip_id', $tip->id)->delete();

    // Registrar la vista en la tabla tip_views
    TipView::create([
        'tip_id' => $tip->id,
        'viewed_at' => now(),
    ]);

    return view('tips.show', compact('tip'));
}

}
