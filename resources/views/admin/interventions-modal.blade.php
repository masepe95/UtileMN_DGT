<table>
    <thead>
        <tr>
            <th>ID Appuntamento</th>
            <th>ID ORDINE</th>
            <th>ESITO INTERVENTO</th>
            <th>STATO INTERVENTO</th>
            <!-- Altre intestazioni di colonna -->
        </tr>
    </thead>
    <tbody>
        @foreach ($interventions as $intervention)
            <tr>
                <td>{{ $intervention->idAppuntamento }}</td>
                <td>{{ $intervention->idOrdine }}</td>
                <td>{{ $intervention->esitoIntervento }}</td>
                <td>{{ $intervention->statoIntervento }}</td>
                @foreach ($intervention->products as $product)
                <tr>
                    <td>{{ $product->idProdottoIntervento }}</td>
                    <td>{{ $product->idIntervento }}</td>
                    <td>{{ $product->Descrizione }}</td>
                    <td>{{ $product->Tipologia }}</td>
                    <td>{{ $product->Qta}}</td>
                </tr>
            @endforeach
            </tr>
        @endforeach
    </tbody>
</table>