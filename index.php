
<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
   require_once './config.php';
   require_once './db.php';
   $x = '';
   if(!empty($_POST) && $_POST['username'] == 'sign-out'){
        setcookie('login', '', time() - 3600, '/'); 
        header('Location: /sign-log.php'); 
        exit();
   }
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- iOS PWA -->
    <meta name="apple-mobile-web-app-title" content="Garov">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/icons/icon_180x180.png">
    <link rel="apple-touch-icon" sizes="192x192" href="/img/icons/icon_192x192.png">
    <link rel="apple-touch-icon" sizes="512x512" href="/img/icons/icon_512x512.png">


    <!-- Android PWA -->
    <link rel="manifest" href="/manifest.json?v=2">
    <meta name="theme-color" content="#0000000">


    <!-- icon browser -->
    <link rel="icon" href="/img/icons/main_icon.png" type="image/png">

    <title>Garov</title>

    <!-- styles -->
    <link rel="stylesheet" href="./css/dropdown.css">
    <link rel="stylesheet" href="./css/transaction-processing.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style.php">
    <link rel="stylesheet" href="./css/index-dropdown__changes.css">



</head>
<body>
<section class='main'>
<?php
    require_once './templates/page_parts/header.tpl'
?>
    <section class='content'>
        <section class='diagram'>
        <div class='container'>
            <div class='account-spend__pocket'>
                <h1 class='diagram-title'>Spend Analytics</h1>
                <?php 
                    if(!empty($_COOKIE['login'])){
                        echo "<form method='post' class='user-signout__form'>
                                <div class='dropdown'>
                                    <button class='dropdown-button' type='button'>{$_COOKIE['login']}`s</button>
                                    <ul class='dropdown-list'>
                                        <button class='dropdown-list__item' type='submit' data-value='sign-out'>Sign out</button>
                                    </ul>
                                </div>
                                <input class='dropdown-input-hidden' type='hidden' name='username' value='user'>
                            </form>
                        ";
                    }else{
                        echo "<a class='form-accept__button' href='./sign-log.php'>Sign in</a>";
                    }
                
                ?>
            </div>

            <div class='diagram-main'>
                <div class='diagram-main__pocket'>
                    <div class='diagram-main__img'>
                        <canvas class='doughnut-graphic' id="myChart"></canvas>
                    </div>                
                </div>
            <?php if(isset($_GET['type']) && $_GET['type'] == 'income'){ ?>
                <div class='diagram-main__list'>
                    <div>
                        <span class="circle yellow"></span>
                        <h3 class='diagram-main__list-kategorie'>Salary</h3>
                    </div>
                    <div>
                        <span class="circle dark-green"></span>
                        <h3 class='diagram-main__list-kategorie'>Side Job</h3>
                    </div>
                    <div>
                        <span class="circle pink"></span>
                        <h3 class='diagram-main__list-kategorie'>Bonuses</h3>
                    </div>
                    <div>
                        <span class="circle red"></span>
                        <h3 class='diagram-main__list-kategorie'>Unknown</h3>
                    </div>
                </div>
            <?php  }elseif(isset($_GET['type']) && $_GET['type'] == 'spending'){?> 
                <div class='diagram-main__list'>
                    <div>
                        <span class="circle green"></span>
                        <h3 class='diagram-main__list-kategorie'>Food</h3>
                    </div>
                    <div>
                        <span class="circle blue"></span>
                        <h3 class='diagram-main__list-kategorie'>Shopping</h3>
                    </div>
                    <div>
                        <span class="circle orange"></span>
                        <h3 class='diagram-main__list-kategorie'>Fuel</h3>
                    </div>
                    <div>
                        <span class="circle violet"></span>
                        <h3 class='diagram-main__list-kategorie'>Transport</h3>
                    </div>
                    <div>
                        <span class="circle red"></span>
                        <h3 class='diagram-main__list-kategorie'>Unknown</h3>
                    </div>
                </div>
            <?php }else {?>
                <div class='diagram-main__list'>
                    <div>
                        <span class="circle yellow"></span>
                        <h3 class='diagram-main__list-kategorie'>Salary</h3>
                    </div>
                    <div>
                        <span class="circle dark-green"></span>
                        <h3 class='diagram-main__list-kategorie'>Side Job</h3>
                    </div>
                    <div>
                        <span class="circle pink"></span>
                        <h3 class='diagram-main__list-kategorie'>Bonuses</h3>
                    </div>
                    <div>
                        <span class="circle red"></span>
                        <h3 class='diagram-main__list-kategorie'>Unknown</h3>
                    </div>
                </div>
            <?php }?>
            </div>
        </div>
        </section>
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
                                    echo 'transaction-black';
                                }
                            ?>
                            ' href="?type=income">Income</a></li>
                            <li><a class='
                            <?php 
                                if (isset($_GET['type']) && $_GET['type'] == 'spending'){
                                    echo 'transactions-active';
                                }else {
                                    echo 'transaction-black';
                                }             
                            ?>
                            ' href="?type=spending">Spending</a></li>
                        </ul>
                    </nav>
                </div>
        <section class='spend-cards'>
            <div class='container'>
                <div class='cards-pocket'>
                <?php
                    if(!empty($_COOKIE)){
                        $login = $_COOKIE['login']; 
                        $all = R::findAll('transactions', 'user = ? ORDER BY time DESC', [$login]);
                    }
                    if(empty($all)){
                        echo "<h1 class='no-transactions'>You do not have any transactions</h1>";
                    }else{
                        require_once './templates/card.tpl';
                    }
                    
                ?>
                </div>
            </div>
        </section>
    </section>
    <!-- footer
    <footer class="footer">
        <button class='circle footer-button'><a class='footer-button__text' href="/payments.php">+</a></button>
    </footer> -->
</section>
<script>
    let sum = [<?php echo $x?>];
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./script/doughnut.js"></script>    
<script src='./script/dropdown.js'></script>

</body>
</html>
<div></div>