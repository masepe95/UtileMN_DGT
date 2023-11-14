<table>
    <thead>
        <tr>
            <th>ID Contratto</th>
            <th>ATTRIBUTO</th>
            <th>DESCRIZIONE</th>
            <th>MODELLO</th>
            <th>MARCA</th>
            <th>TIPO</th>
            <th>IMPORTO</th>
            <!-- Altre intestazioni di colonna -->
        </tr>
    </thead>
    <tbody>
        @foreach ($contractProducts as $contractProduct)
            <tr>
                <td style="text-align: center">{{ $contractProduct->idContratto }}</td>
                <td style="text-align: center">{{ $contractProduct->Attributo }}</td>
                <td style="text-align: center">{{ $contractProduct->descArticolo }}</td>
                <td style="text-align: center">{{ $contractProduct->modello }}</td>
                <td style="text-align: center">{{ $contractProduct->marca }}</td>
                <td style="text-align: center">{{ $contractProduct->tipoapparecchio }}</td>
                <td style="text-align: center">{{ $contractProduct->importo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>