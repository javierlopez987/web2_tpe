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
        {foreach from=$canciones item=cancion}
        <tr>
            <td>{$cancion->cancion}</td>
            <td>{$cancion->duracion}</td>
            <td>{$cancion->genero}</td>
            <td>{$cancion->album}</td>
            <td>
                {if ($cancion->imagen != "")}
                <img src='{$cancion->imagen}' />
                {else}
                {$cancion->artista} {$cancion->apellido}
                {/if}
            </td>
            <td>{$cancion->ranking}</td>
            <td>
                <form action="cancion/delete" method="post">
                    <input type="hidden" name="id" value="{$cancion->cancion_id}">
                    <button type="submit">Borrar Canción</button>
                </form>
                <form action="cancion/update" method="post">
                    <input type="hidden" name="id" value="{$cancion->cancion_id}">
                    <button type="submit">Modificar Canción</button>
                </form>
                <form action="cancion/get-csr/{$cancion->cancion_id}" method="GET">
                    <button type="submit">Ver Detalle Canción</button>
                </form>
                <form action="artistas/imagen" method="GET">
                    <input type="hidden" name="id" value="{$cancion->id_artista}">
                    <button type="submit">Modificar Imagen del Artista</button>
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
            <td>
                <select name="artista">
                    {foreach from=$artistas item=artista}
                    <option value="{$artista->id}">{$artista->nombre} {$artista->apellido}</option>
                    {/foreach}
                </select>
            </td>
            <td>
            <select name="ranking">
                {html_options values=$puntajes output=$puntajes}
            </select>
            </td>
            <td><input type="submit" value="Agregar Canción"></td>
        </form>
        </tr>
    </tbody>
    </table>
{include file="footer.tpl"}