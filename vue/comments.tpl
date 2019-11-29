{literal}
    <section id="template-vue-comment">
    <h3> {{ subtitle }} </h3>
    <h4>Valoración promedio: {{ promedio }}</h4>
    <ul>
       <li v-for="comment in comments">
           <span>{{ comment.mensaje }}</span>
       </li> 
    </ul>
</section>
{/literal}
