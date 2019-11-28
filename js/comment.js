"use strict"

function createCommentHTML(comment) {
    let element = `${comment.mensaje}: ${comment.valoracion}`;
    
    if (comment.fk_id_usuario == 1) {
        element += ` <a href="cancion/get-csr/${comment.fk_id_cancion}">Ver</a> `;
    }
        
    element = `<li>${element}</li>`;
    return element;  
}

function getComments(cancion) {
    fetch("api/comments/" + cancion)
    .then(response => response.json())
    .then(comments => {
        let content = document.querySelector("#comment");
        content.innerHTML = "";
        for (let comment of comments) {
            content.innerHTML += createCommentHTML(comment);
        }
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
        user:  document.querySelector("input[name=user]").value
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