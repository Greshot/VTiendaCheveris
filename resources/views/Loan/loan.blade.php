<div class="table-responsive">
    <table class="table table-hover table-condensed">
        <thead style="background-color: #0f0f0f; color: snow">
        <th>Fecha</th>
        <th>Cliente</th>
        </thead>
        <tbody>
        <tr>
            <td>{{$loan->fecha}}</td>
            <td>{{$loan->client->nombre}}</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table table-hover table-condensed">
        <thead style="background-color: #0f0f0f; color: snow">
        <th>Pelicula</th>
        <th>Cantidad</th>
        </thead>
        @foreach($loan->movies as $movie)
            <tbody>
            <tr>
                <td>{{$movie->titulo}}</td>
                <td>{{$movie->pivot->cantidad}}</td>
            </tr>
            </tbody>
        @endforeach
    </table>
</div>