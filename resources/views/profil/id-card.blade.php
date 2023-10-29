<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            background: black;
        }
        .container{
            background: white;
            width: 350px;
            height: 500px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            overflow: hidden;
            border-radius: 10px;
        }

        .info img{
            border: 2px solid black;
            /* border-radius: 50%; */
            width: 170px;
            position: relative;
            left: 50%;
            transform: translate(-50%);
        }

        .info h1{
            text-align: center;
            color: white;
            margin-bottom: 35px;
        }
        .info h3{
            text-align: center;
        }
        .circle1{
            width: 550px;
            height: 550px;
            background-color: #14b8a6;
            border-radius: 20%;
        }
        .circle2{
            width: 500px;
            height: 500px;
            background-color: white;
            border-radius: 70%;
            position: relative;
            top: -300px;
            left: 25px;
        }
        .bg{
           position: relative; 
           top: 20px;
           left: -100px;
        }
        .info{
            position: absolute;
            top: 40px;
            width: 100%;
        }
        .label{
            color: #14b8a6;
        }
        .value{
            color: black;
            margin-bottom: 10px;
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="bg">
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
        <div class="info">
            @foreach ($mahasiswa as $mhs)
                <img src="img/{{ $mhs->nim }}.svg" alt="">
                <h1>Kartu Mahasiswa</h1>
                <h3 class="label">Nim</h3>
                <h3 class="value">{{ $mhs->nim }}</h3>
                <h3 class="label">Nama</h3>
                <h3 class="value">{{ $mhs->user->name }}</h3>
                <h3 class="label">Kelas</h3>
                <h3 class="value">{{ $mhs->classroom->name }}</h3>
            @endforeach
        </div>
    </div>
</body>
</html>