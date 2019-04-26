 <?php
 function generate_head(){
  $html = <<<HTML
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,400i,700,700i" rel="stylesheet">
  <!-- favicon -->
  <link rel="icon" type="png" href="./img/favicon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- my CSS -->
  <link rel="stylesheet" type="text/css" href="./css/style.css">

HTML;
  echo $html;
}
?>