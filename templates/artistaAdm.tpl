{include file="header_adm.tpl"}
    <table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacimiento</th>
            <th>Ranking</th>
            {if ($artista->imagen != "")}
                <th>Imagen</th>
            {/if}
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{$artista->nombre}</td>
            <td>{$artista->apellido}</td>
            <td>{$artista->fechanac}</td>
            <td>{$artista->ranking}</td>
            {if ($artista->imagen != "")}
                <td><img src="{$artista->imagen}"/></td>
            {/if}
        </tr>
    </tbody>
    </table>
{include file="footer.tpl"}