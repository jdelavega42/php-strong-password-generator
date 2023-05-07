<?php session_start();
include 'functions.php';

$numbers = range(0, 9);
$alphabet = array_merge(range('A', 'Z'), range('a', 'z'));
$symbols = ["!", "@", "#", "$", "%", "^", "&", "*"];

$my_password = '';
$my_pot = [];

if (isset($_GET['repeat'])) {
    $repeat = $_GET['repeat'];
};
if (isset($_GET['has_alphabet'])) {
    $has_alphabet = $_GET['has_alphabet'];
    var_dump($has_alphabet);
    if($has_alphabet){
        $my_pot = array_merge($my_pot, $alphabet);
    };
};
if (isset($_GET['has_numbers'])) {
    $has_numbers = $_GET['has_numbers'];
    var_dump($has_numbers);
    if($has_numbers){
        $my_pot = array_merge($my_pot, $numbers);
    };
};
if (isset($_GET['has_symbols'])) {
    $has_symbols = $_GET['has_symbols'];
    var_dump($has_symbols);
    if($has_symbols){
        $my_pot = array_merge($my_pot, $symbols);
    };
};
if (isset($_GET['psw_length'])) {
    $psw_length = $_GET['psw_length'];
    $my_password = password_generator($my_pot, $psw_length, $repeat);
};
if(!empty($my_password)){
    $_SESSION['my_password'] = $my_password;
    header("Location: result.php");
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <form action="index.php" method="GET">
        <label for="psw_length">Lunghezza password:</label>
        <input type="number" name="psw_length" id="psw_length">
        <button type="submit">Invia</button>

        <label for="repeat">Sì</label>
        <input type="radio" name="repeat" id="repeat" value="true">
        <label for="norepeat">No</label>
        <input type="radio" name="repeat" id="norepeat" value="false" checked>

        <label for="has_alphabet">Lettere</label>
        <input type="checkbox" name="has_alphabet" id="has_alphabet">

        <label for="has_numbers">Numeri</label>
        <input type="checkbox" name="has_numbers" id="has_numbers">

        <label for="has_symbols">Simboli</label>
        <input type="checkbox" name="has_symbols" id="has_symbols">
    </form>
    <?php if($my_password) { ?>
        <p>La password é <?php echo $my_password; ?></p>
    <?php } ?>
        
</body>
</html>