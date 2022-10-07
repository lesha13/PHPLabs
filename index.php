<?php
function defaultDataClients() {
    return [
        [
            'id' => 1,
            'name' => 'Bob',
            'phone' => '313-570-0255',
            'address' => 'Kyiv',
            'time' => 120,
            'bill' => 120 * 2.5,
        ],
        [
            'id' => 2,
            'name' => 'Jack',
            'phone' => '860-640-5534',
            'address' => 'Lviv',
            'time' => 60,
            'bill' => 60 * 2.5,
        ],
        [
            'id' => 3,
            'name' => 'Jack',
            'phone' => '123-859-2041',
            'address' => 'Lviv',
            'time' => 40,
            'bill' => 40 * 2.5,
        ],
        [
            'id' => 4,
            'name' => 'John',
            'phone' => '732-337-1842',
            'address' => 'Dnipro',
            'time' => 30,
            'bill' => 30 * 2.5,
        ]
    ];
}

function CreateNewClient($array, $id) {
    return [
        'id' => $id,
        'name' => $array['name'],
        'phone' => $array['phone'],
        'address' => $array['address'],
        'time' => $array['time'],
        'bill' => $array['bill'],
    ];
}

function validationDataClients($array) {
    return !(
        empty($array['name']) ||
        empty($array['phone']) ||
        empty($array['address']) ||
        empty($array['time']) ||
        empty($array['bill']) ||
        $array['time'] < 0 ||
        $array['bill'] < 0 ||
        !isset($array)
    );
}

function filterByNameTime($arr, $name, $time) {
    return array_filter($arr,
        function ($value) use ($name, $time) {
            return ($value["name"] == $name and $value["time"] > $time);
        });
}

function displayTableClients($array, $caption)
{
    $table = '<table>';
    $table .= "<caption> $caption </caption>";
    $table .= '<tr> <th>id</th> <th>name</th> <th>phone</th> <th>address</th> <th>time</th> <th>bill</th> </tr>';

    foreach ($array as $item) {
        $table .= "<tr>" .
            "<td>$item[id]</td><td>$item[name]</td><td>$item[phone]</td>" .
            "<td>$item[address]</td><td>$item[time]</td><td>$item[bill]</td>" .
            "</tr>";
    }

    $table .= '</table>';
    echo $table;
}

session_start();

// setting default values
if (empty($_SESSION)) {
    $_SESSION['Clients'] = defaultDataClients();
}

// adding client
if ($_POST['action'] == 'add'){
    if (validationDataClients($_POST)) {
        $nextClientId = count($_SESSION['Clients']) + 1;
        array_push($_SESSION['Clients'], CreateNewClient($_POST, $nextClientId));
    }
}

// editing client
if ($_POST['action'] == 'edit'){
    if (validationDataClients($_POST)) {
        $idToEdit = $_POST['id'];
        foreach ($_SESSION['Clients'] as $key => $value) {
            if ($value['id'] == $idToEdit) {
                $_SESSION['Clients'][$key] = CreateNewClient($_POST, $idToEdit);
                break;
            }
        }
    }
}

// filtering clients
if ($_POST['action'] == 'filter'){
    displayTableClients(
            filterByNameTime($_SESSION['Clients'], $_POST['name'] , $_POST['time']), 'Specified clients'
    );
}

// display all clients
displayTableClients($_SESSION['Clients'], 'Clients');
?>
<br>

<button onclick="ShowAddForm()"> ADD </button>
<button onclick="ShowEditForm()"> EDIT </button>
<button onclick="ShowFilterForm()"> FILTER </button>

<br>

<form action='<?= $_SERVER['PHP_SELF']?>' method='post' id='addForm'>
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
    <input type='submit'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF']?>' method='post' id='editForm'>
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
    <input type='submit'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF']?>' method='post' id='filterForm'>
    Filter <br>
    <label> name:
        <input type='text' name='name'>
    </label><br>
    <label> time:
        <input type='number' name='time'>
    </label><br>
    <input type='hidden' name='action' value='filter'>
    <input type='submit'>
</form>


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
    table, th, td {
        border: 1px solid;
        text-align: center;
    }
    th {
        width: 100px;
    }
    td {
        height: 50px;s
    }
</style>

<script>
function ShowAddForm() {
    document.querySelector('#addForm').style.display = 'inline';
}
function ShowEditForm() {
    document.querySelector('#editForm').style.display = 'inline';
}
function ShowFilterForm() {
    document.querySelector('#filterForm').style.display = 'inline';
}
</script>