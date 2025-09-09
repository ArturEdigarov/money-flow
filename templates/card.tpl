<?php
if(!empty($_COOKIE)){
    $login = $_COOKIE['login']; 

$x = ''; 
$categories = [
    'Food' => "<img src='/img/icons/food_bank.svg' alt='food'>",
    'Fuel' => "<img src='./img/icons/local_gas_station.svg' alt='fule'>",
    'Transport' => "<img src='/img/icons/swap_vert.svg' alt='transport'>",
    'Unknown' => "<img src='/img/icons/warning_amber.svg' alt='unknown' width='60' height='61'>",
    'Shopping' => "<img src='./img/icons/shopping_cart.svg' alt='shopping'>",
    'Salary' => "<img src='./img/icons/card_travel.svg' alt='Salary'>",
    'Side Job' => "<img src='./img/icons/podrabotka_dark_green.svg' alt='Side Job'>",
    'Bonuses' => "<img src='./img/icons/bonuses_pastel_pink.svg' alt='Side Job'>"
];


foreach($categories as $item => $icon){
    $transactions = R::findAll('transactions', 'categorie = ? AND user = ?', [$item, $login]);
    if(!empty($transactions)){
        
        $negativCount = 0;
        $positivCount = 0;
        $positivTotalCost = 0;
        $negativTotalCost = 0;

        foreach($transactions as $i){
            if($i->value == 'income'){
                $positivCount++;
                $positivTotalCost += $i->amount;
            }elseif($i->value == 'spending'){
                $negativCount++;
                $negativTotalCost += $i->amount;
            }
        }
        $img = $icon;
        $categorie = $item;
        if(isset($_GET['type']) &&  $_GET['type'] == 'income'){
            $cost = $positivTotalCost;
            $calculator = $positivCount;
            $x .= "$cost, ";
            if($cost > 0){
                include './templates/page_parts/cards/universal-card.tpl';
            }
        }elseif(isset($_GET['type']) &&  $_GET['type'] == 'spending'){
            $cost = $negativTotalCost;
            $calculator = $negativCount; 
            $x .= "$cost, ";
            if($cost > 0){
                include './templates/page_parts/cards/universal-card.tpl';
            }    
        }else{
            $cost = $positivTotalCost;
            $calculator = $positivCount;
            $x .= "$cost, ";
            if($cost > 0){
                include './templates/page_parts/cards/universal-card.tpl';
            }
        }
    }elseif(empty($transactions)){
        $x .= '0, ';
    }
}
}else {
    echo "<h1 class='no-transactions'>You do not have any transactions</h1>";
}

?>
