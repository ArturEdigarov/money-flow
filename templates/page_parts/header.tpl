    <header class="header">
            <div class='container'>   
                <div class="logo-register">
                    <div class="header__logo">
                        <h1 class="header__logo-text"></h1>
                    </div>
    
                <nav class="header__nav">
                    <ul class="header__list">
                        <li><a class='<?php echo ($currentPage === 'index.php') ? 'active' : ''; ?>' href="/index.php">Spend Analytics</a></li>
                        <li><a class='<?php echo ($currentPage === 'payments.php') ? 'active' : ''; ?>' href="/payments.php">Payments</a></li>
                        <li><a class='<?php echo ($currentPage === 'history.php') ? 'active' : ''; ?>' href="/history.php">History</a></li>
                    </ul>
                </nav>
            </div>
    </header>