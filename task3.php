<?php
session_start();

// Handle form submission to store session
if ( isset( $_POST['submit'] ) ) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['budget'] = $_POST['budget'];
    header( "Location: task3.php" ); 
    exit();
}

// Handle session deletion
if ( isset( $_POST['delete'] ) ) {
    session_destroy();
    header( "Location: task3.php" );
    exit();
}

// Recursive function to calculate sum of an array
function recursiveSum( $arr, $index = 0 ) {
    if ( $index >= count( $arr ) ) {
        return 0;
    }

    return $arr[$index] + recursiveSum( $arr, $index + 1 );
}

// Function to apply discount using a callback
function applyDiscount( $amount, $callback ) {
    return $callback( $amount );
}

// Function to divide two numbers with try-catch-finally
function safeDivide( $a, $b ) {
    try {
        if ( $b == 0 ) {
            throw new Exception( "Division by zero not allowed!" );
        }
        $result = $a / $b;
        echo "Result: $result <br>";
    } catch ( Exception $e ) {
        echo "Error: " . $e->getMessage() . "<br>";
    } finally {
        echo "Division attempt finished.<br>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Task 3 - Session & Exception Handling</title>

        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            padding: 20px;
        }
        h2, h3 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="number"] {
            padding: 8px;
            width: 200px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            margin-top: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .info {
            color: #555;
            font-style: italic;
        }
        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 30px 0;
        }
        .session-message {
            background-color: #e7f3fe;
            padding: 10px;
            border-left: 5px solid #2196F3;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
    </head>
    <body>
    <h2>Session and Budget Form</h2>

    <?php
    // Show session data if available
    if ( isset( $_SESSION['name'] ) && isset( $_SESSION['budget'] ) ) {
        echo "<strong>Welcome, " . $_SESSION['name'] . "! Your budget is " . $_SESSION['budget'] . "</strong><br><br>";
    }
    ?>

    <!-- Form to take user input -->
    <form method="post">
        Name: <input type="text" name="name" required><br>
        Budget: <input type="number" name="budget" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <!-- Button to delete session -->
    <form method="post" style="margin-top:10px;">
        <input type="submit" name="delete" value="Delete Session">
    </form>

    <hr>
    <h3>Recursive Sum Example</h3>
    <?php
    $numbers = [10, 20, 30, 40];
    echo "Numbers: " . implode( ", ", $numbers ) . "<br>";
    echo "Recursive Sum: " . recursiveSum( $numbers ) . "<br>";
    ?>

    <hr>
    <h3>Discount Example</h3>
    <?php
    $discountCallback = function ( $amt ) {return $amt * 0.9;}; // 10% discount
    echo "Original Amount: 500<br>";
    echo "Amount after Discount: " . applyDiscount( 500, $discountCallback ) . "<br>";
    ?>

    <hr>
    <h3>Division Example</h3>
    <?php
    safeDivide( 10, 2 ); 
    safeDivide( 10, 0 ); 
    ?>
    </body>
</html>
