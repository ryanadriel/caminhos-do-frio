<?php

namespace App\Http\Controllers\Site;

use App\Models\Attraction;
use App\Models\Package;

class PackageController extends StandardController
{
    protected $model, $data;

    public function __construct(Package $package, Attraction $attraction)
    {
        $this->model = $package;
        $this->attraction = $attraction;
    }

    public function descriptionPackage($id) {

        $data = $this->attraction
            ->where('city_id', '=', $id)
            ->get();

        return view('Site.packages.package-description.index', compact('data', 'id'));
    }

    public function reserve($id)
    {
        // Lógica para buscar o pacote pelo ID
        $package = Package::findOrFail($id);

        // Retorna a view de solicitação de reserva, passando os dados do pacote
        return view('Sistema.reservations.index', compact('package'));
    }

    public function createReservation(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        // Lógica para armazenar a reserva (pode ser um modelo de "Reserva" no banco)
        Reservation::create([
            'package_id' => $package->id,
            'user_name' => $request->name,
            'user_email' => $request->email,
            'status' => 'pendente',
        ]);

        return redirect()->route('package.reserve', $package->id)->with('success', 'Solicitação de reserva enviada!');
    }
}
