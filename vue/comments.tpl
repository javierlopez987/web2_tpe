{literal}
    <section id="template-vue-comment">
    <h3> {{ subtitle }} </h3>

    <ul>
       <li v-for="comment in comments">
           <span> {{ comment.mensaje }} - {{comment.valoracion}} </span>
           <span v-if="auth">
                <a :data-id="comment.id" class="btn-eliminar" href="#">Eliminar</a>
           </span>
       </li> 
    </ul>
</section>

{/literal}