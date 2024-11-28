<?php

namespace App\Http\Controllers\Site;

use App\Models\Package;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends StandardController
{
    // Método para armazenar a reserva
    public function createReservation (Request $request, Package $package)
    {
        // Verifica se o usuário está logado
        if (Auth::check()) {

            // Valida os dados recebidos do formulário
            $validated = $request->validate([
                'reservation_date' => 'required|date|after_or_equal:today', // Garantir que a data seja válida e não no passado
                'name' => 'required|string|max:255', // Validação do nome (opcional)
                'email' => 'required|email|max:255', // Validação do e-mail (opcional)
            ]);

            // Cria a reserva no banco de dados com a data escolhida
            Reservation::create([
                'user_id' => Auth::id(),
                'package_id' => $package->id,
                'total_price' => $package->price, // Ajuste conforme necessário
                'reservation_date' => $validated['reservation_date'], // Usando a data escolhida pelo usuário
                'status' => 'pending',
            ]);

            // Mensagem de sucesso
            return redirect()->route('home')->with('success', 'Reserva feita com sucesso!');
        } else {
            // Mensagem de erro caso o usuário não esteja logado
            return redirect()->route('filament.admin.auth.login')->with('error', 'Você precisa estar logado para fazer uma reserva.');
        }
    }

}
