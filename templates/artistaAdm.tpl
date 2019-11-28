{include file="header_adm.tpl"}
    <section>
        <h1>{$artista->nombre} {$artista->apellido}<h1>
    </section>
    <section>
        {if ($artista->imagen != "")}
            <img src="{$artista->imagen}"/>
        {/if}
    </section>
    <section>
        <h2>N° {$artista->ranking} en el ranking</h2>
    </section>
    <section>
        <p>Fecha de nacimiento: {$artista->fechanac}<p>
    </section>
    <form action="artistas/edit" method="POST">
        <input type="hidden" name="id" value="{$artista->id}">
        <button type="submit">Modificar Datos del Artista</button>
    </form>
    {if ($artista->imagen == "")}
        <form action="artistas/imagen" method="GET">
            <input type="hidden" name="id" value="{$artista->id}">
            <button type="submit">Agregar Imagen</button>
        </form>
    {/if}
{include file="footer.tpl"}