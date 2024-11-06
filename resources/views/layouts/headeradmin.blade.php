<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link href="/css/bootstrap.min.css" rel="stylesheet">
         <style>
        .admin-menu {
            background-color: #343a40;
            padding: 10px;
        }
        .admin-menu a {
            color: white; 
            margin-right: 15px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .admin-menu a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container-fluid">
   <nav class="admin-menu d-flex justify-content-center">
            <a href="/classes">Liste Classes</a>
            <a href="/courses_admin">Cours</a>
            <a href="/chapitre">Chapitres</a>
            <a href="/exercises_admin">Exercices</a>
            <a href="/corrections_admin">Corrections Exos</a>
            <a href="/corrections_evaluations">Corrections Eval</a>
            <a href="/td_admin">TD</a>
            <a href="/tp_admin">TP</a>
            <a href="/profs_admin">Profs</a>
            <a href="/materials_admin">materielles</a>
            <a href="/evaluations">evaluations</a>
            <a href="/exams">Exams</a>
        </nav>