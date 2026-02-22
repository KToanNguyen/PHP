<!DOCTYPE html>
<html lang="en"> <!-- Header page -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Resumé</title>
    <link href="css/normalize.css" rel="stylesheet"> <!-- Normalize.css before main CSS -->
    <style>  /* "Homemade" CSS */
        html{
            box-sizing: border-box;
            width: 90%;
            margin: 2% auto;
        }

        body{
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        header, footer{
            padding: 0.5rem 0.5rem 0.5rem 2rem;
            background-color: rgb(60, 65, 71);
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: white;
        }

        main{
            background-color: white;
            padding: 2%;
        }

        fieldset{
            border: .2rem solid rgb(84, 89, 96);
            padding: 1rem;
            margin-bottom: 2rem;
        }

        input, textarea{
            width: 97.5%;
            min-width: 97.5%;
            padding: .8rem;
            margin: 1rem 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border: .15rem solid rgb(84, 89, 96);
        }

        legend{
            padding: 0.5rem 0.1rem;
            font-size: 120%;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: rgb(60, 65, 71);
        }

        #big{
            padding: .5rem 1rem;
            font-size: 150%;
            margin: 1rem 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border: .2rem solid rgb(84, 89, 96);
        }

        button{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: rgb(84, 89, 96);
            color: white;
            padding: .6rem 1.5rem;
            margin-left: .15%;
            cursor: pointer;
            border: none;
        }
    </style>
</head>

<body>
    <header>
        <h1>Easy Resumé</h1> <!-- Header -->
    </header>