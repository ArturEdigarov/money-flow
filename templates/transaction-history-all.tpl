<?php 
if(!empty($_COOKIE)){
    $login = $_COOKIE['login']; 
    $incomes = R::findAll('transactions', 'user = ? ORDER BY time DESC', [$login]);
    if(empty($incomes)){
        echo "<h1 class='no-transactions'>You do not have any transactions</h1>";
    }
    foreach($incomes as $transaction):
        
?>

            <div class='transaction-history__item' onclick="toggleDetails(this)">
                <div class='transaction-main'>
                    <div class='history_info-pocket'>
                    <div class='history_categorie-items'>
                        <?php
                            switch ($transaction['categorie']) {
                                case 'Food':
                                    echo "<img src='/img/icons/food_bank.svg' alt='food'>";
                                    break;
                                case 'Fuel':
                                    echo "<img src='/img/icons/local_gas_station.svg' alt='fuel'>";
                                    break;
                                case 'Shopping':
                                    echo "<img src='/img/icons/shopping_cart.svg' alt='shopping'>";
                                    break;
                                case 'Transport':
                                    echo "<img src='/img/icons/swap_vert.svg' alt='transport'>";
                                    break;
                                case 'Unknown':
                                    echo "<img src='/img/icons/warning_amber.svg' alt='unknown' width='60' height='61'>";
                                    break;
                                case 'Salary':
                                    echo "<img src='/img/icons/card_travel.svg' alt='salary'>";
                                    break;
                                case 'Side Job':
                                    echo "<img src='/img/icons/podrabotka_dark_green.svg' alt='side job'>";
                                    break;
                                case 'Bonuses':
                                    echo "<img src='/img/icons/bonuses_pastel_pink.svg' alt='bonuses'>";
                                    break;
                            }
                        ?>
                    </div>
                    <div class='history_categorie-date'>
                         <h3 class='history-item__name'> <?php echo $transaction['categorie'] ?></h3>
                         <h4 class='history-item__date'> <?php echo date('d F', strtotime($transaction['time'])); ?></h4>
                    </div>
                    </div>


                    <h2 class='history-item__amount 
                    <?php 
                    if($transaction->value == 'spending'){
                        echo 'red-spending-color';
                    }else{
                        echo '';
                    }
                    ?>
                    '>
                    <?php 
                    if($transaction->value == 'spending'){
                        echo '- ' . $transaction['amount'] . ' $';
                    }else{
                        echo '+ ' . $transaction['amount'] . ' $';
                    }

                    ?>

                    </h2>
                    
                </div>

                <div class='history-item__details'>
                    <h4 class='details-comment__title'>Comment:</h4>
                   <h1 class='details-comment'>
                        <?php
                            if(!empty($transaction['comment'])){
                                echo $transaction['comment'];
                            }else{
                                echo 'no comments'; 
                            }
                        ?>
                   </h1>
                   <form method='POST' class='details-delete__pocket'>
                        <input type='hidden' name='id' value='<?php echo $transaction['id']?>'>
                        <button name='action' value='delete' class='details-delete'>Delete</button>
                   </form>
                </div>

            </div>
<?php 
endforeach; 
}else {
    echo "<h1 class='no-transactions'>You do not have any transactions</h1>";
}
?>
