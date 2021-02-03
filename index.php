<?php



if (isset($_POST['data'])) {


  $jsonData = json_decode(file_get_contents('./test.json'), true);
  $jsonData2 = json_decode(file_get_contents('./data.json'), true);


  if (array_key_exists($_POST['data']["number"], $jsonData)) {

    array_unshift($jsonData2, $_POST['data']);
    file_put_contents('./data.json', json_encode($jsonData2));
  }
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="main">
    <h2>test</h2>


    <input class="" type="text">
    <button>submit</button>


    <main>


    </main>

  </div>
  <script src="./dist/main.js"></script>
</body>

</html>