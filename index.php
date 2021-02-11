<?php



if (isset($_POST['data'])) {


  $jsonData = json_decode(file_get_contents('./test.json'), true);
  $jsonData2 = json_decode(file_get_contents('./data.json'), true);


  if (!array_key_exists("number", $_POST['data']) || !array_key_exists("time_id", $_POST['data'])) {
    exit();
  }




  if (array_key_exists($_POST['data']["number"], $jsonData)) {

    array_unshift($jsonData2, $_POST['data']);

    $length = count($jsonData2);
    echo $length;

    if ($length >= 0) {
      array_splice($jsonData2, 5);
    }

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

  <style>
  .data {
    display: flex;
    align-items: center;
    border: 1px solid orange;
  }

  .first {
    opacity: 0;
    transform: translateX(100vw);
    animation-name: fadeIn;
    animation-duration: 2s;
    animation-delay: 1s;
    animation-fill-mode: forwards;
  }

  @keyframes fadeIn {
    0% {}

    100% {
      transform: none;
      opacity: 1;
    }
  }
  </style>
</head>

<body>
  <div class="main">
    <h2>test</h2>


    <input class="" type="text">
    <button>submit</button>


    <main>


    </main>


    <div class="main2"></div>

  </div>
  <script src="./dist/main.js"></script>
</body>

</html>