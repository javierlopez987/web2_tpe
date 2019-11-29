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
                <form action="cancion/get-csr/{$cancion->cancion_id}" method="GET">
                    <button type="submit">Ver Detalle Canción</button>
                </form>
            </td>
        </tr>
        {/foreach}
    </tbody>
    </table>
{include file="footer.tpl"}