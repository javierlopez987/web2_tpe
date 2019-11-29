{include file="header.tpl"}
    <section>
        <h1>{$cancion->cancion}<h1>
    </section>
    <section>
        <h2>N° {$cancion->ranking_cancion} en el ranking</h2>
    </section>
    <section>
        <p>Tiempo de duración: {$cancion->duracion}<p>
    </section>
    <section>
        <h3>Interpretada por {$cancion->artista} {$cancion->apellido}</h3>
        {if ($cancion->imagen != "")}
            <img src="{$cancion->imagen}"/>
        {/if}
    </section>
    <section>
        <h3>Comentarios</h3>
    </section>
{include file="footer.tpl"}