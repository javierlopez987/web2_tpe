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
                <form action="cancion/get/{$cancion->id}" method="GET">
                    <button type="submit">Ver</button>
                </form>
            </td>
        </tr>
        {/foreach}
    </tbody>
    </table>
{include file="footer.tpl"}