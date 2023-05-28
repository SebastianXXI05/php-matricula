<?php
session_start();
require_once(str_replace('/views/dashboard', '/database.php', __DIR__));

error_reporting(0);
ini_set('display_errors', 0);

if ($_SESSION['user_id'] == null) {
  header('location:../../');
}

$id = $_SESSION['user_id'];

$user = mysqli_fetch_array(mysqli_query(connection(), "
  SELECT user_id, name FROM user WHERE user_id = $id;
"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel administrativo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../../js/grades.js" defer></script>
  <link rel="shortcut icon" href="../../assets/logo.png" type="image/x-icon">
</head>

<body>
  <header class="bg-sky-700 py-2">
    <div class="w-11/12 mx-auto flex justify-between items-center">
      <h2 class="text-2xl font-bold text-white"><a href="./"><?= $user['name'] ?></a></h2>
      <a class="text-white border border-white px-4 py-2 rounded" href="../logout.php">Cerrar sesión</a>
    </div>
  </header>
  <div class="w-11/12 mx-auto mt-12">

    <h1 class="text-4xl font-bold text-center">Mis matriculas</h1>
    <div class="mb-2 mt-8">
      <button id="btn-choose-grade" class="px-4 py-2 bg-sky-500 text-white rounded hover:bg-sky-600">
        Crear una nueva matricula
      </button>
    </div>
    <section class="hidden mb-2 border-2 border-gray-500 p-3" id="grades">
      <a href="" id="btn-choose" class="mr-4 px-4 py-2 bg-sky-500 text-white rounded hover:bg-sky-600">
        Grado preecolar
      </a>

      <a href="" id="btn-choose" class="px-4 py-2 bg-sky-500 text-white rounded hover:bg-sky-600">
        Grado primero a once
      </a>
    </section>
    <section class="border border-gray-500 h-96 rounded px-4 py-8 overflow-y-auto">

    </section>
  </div>
</body>

</html>