"use strict"

let app = new Vue({
    el: '#template-vue-comment',
    data: {
        subtitle: "Comentarios",
        comments: [],
        auth: false
    }
})

function getComments(cancion) {
    fetch("api/comments/" + cancion)
    .then(response => response.json())
    .then(comments => {
        app.comments = comments;
    })
    .catch(error => console.log(error));
}

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

let cancion = document.querySelector("#idCancion").value;
getComments(cancion);

function deleteComment(e) {
    e.preventDefault();


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