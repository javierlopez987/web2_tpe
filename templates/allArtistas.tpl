{include file="header.tpl"}

<div class = "row">
    <table class="table table-hover">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacimiento</th>
            <th>Ranking</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$artistas item=artista}
        <tr>
            <td>{$artista->nombre}</td>
            <td>{$artista->apellido}</td>
            <td>{$artista->fechanac}</td>
            <td>{$artista->ranking}</td>
            <td>
                <form action="API/artistas/edit" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Modificar</button>
                </form>
                <form action="API/artistas/delete" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Borrar</button>
                </form>
            </td>
            <td>
                <form action="API/artistas/imagen" method="GET">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Insertar Imagen</button>
                </form>
            </td>
        </tr>
        {/foreach}
        <tr>
        <form action="API/artistas/create" method="post">
            <td><input type="text" name="nombre" placeholder="Nombre"></td>
            <td><input type="text" name="apellido" placeholder="Apellido"></td>
            <td><input type="date" name="fechanac"></td>
            <td><input type="number" name="ranking" placeholder="Ranking"></td>
            <td><input type="submit" value="Agregar"></td>
        </form>
        </tr>
    </tbody>
    </table>
</div>

{include file="footer.tpl"}