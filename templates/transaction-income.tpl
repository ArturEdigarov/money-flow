<?php
    $class = 'form-money';
    if(isset($_GET['type']) && $_GET['type'] == 'income'){
        $class = $class . ' income-text__color';
        $type = 'income';
    } elseif (isset($_GET['type']) && $_GET['type'] == 'spending'){
        $class = $class . ' spending-text__color';
        $type = 'spending';
    }   else{
        $class = $class . ' income-text__color';
        $type = 'income';
    }
?>

<form method='post' class='payments-form' action="payments.php?type=<?php echo $type ?>">
    <input class='<?php echo $class ?>' inputmode="decimal" type="number" step="0.01" placeholder="0.00" min="0" name='amount'>
    <hr>
    <div class='form-kategorie'> 
        <h4 class='form-text'>Kategorie</h4> 
        <div class='dropdown'>
            <button class='dropdown-button' type='button'>Unknown</button>
            <ul class='dropdown-list'>
                <li class='dropdown-list__item' data-value='Salary'>Salary</li>
                <li class='dropdown-list__item' data-value='Side Job'>Side Job</li>
                <li class='dropdown-list__item' data-value='Bonuses'>Bonuses</li>
                <li class='dropdown-list__item' data-value='Unknown'>Unknown</li>
            </ul>
        </div>
        <input class='dropdown-input-hidden' type='hidden' name='categorie' value='Unknown'>
    </div>
    <hr>
    <div class='form-comment'>
        <h4 class='form-text'>Comment</h4> 
        <input class='form-comment_input' type='text' name='comment'>
    </div>
    <div class='button-pocket'>
    <?php 
        if(!empty($_COOKIE)){
            echo "<button class='form-accept__button' type='submit'>SUBMIT</button>";
        }else{
            echo "<a class='form-accept__button' href='./sign-log.php'>SUBMIT</a>";
        }
    ?>
    </div>
</form>