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
                <td>{{ $contractProduct->idContratto }}</td>
                <td>{{ $contractProduct->Attributo }}</td>
                <td>{{ $contractProduct->descArticolo }}</td>
                <td>{{ $contractProduct->modello }}</td>
                <td>{{ $contractProduct->marca }}</td>
                <td>{{ $contractProduct->tipoapparecchio }}</td>
                <td>{{ $contractProduct->importo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>