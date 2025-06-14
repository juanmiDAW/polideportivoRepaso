<div>
    <select name="pista" id="" wire:model.live="pista">
        @foreach ($pistas as $pista)
        <option value="{{$pista->id}}">{{$pista->nombre}}</option>
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
            @for ($i = 10; $i < 23 ; $i++)
            <tr>
                <td>{{$i}}:00</td>
                @for ($j = 1; $j <= 5; $j++)

                @php
                    $fecha_hora = Carbon\Carbon::now()->startOfWeek()->addDays($j)->setHour($i);
                @endphp
                <td><button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" wire:click="reservar('{{$fecha_hora}}')">Reservar</button></td>
                @endfor

            @endfor
        </tbody>
    </table>
</div>
