<?php
session_start();
if (!isset($_SESSION['current_user'])) {
    header('Location: index.php');
    exit();
}

require "dbBroker.php";
require "model/Knjiga.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Knjiga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="naslov">
        <h1>Biblioteka</h1>
    </div>

    <div class="navigacija">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pozajmica.php">Pozajmica</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="knjiga.php">Knjiga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="clan.php">Član</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</div>

<div class="forma">
    <form id="formaKnjiga">
        <div class="naslovForma">
            <h3>Dodaj knjigu</h3>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="ID"  name="id" readonly>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Naziv"  name="naziv">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pisac"  name="pisac">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Žanr"  name="zanr">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Opis" name="opis" >
        </div>
        <div class="input-group mb-3">
            <input type="date" class="form-control" placeholder="Datum izdavanja"  name="datumIzdavanja">
        </div>

        <div class="formaBtn">
            <button type="submit" class="sacuvajBtn">Sačuvaj</button>
            <button type="reset" class="resetBtn">Reset</button>
            <button type="button" class="obrisiBtn">Obriši</button>
        </div>
    </form>
</div>

<div class="prikazPodataka">
    <div class="d-flex p-1 justify-content-between">
        <h3>Knjige</h3>
        <div class="w-25 p-3">
            <input class="form-control" type="text" placeholder="pretraga" id="pretraga">
        </div>
        <div>
            <input class="form-control" type="button" id="sortBtn" value="sortiraj">
        </div>
    </div>

    <div class="prikazTabela">
        <table class="table">
            <thead class="thead">
            <tr>
                <th scope="col">
                    ID
                </th>
                <th scope="col">
                    Naziv
                </th>
                <th scope="col">
                    Pisac
                </th>
                <th scope="col">
                    Žanr
                </th>
                <th scope="col">
                    Opis
                </th>
                <th scope="col">
                    Datum izdavanja
                </th>
                <th scope="col">

                </th>
            </tr>

            </thead>
            <tbody id="tabela">
            <?php
                $knjige=Knjiga::getAll($conn);
                while(($knjiga=$knjige->fetch_assoc())!=null){ ?>
                   <tr>
                       <td><?=$knjiga['id']?></td>
                       <td><?=$knjiga['naziv']?></td>
                       <td><?=$knjiga['pisac']?></td>
                       <td><?=$knjiga['zanr']?></td>
                       <td><?=$knjiga['opis']?></td>
                       <td><?=$knjiga['datumIzdavanja']?></td>
                       <td><input type="radio" name="knjigaCheck" value="<?=$knjiga["id"]?>"></td>
                   </tr>
               <?php }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/knjiga.js"></script>
<script src="js/pretraga.js"></script>
<script src="js/sortiranje.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
