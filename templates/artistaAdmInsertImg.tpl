{include file="header_adm.tpl"}
<h1></h1>
    <form action="artistas/imagen" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{$id}">
        <input type="file" name="img_insert" id="imageToUpload">
        <button type="submit">Aceptar</button>
    </form>
{include file="footer.tpl"}