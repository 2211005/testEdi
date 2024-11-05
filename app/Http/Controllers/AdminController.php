<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip; // Importar el modelo Tip
use App\Models\TipView;
use App\Models\PageVisit;
class AdminController extends Controller
{
    public function index(Request $request)
{
    // Base query
    $query = Tip::query();

    // Si hay filtro de vistas
    if ($request->has('view_count')) {
        $query->orderBy('views', 'desc');
    }

    // Si hay filtro de fecha
    if ($request->has('date')) {
        $query->orderBy('created_at', 'desc');
    }

    // Obtener todos los tips o tips filtrados
    $tips = $query->get();

    return view('admin.index', compact('tips'));
}

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',
        'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx,ppt,pptx,txt|max:2048'
    ]);

    if ($request->hasFile('document')) {
        $documentPath = $request->file('document')->store('documents', 'public');
        $data['document'] = $documentPath;  // Guarda la ruta en la base de datos
    }

    Tip::create($data); 
    return redirect()->route('admin.index')->with('success', 'Tip creado exitosamente.');
}

    public function edit($id)
    {
        $tip = Tip::findOrFail($id);
        return view('admin.edit', compact('tip'));
    }

    public function update(Request $request, $id)
{
    $tip = Tip::findOrFail($id);
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'required|string',
        'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx,ppt,pptx,txt|max:2048'
    ]);

    if ($request->hasFile('document')) {
        $documentPath = $request->file('document')->store('documents', 'public');
        $data['document'] = $documentPath;
    }

    $tip->update($data); 
    return redirect()->route('admin.index')->with('success', 'Tip actualizado con éxito.');
}

    public function destroy($id)
    {
        $tip = Tip::findOrFail($id);
        $tip->delete();
        return redirect()->route('admin.index')->with('success', 'Tip eliminado exitosamente.');
    }

    public function dashboard()
    {
        // Aquí va la lógica de tu dashboard principal
        return view('admin.dashboard');
    }

    public function stats()
{
    // Obtén la cantidad total de tips
    $totalTips = Tip::count();

    // Suma de todas las vistas
    $totalPageVisits = PageVisit::sum('views');

    // Suma acumulada de vistas de tips
    $visitedTips = Tip::sum('views'); // Cuenta cada vista individualmente

    // Páginas más visitadas
    $mostVisitedPages = PageVisit::orderBy('views', 'desc')->take(5)->get();

    return view('admin.stats', compact('totalTips', 'totalPageVisits', 'visitedTips', 'mostVisitedPages'));
}



    

public function filters(Request $request)
{
    // Consulta base
    $query = Tip::query();

    // Búsqueda por título o descripción
    if ($request->has('search') && $request->input('search') != '') {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'LIKE', '%' . $request->input('search') . '%')
              ->orWhere('description', 'LIKE', '%' . $request->input('search') . '%');
        });
    }

    // Ordenar por vistas o fecha (mutuamente excluyentes)
    if ($request->has('view_count')) {
        $order = $request->input('view_order', 'desc'); // Por defecto, descendente
        $query->orderBy('views', $order);
    } elseif ($request->has('date')) {
        $order = $request->input('date_order', 'desc'); // Por defecto, descendente
        $query->orderBy('created_at', $order);
    }

    $filteredTips = $query->get();
    
    return view('admin.filters', compact('filteredTips'));
}




public function reports(Request $request)
{
    $selectedMonth = $request->input('month');
    $selectedYear = $request->input('year');

    if ($selectedMonth && $selectedYear) {
        $reportData = PageVisit::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', $selectedMonth)
            ->selectRaw('DAY(created_at) as day, SUM(views) as views')
            ->groupBy('day')
            ->orderBy('day')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->day => $item->views];
            });

        $daysInMonth = now()->setYear($selectedYear)->setMonth($selectedMonth)->daysInMonth;
        $reportDataFormatted = [
            'days' => range(1, $daysInMonth),
            'views' => array_values(array_replace(array_fill(1, $daysInMonth, 0), $reportData->toArray()))
        ];

        return view('admin.reports', compact('reportDataFormatted', 'selectedMonth', 'selectedYear'));
    }

    return view('admin.reports');
}


}
