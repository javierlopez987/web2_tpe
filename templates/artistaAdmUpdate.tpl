{include file="header_adm.tpl"}
    <table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacimiento</th>
            <th>Ranking</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <form action="artistas/edit" method="post">
            <td><input type="text" name="nombre" value="{$artista->nombre}"></td>
            <td><input type="text" name="apellido" value="{$artista->apellido}"></td>
            <td><input type="date" name="fechanac" value="{$artista->fechanac}"></td>
            <td><input type="number" name="ranking" value="{$artista->ranking}"></td>
            <td><input type="hidden" name="id" value="{$artista->id}"></td>
            <td><input type="submit" value="Aceptar"></td>
        </form>
        </tr>
    </tbody>
    </table>
{include file="footer.tpl"}