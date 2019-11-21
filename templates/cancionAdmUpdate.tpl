{include file="header_adm.tpl"}
    <table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Duración</th>
            <th>Género</th>
            <th>Álbum</th>
            <th>Artista</th>
            <th>Ranking</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <form action="cancion/update" method="post">
            <td><input type="text" name="nombre" value="{$cancion->nombre}"></td>
            <td><input type="number" name="duracion" value="{$cancion->duracion}"></td>
            <td><input type="text" name="genero" value="{$cancion->genero}"></td>
            <td><input type="text" name="album" value="{$cancion->album}"></td>
            <td><input type="text" name="artista" value="{$cancion->id_artista}"></td>
            <td><input type="text" name="ranking" value="{$cancion->ranking}"></td>
            <td><input type="hidden" name="id" value="{$cancion->id}"></td>
            <td><input type="submit" value="Aceptar"></td>
        </form>
        </tr>
    </tbody>
    </table>
{include file="footer.tpl"}