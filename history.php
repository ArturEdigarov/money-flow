<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
   require_once './config.php';
   require_once './db.php';
    

    if(isset($_POST['action']) && isset($_POST['id']) && $_POST['action'] == 'delete'){
        $transaction = R::load('transactions', $_POST['id']);
        R::trash($transaction);
        header('Location: history.php?type=' . ($_GET['type'] ?? 'all'));
        exit;
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dropdown.css">
    <link rel="stylesheet" href="./css/all-transactions.css">
    <link rel="stylesheet" href="./css/transaction-processing.css">
</head>
<body>
<?php
    require_once './templates/page_parts/header.tpl'
?>
    <div class='history-navigarion'>
        <div class='transaction-navigation'>
             <nav class="transaction__nav">
                 <ul class="transaction__list-history">
                    <li><a class='
                     <?php 
                         if (isset($_GET['type']) && $_GET['type'] == 'all'){
                            echo 'transactions-active';
                         }elseif(!isset($_GET['type'])){
                            echo 'transactions-active';
                         }else {
                            echo '';
                         }             
                     ?>
                     ' href="?type=all">All</a></li>
                     <li><a class='
                     <?php 
                         if (isset($_GET['type']) && $_GET['type'] == 'income'){
                             echo 'transactions-active';
                         }else {
                             echo '';
                         }
                     ?>
                     ' href="?type=income">Income</a></li>
                     <li><a class='
                     <?php 
                         if (isset($_GET['type']) && $_GET['type'] == 'spending'){
                             echo 'transactions-active';
                         }else {
                             echo '';
                         }             
                     ?>
                     ' href="?type=spending">Spending</a></li>
                 </ul>
             </nav>
         </div>
    </div>
    <section class='transactions-history'>
        <div class='container'>
            <div class='history-description'>
                <h1 class='description-name'>History</h1>
                <h1 class='description-name'></h1>
                <h1 class='description-name'></h1>
            </div>
            <?php
                if(isset($_GET['type']) && $_GET['type'] === 'income'){
                    require_once './templates/transaction-history-income.tpl';
                } elseif (isset($_GET['type']) && $_GET['type'] === 'spending') {
                    require_once './templates/transaction-history-spending.tpl';
                } elseif (isset($_GET['type']) && $_GET['type'] === 'all') {
                    require_once './templates/transaction-history-all.tpl';
                }else {
                    require_once './templates/transaction-history-all.tpl';
                }
            ?>
        </div>
    </section>
<script src='./script/hidden-details.js'></script>
</body>
</html>