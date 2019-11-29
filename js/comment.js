"use strict"

let app = new Vue({
    el: '#template-vue-comment',
    data: {
        subtitle: "Comentarios",
        comments: [],
        auth: false,
        promedio: 0
    }
})

function getComments(cancion) {
    fetch("api/comments/" + cancion)
    .then(response => response.json())
    .then(comments => {
        let suma = 0;
        let cuenta = 0;
        for (const comment of comments) {
            suma += parseInt(comment.valoracion);
            cuenta++;
        }
        let promedio = suma/cuenta;
        app.comments = comments;
        app.promedio = promedio;
    })
    .catch(error => console.log(error));
}

let cancion = document.querySelector("#idCancion").value;
getComments(cancion);

document.querySelector("#form-comment").addEventListener('submit', addComment);

function addComment(e) {
    e.preventDefault();
    
    let data = {
        mensaje:  document.querySelector("input[name=mensaje]").value,
        valoracion:  document.querySelector("input[name=valoracion]").value,
        cancion:  document.querySelector("input[name=cancion]").value,
        user:  document.querySelector("input[name=user]").value,
    }
    fetch('api/comments', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
        getComments(data.cancion);
     })
     .catch(error => console.log(error));
}

function deleteComment(e) {
    e.preventDefault();
    let id = document.querySelector("#btn-borrar").value;
    fetch('api/comments/id', {
        method: 'DELETE',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
        getComments(data.cancion);
     })
     .catch(error => console.log(error));
}