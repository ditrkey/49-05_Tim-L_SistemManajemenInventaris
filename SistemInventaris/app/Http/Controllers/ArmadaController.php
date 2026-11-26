<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    public function index(){
        return view('armada.index');
    }

    public function getVehicle(Request $request)
    {
        $allowedSorts = [
            'id',
            'jenis_kendaraan',
            'no_seri_kendaraan',
            'no_dokumen_perawatan',
        ];

        $sort = $request->query('sort', 'id');
        if (!in_array($sort, $allowedSorts, true)) {
            $sort = 'id';
        }

        $direction = strtolower($request->query('direction', 'desc'));
        if (!in_array($direction, ['asc', 'desc'], true)) {
            $direction = 'desc';
        }

        $data_armada = Armada::orderBy($sort, $direction)
            ->paginate(10)
            ->withQueryString();

        return view('armada.table', compact('data_armada', 'sort', 'direction'));
    }

    public function formVehicle(){
        return view('armada.form');
    }

    public function editVehicle(string $id)
    {
    $armada = Armada::findOrFail($id);

    return view('armada.form', compact('armada'));
    }

    public function addVehicle(Request $request){
        $data = $request->validate(
            [
            'id'=>'required|max:50',
            'jenis_kendaraan'=>'required|max:255',
            'no_dokumen_perawatan'=>'required|max:255',
            'no_seri_kendaraan'=>'required|max:255'
        ]);
        $data['status'] = 'Pending';
    Armada::create($data);
        return redirect()->route('armada.table')->with('success', 'Armada baru berhasil ditambahkan');
    }

    public function updateVehicle(Request $request, string $id)
    {
        $armada = Armada::findOrFail($id);

        $data = $request->validate([
            'id' => 'required|max:50',
            'jenis_kendaraan' => 'required|max:255',
            'no_dokumen_perawatan' => 'required|max:255',
            'no_seri_kendaraan' => 'required|max:255',
        ]);

        $armada->update($data);

        return redirect('/inventaris')->with('success', 'Data armada berhasil diperbarui.');
    }

    public function confirmDelete(string $id)
    {
        $armada = Armada::findOrFail($id);

        return view('armada.delete', compact('armada'));
    }

    public function deleteVehicle(string $id)
    {
        $armada = Armada::findOrFail($id);
        $armada->delete();

        return redirect('/inventaris')->with('success', 'Data armada berhasil dihapus.');
    }
}