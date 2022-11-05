<?php

include 'DBConnect.php';

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$clientsRepository = new Repository($dbh);

if (!isset($_SESSION)) {
    session_start();
}

//if (empty($_SESSION['Clients'])) {
//    $_SESSION['Clients'] = new ClientsCollection();
//    $_SESSION['Clients']->defaultClients();
//}

$actionToDo = $_POST['action'];

if ($actionToDo == 'add') {
    if (Client::validationDataClients($_POST)) {
//        $_SESSION['Clients']->addClient(
//            new Client(5, $_POST)
//        );
        $clientsRepository->createClient($_POST);
    }
} elseif ($actionToDo == 'edit') {
    if (Client::validationDataClients($_POST)) {
//        $_SESSION['Clients']->editClient(
//            $_POST
//        );
        $clientsRepository->updateClient($_POST);
    }
} elseif ($actionToDo == 'delete') {
    $clientsRepository->deleteClient($_POST);
}
//elseif ($actionToDo == 'filter') {
//    echo Display::displayClients($_SESSION['Clients']->filterClients($_POST['name'], $_POST['time']));
//}
// elseif ($actionToDo == 'save') {
//    Repository::saveClients($_SESSION['Clients']->clients);
//    var_dump();
//} elseif ($actionToDo == 'load') {
//    $_SESSION['Clients']->clients = Repository::loadClients();
//    var_dump($clientsRepository->readClients());
//}

echo Display::displayClients($clientsRepository->readClients())
?>
<br>

<button onclick="ShowAddForm()"> ADD</button>
<button onclick="ShowEditForm()"> EDIT</button>
<!--<button onclick="ShowFilterForm()"> FILTER</button>-->
<button onclick="ShowDeleteForm()"> DELETE</button>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='addForm'>
    ADD <br>
    <label> name:
        <input type='text' name='name'>
    </label><br>
    <label> phone:
        <input type='text' name='phone'>
    </label><br>
    <label> address:
        <input type='text' name='address'>
    </label><br>
    <label> time:
        <input type='number' name='time'>
    </label><br>
    <label> bill:
        <input type='number' name='bill'>
    </label><br>
    <input type='hidden' name='action' value='add'>
    <input type='submit' value='add'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='editForm'>
    EDIT <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <label> name:
        <input type='text' name='name'>
    </label><br>
    <label> phone:
        <input type='text' name='phone'>
    </label><br>
    <label> address:
        <input type='text' name='address'>
    </label><br>
    <label> time:
        <input type='number' name='time'>
    </label><br>
    <label> bill:
        <input type='number' name='bill'>
    </label><br>
    <input type='hidden' name='action' value='edit'>
    <input type='submit' value='edit'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='deleteForm'>
    Delete <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <input type='hidden' name='action' value='delete'>
    <input type='submit' value='delete'>
</form>

<br>

<!--<form action='--><?//= $_SERVER['PHP_SELF'] ?><!--' method='post' id='filterForm'>-->
<!--    Filter <br>-->
<!--    <label> name:-->
<!--        <input type='text' name='name'>-->
<!--    </label><br>-->
<!--    <label> time:-->
<!--        <input type='number' name='time'>-->
<!--    </label><br>-->
<!--    <input type='hidden' name='action' value='filter'>-->
<!--    <input type='submit' value='filter'>-->
<!--</form>-->
<!---->
<!--<form action='--><?//= $_SERVER['PHP_SELF'] ?><!--' method='post' id='save'>-->
<!--    <input type='hidden' name='action' value='save'>-->
<!--    <input type='submit' value='Save to file'>-->
<!--</form>-->
<!---->
<!--<form action='--><?//= $_SERVER['PHP_SELF'] ?><!--' method='post' id='load'>-->
<!--    <input type='hidden' name='action' value='load'>-->
<!--    <input type='submit' value='Upload from file'>-->
<!--</form>-->

<style>
    #addForm {
        display: none;
    }

    #editForm {
        display: none;
    }

    #filterForm {
        display: none;
    }

    #deleteForm {
        display: none;
    }

    table, th, td {
        border: 1px solid;
        text-align: center;
    }

    th {
        width: 100px;
    }

    td {
        height: 50px;
    }
</style>

<script>
    function ShowAddForm() {
        document.querySelector('#addForm').style.display = 'inline';
    }

    function ShowEditForm() {
        document.querySelector('#editForm').style.display = 'inline';
    }

    // function ShowFilterForm() {
    //     document.querySelector('#filterForm').style.display = 'inline';
    // }

    function ShowDeleteForm() {
        document.querySelector('#deleteForm').style.display = 'inline';
    }

</script>
