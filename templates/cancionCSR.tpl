{include file="header_adm.tpl"}
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
    {include file="vue/comments.tpl"}
    <form id="form-comment" resource="comments" method="post">
        <input type="text" name="mensaje" placeholder="Comentario">
        <input type="number" name="valoracion" placeholder="Puntaje">
        <input type="hidden" name="cancion" id="idCancion" value="{$cancion->cancion_id}">
        <input type="hidden" name="user" value="{$user}">
        <input type="submit" value="Comentar">
    </form>

    <script src="js/comment.js"></script>

{include file="footer.tpl"}