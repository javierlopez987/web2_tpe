{include file="header.tpl"}

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
        {foreach from=$canciones item=cancion}
        <tr>
            <td>{$cancion->nombre}</td>
            <td>{$cancion->duracion}</td>
            <td>{$cancion->genero}</td>
            <td>{$cancion->album}</td>
            <td>{$cancion->id_artista}</td>
            <td>{$cancion->ranking}</td>
            <td>
                <form action="cancion/delete" method="post">
                    <input type="hidden" name="id" value="{$cancion->id}">
                    <button type="submit">Delete</button>
                </form>
                <form action="cancion/update" method="post">
                    <input type="hidden" name="id" value="{$cancion->id}">
                    <button type="submit">Modificar</button>
                </form>
            </td>
        </tr>
        {/foreach}
        <tr>
        <form action="cancion/create" method="post">
            <td><input type="text" name="nombre" placeholder="Cancion"></td>
            <td><input type="number" name="duracion" placeholder="Duración"></td>
            <td><input type="text" name="genero" placeholder="Género"></td>
            <td><input type="text" name="album" placeholder="Álbum"></td>
            <td><input type="text" name="artista" placeholder="Artista"></td>
            <td><input type="text" name="ranking" placeholder="Ptos para ranking"></td>
            <td><input type="submit" value="Agregar"></td>
        </form>
        </tr>
    </tbody>
    </table>
{include file="footer.tpl"}