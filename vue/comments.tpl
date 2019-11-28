{literal}
    <section id="template-vue-comment">
    <h3> {{ subtitle }} </h3>

    <ul>
       <li v-for="comment in comments">
           <span>{{ comment.mensaje }}</span>
       </li> 
    </ul>
</section>
{/literal}
