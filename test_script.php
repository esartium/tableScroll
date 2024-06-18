<?

$conn = mysqli_connect("localhost", "kekert13ic", "1BMP\$8mJ1K5XUYX5", "kekert13ic");

    if($conn->connect_error) {
        die("Ошибка соединения: " . $conn->connect_error);
    }
    
// Заполнение таблицы:
// $femNames = ["Виктория", "Анастасия", "Екатерина", "Евгения", "Александра", "Василиса", "Мария", "Софья", "Кристина", "Дарья", "Елена", "Аглая", "Алиса", "Анна"];
// $maleNames = ["Константин", "Борис", "Никита", "Дмитрий", "Егор", "Серафим", "Александр", "Иван", "Евгений", "Андрей", "Максим", "Ерофей", "Глеб", "Афанасий"];
// $femSurnames = ["Карасевич", "Джугашвили", "Шацких", "Кравец", "Кличко", "Костромская", "Болдырева", "Иванова", "Соколова", "Михайлова", "Орлова", "Комарова", "Алексеева", "Цветкова", "Константинова"];
// $maleSurnames = ["Карасевич", "Джугашвили", "Шацких", "Кравец", "Кличко", "Костромской", "Болдырев", "Иванов", "Соколов",  "Михайлов", "Орлов", "Комаров", "Алексеев", "Цветков", "Константинов"];
// $phones = ["88005553535", "+79009525607", "89525916852", "88005555550", "79805393726", "88002509639", "88005555505", "88002009002", "88002009555", "88007005800", "0123456789", "9876543210", "1234512345", "1234554321", "0987667890"];

// for ($i = 0; $i < count($femNames); $i++) {
//     for ($j = 0; $j < count($femSurnames); $j++) {
//         for ($k = 0; $k < count($phones); $k++) {
//     echo $femNames[$i] . " " . $femSurnames[$j] . " " . $phones[$k] . '<br>';
//     mysqli_query($conn, "INSERT INTO `list_of_people` (`name`, `surname`, `phone`) VALUES ('$femNames[$i]', '$femSurnames[$j]', '$phones[$k]')");
//     echo $maleNames[$i] . " " . $maleSurnames[$j] . " " . $phones[$k] . '<br>';
//     mysqli_query($conn, "INSERT INTO `list_of_people` (`name`, `surname`, `phone`) VALUES ('$maleNames[$i]', '$maleSurnames[$j]', '$phones[$k]')");
//         }
//     }
// }
    
    if (isset($_POST['beginStr']) && isset($_POST['numberStrs'])) {
        // id начальной строки:
            $beginStr = $_POST['beginStr']; 
        // нужное количество строк:
            $numberStrs = $_POST['numberStrs'];
        } else {
            echo "Входные данные не были получены";
        }

$rightBorder = $beginStr - 1 + $numberStrs;

    $mass = [];
    
    for ($i = $beginStr; $i <= $rightBorder; $i++) {
    $query = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `list_of_people` WHERE `id` = $i"));
    array_push($mass, $query);
    }
    
    header('Content-Type: application/json');
    echo json_encode($mass);

?>