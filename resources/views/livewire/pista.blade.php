<div>
    <select name="pista" id="" wire:model.live="pista_id">
        @foreach ($pistas as $pista)
            <option value="{{ $pista->id }}">{{ $pista->nombre }}</option>
        @endforeach
    </select>

    <table>
        <thead>
            <tr>
                <th></th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
        </thead>
        <tbody>

            @php
                $reserva ='';
            @endphp
            @for ($i = 10; $i < 23; $i++)
                <tr>
                    <td>{{ $i }}:00</td>
                    @for ($j = 0; $j <= 4; $j++)
                        @php
                            $fecha_hora = Carbon\Carbon::now()->startOfWeek()->addDays($j)->setHour($i);
                            $reserva = App\Models\Reserva::where('pista_id', $pista_id)->where('dia_y_hora', $fecha_hora)->first();
                            // dd($reserva);
                        @endphp

                        @if ($reserva == null)
                            <td>
                                <button
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                    wire:click="reservar('{{ $fecha_hora }}')">Reservar
                                </button>
                            </td>
                        @elseif ($reserva->user_id == auth()->user()->id)
                            <td>
                                <button
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                    wire:click="anular({{ $reserva->id }})">Anular
                                </button>
                            </td>
                        @else
                            <td>
                                <button
                                    class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Reservado
                                </button>
                            </td>
                        @endif
                    @endfor

            @endfor
        </tbody>
    </table>
</div>
