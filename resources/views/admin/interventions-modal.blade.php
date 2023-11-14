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
                <td style="text-align: center">{{ $intervention->idAppuntamento }}</td>
                <td style="text-align: center">{{ $intervention->idOrdine }}</td>
                <td style="text-align: center">{{ $intervention->esitoIntervento }}</td>
                <td style="text-align: center">{{ $intervention->statoIntervento }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@if (count($intervention->products)>0)
    
    
    <table>
        <thead>
            <tr>
                <th>ID PRODOTTO</th>
                <th>ID INTERVENTO</th>
                <th>DESCRIZIONE</th>
                <th>TIPOLOGIA</th>
                <th>QTA</th>
                <!-- Altre intestazioni di colonna -->
            </tr>
        </thead>
        <tbody>
            @foreach ($intervention->products as $product)
            <tr>
                <td style="text-align: center">{{ $product->idProdottoIntervento }}</td>
                <td style="text-align: center">{{ $product->idIntervento }}</td>
                <td style="text-align: center">{{ $product->Descrizione }}</td>
                <td style="text-align: center">{{ $product->Tipologia }}</td>
                <td style="text-align: center">{{ $product->Qta}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif