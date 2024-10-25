<?php
session_start();

require_once 'Balance.php';
require_once 'Game.php';

$balance = new Balance();
if (!$_SESSION['user_balance']) {
    $balance->addBalance(100);
}

if (!empty($_POST['submit_bet'])) {
    if (empty($_POST['bet'])) {
        $_SESSION['message'] = "Please select your Bet";
    } else {
        $game = new Game($balance);
        $game->substractBalance(10);
        $dice1 = $game->rollDice();
        $dice2 = $game->rollDice();
        $total = $dice1 + $dice2;
        $result = $game->result($total, $_POST['bet']);
        $latestBalance = $balance->getBalance();
        if (!$result) {
            $_SESSION['message'] = "Your Answer wrong. Play Again your balance is now $latestBalance";
        } else {
            $_SESSION['message'] = "Congratulations! You win! your balance is now $latestBalance";
        }
    }
} else if (!empty($_POST['reset_bet'])) {
    $game = new Game($balance);
    $game->setDefaultBalance();
    session_destroy();
    header("Location:index.php");
    exit;
} else if (!empty($_POST['continue_bet'])) {
    header("Location:index.php?method=continue_bet");
    exit;
}
?>

<html>

<head>
    <title>Lucky 7 Game</title>
    <style>
        .form-row {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Welcome to Lucky 7 Game</h2>
    <form name="play-game" id="play-game" method="post" action="">
        <div class="form-row">
            <label>Place your bet (Rs 10): </label>
            <select name="bet" id="bet">
                <option value="">--Select your betting option--</option>
                <option value="below_7" <?php echo !empty($_POST['bet']) && $_POST['bet'] === 'below_7' ? "selected" : '' ?>>Below 7</option>
                <option value="above_7" <?php echo !empty($_POST['bet']) && $_POST['bet'] === 'above_7' ? "selected" : '' ?>>Above 7</option>
                <option value="same" <?php echo !empty($_POST['bet']) && $_POST['bet'] === 'same' ? "selected" : '' ?>>7</option>
            </select>
        </div>
        <div>
            <?php if (empty($_POST['bet']) || (!empty($_GET['method']) && $_GET['method'] === 'continue_bet')) { ?>
                <input type="submit" name="submit_bet" value="Place a Bet" />
            <?php } ?>

            <input type="submit" name="reset_bet" value="Reset and Play Again" />
            <input type="submit" name="continue_bet" value="Continue Playing" />
        </div>
        <?php if (!empty($_SESSION['message'])) { ?>
            <div class="game-result">
                <h2>Game Results</h2>
                <h4>Dice 1: <?php echo !empty($dice1) ? $dice1 : ''; ?></h4>
                <h4>Dice 2: <?php echo !empty($dice2) ? $dice2 : ''; ?></h4>
                <h4>Total: <?php echo !empty($total) ? $total : ''; ?></h4>
                <?php if ($_SESSION['message']) { ?>
                    <h3 class="message">
                        <?php echo $_SESSION['message']; ?>
                    </h3>
                <?php
                    unset($_SESSION['message']);
                } ?>
            </div>
        <?php } ?>

    </form>
</body>

</html>