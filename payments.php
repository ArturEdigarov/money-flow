<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
   require_once './config.php';
   require_once './db.php';


    $type = $_GET['type'] ?? 'income';
if(!empty($_COOKIE)){
    if (isset($_GET['type']) && $_GET['type'] == 'spending' && isset($_POST['amount'])  && $_POST['amount'] !== ''){
            $transaction = R::dispense('transactions');
            $transaction->amount = $_POST['amount'];
            $transaction->categorie = $_POST['categorie'];
            $transaction->comment = $_POST['comment'];
            $transaction->time = date('Y-m-d H:i:s');
            $transaction->value = $_GET['type'];
            $transaction->user = $_COOKIE['login'];
            $id = R::store($transaction);
            header("Location: payments.php?type=" . $_GET['type']);
            exit;
    }   elseif (isset($_GET['type']) && $_GET['type'] == 'income' && isset($_POST['amount']) && $_POST['amount'] !== ''){
            $transaction = R::dispense('transactions');
            $transaction->amount = $_POST['amount'];
            $transaction->categorie = $_POST['categorie'];
            $transaction->comment = $_POST['comment'];
            $transaction->time = date('Y-m-d H:i:s');
            $transaction->value = $_GET['type'];
            $transaction->user = $_COOKIE['login'];
            $id = R::store($transaction);
            header("Location: payments.php?type=" . $_GET['type']);
            exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/transaction-processing.css">
    <link rel="stylesheet" href="./css/dropdown.css">
    
</head>
<body>
<?php
    require_once './templates/page_parts/header.tpl'
?>

    <section class='transaction-processing'>
        <div class='container'>
            <div class='transaction-header'>

                <div class='transaction-cancel'>
                    <button class='transaction-cancel__button'>
                        <a class='cancel-symbol' href="<?= $_SERVER['PHP_SELF'] ?>">×</a>
                    </button>
                </div>
                <div class='transaction-navigation'>
                    <nav class="transaction__nav">
                        <ul class="transaction__list">
                            
                            <li><a class='
                            <?php 
                                if (isset($_GET['type']) && $_GET['type'] == 'income'){
                                    echo 'transactions-active';
                                } elseif (!isset($_GET['type'])){
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

                <div class='transaction-accept'>
                    <button class='transaction-accept__button'>
                        <h1 class='accept-symbol'></h1>
                    </button>
                </div>
            </div>
            <div class='transaction-main'>
                <?php
                    if (isset($_GET['type']) && $_GET['type'] == 'income') {
                        require_once './templates/transaction-income.tpl';
                    } elseif (isset($_GET['type']) && $_GET['type'] == 'spending'){ 
                        require_once './templates/transaction-spending.tpl';
                    } else {
                        require_once './templates/transaction-income.tpl';
                    }
                ?>
            </div>
        </div>
    </section>    
    <script src='./script/dropdown.js'></script>
</body>
</html>