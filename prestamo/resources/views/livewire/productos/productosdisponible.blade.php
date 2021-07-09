<h1>Productos diaponible</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{posts->nombre}}</td>
            <td>{{posts->Descripcion}}</td>
        </tr>

        @endforeach
    </tbody>
</table>