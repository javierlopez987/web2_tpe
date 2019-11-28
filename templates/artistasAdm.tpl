{include file="header_adm.tpl"}

<div>
    <table>
    <thead>
    </thead>
    <tbody>
        {foreach from=$artistas item=artista}
        <tr>
            {if ($artista->imagen != "")}
                <td>{$artista->nombre} {$artista->apellido}</td>
                <td><a href="artistas/get/{$artista->id}"> <img src="{$artista->imagen}"/> </a></td>
                <td>
                <form action="artistas/delete" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Eliminar Artista</button>
                </form>
                <form action="artistas/imagen" method="GET">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Modificar Imagen</button>
                </form>
                <form action="artistas/imagen/blank" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Borrar Imagen</button>
                </form>
            </td>
            {else}
            <td>{$artista->nombre}</td>
            <td>{$artista->apellido}</td>
            <td>{$artista->fechanac}</td>
            <td>{$artista->ranking}</td>
            <td>
                <form action="artistas/edit" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Modificar Artista</button>
                </form>
                <form action="artistas/delete" method="POST">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Borrar Artista</button>
                </form>
                <form action="artistas/imagen" method="GET">
                    <input type="hidden" name="id" value="{$artista->id}">
                    <button type="submit">Insertar Imagen</button>
                </form>
                <form action="artistas/get/{$artista->id}" method="GET">
                    <button type="submit">Ver Artista</button>
                </form>
            </td>
            {/if}
        </tr>
        {/foreach}
        <tr>
        <form action="artistas/create" method="post">
            <td><input type="text" name="nombre" placeholder="Nombre"></td>
            <td><input type="text" name="apellido" placeholder="Apellido"></td>
            <td><input type="date" name="fechanac"></td>
            <td><input type="number" name="ranking" placeholder="Ranking"></td>
            <td><input type="submit" value="Agregar Artista"></td>
        </form>
        </tr>
    </tbody>
    </table>
</div>

{include file="footer.tpl"}