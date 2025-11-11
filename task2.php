<?php

// Create an array with categories and expenses
$expenses = [
    "Food" => 2500,
    "Transport" => 1200,
    "Utilities" => 1800,
    "Entertainment" => 900
];

//Use array functions like array_push, array_pop, array_merge, and array_sum.
$extraExpenses = [
    "Health" => 600,
    "Education" => 1500
];

array_push($expenses['Food'], 300);
array_pop($expenses);
array_merge($expenses, $extraExpenses);
array_sum($expenses);

//Convert a string of expenses to array (explode) and back to string (implode)
$expensesString = implode(",", $expenses);
$expensesArray = explode(",", $expensesString);

//Use string functions: strtoupper, strlen, substr, str_replace
$categoryName = "entertainment";

echo "Uppercase: " . strtoupper($categoryName) . "\n"; 
echo "Length: " . strlen($categoryName) . "\n";  
echo "Substring (first 5 chars): " . substr($categoryName, 0, 5) . "\n";
echo "Replace text: " . str_replace("entertain", "fun", $categoryName) . "\n"; 

//Create a file named expenses.txt and write your expense data into it.
$fileName = 'expenses.txt';
$file = fopen($fileName, 'w');
if ($file) {
    foreach ($expenses as $category => $amount) {
        fwrite($file, "$category: $amount\n");
    }
    fclose($file);
    echo "Expenses written to $fileName\n";
} else {
    echo "Error opening file $fileName\n";
}

//Append a new expense and read the file to show data on page.
$newExpense = "Savings: 1500";
file_put_contents($fileName, $newExpense . PHP_EOL, FILE_APPEND);

if (file_exists($fileName)) {
    $content = file_get_contents($fileName);
    echo $content;
} else {
    echo "Error: File not found.\n";
}



