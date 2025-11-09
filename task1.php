<?php

// Create constants for app name and author.
define( 'APP_NAME', 'MyApplication' );
define( 'APP_AUTHOR', 'Shahadat Mia' );

// Print them using echo, print, and printf.
echo "Application Name: " . APP_NAME . "</br>";
print "Author: " . APP_AUTHOR . "</br>";
printf( "Welcome to %s by %s\n", APP_NAME, APP_AUTHOR . "</br> </br>" );

// Create variables for food, transport, and other expenses.
$food = 300; 0;
$transport = 1500;
$other = 2000.50;

// Calculate total and average expense.
$total = $food + $transport + $other;
$average = $total / 3;

// If total > 1000, show “Budget Exceeded”, else “Within Budget”.
if ( $total > 1000 ) {
    echo "Budget Exceeded</br>";
} else {
    echo "Within Budget</br>";
}

// Use ternary and switch case for expense range message.
$expenseMessage = ( $total > 1000 ) ? 'Budget Exceeded' : 'Within Budget';
echo $expenseMessage . "</br>";

switch ( true ) {
case ( $total < 500 ):
    echo "Expense Level: Low<br>";
    break;
case ( $total >= 500 && $total <= 1000 ):
    echo "Expense Level: Medium<br>";
    break;
default:
    echo "Expense Level: High<br>";
}

// Write a function to calculate total expense.
function calculateTotalExpense( $food, $transport, $other ) {
    return $food + $transport + $other;
}

// Write another function to check the budget and show the result.
function checkBudget( $total ) {
    return ( $total > 1000 ) ? "Budget Exceeded" : "Within Budget";
}

$calculatedTotal = calculateTotalExpense($food, $transport, $other);
echo "<br>Calculated Total: $calculatedTotal <br>";

echo checkBudget($calculatedTotal);