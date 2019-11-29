<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href='{BASE}'>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>{$titulo}</title>
</head>
<body>
<nav>
    <a href="{BASE}administrador">Menú</a>
    <a href="{BASE}user/logout">Log out</a>
    <a href="{BASE}user/admin/get">Administrar Usuarios</a>
</nav>
<h1>{$titulo}</h1>