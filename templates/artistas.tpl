{include file="header.tpl"}
    <table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacimiento</th>
            <th>Ranking</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$artistas item=artista}
        <tr>
            <td>{$artista->nombre}</td>
            <td>{$artista->apellido}</td>
            <td>{$artista->fechanac}</td>
            <td>{$artista->ranking}</td>
            <td>{if isset($artista->imagen)}
                <img src="{$artista->imagen}"/>
                {/if}
            </td>
        </tr>
        {/foreach}
    </tbody>
    </table>
{include file="footer.tpl"}