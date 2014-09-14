<?php

// if user's guess is less than the number, it outputs "HIGHER"
// if user's guess is more than the number, it outputs "LOWER"
// if a user guesses the number, the game should declare "GOOD GUESS!"

if ($argc == 3)
{
    $num1 = $argv[1];
    $num2 = $argv[2];
    
    if ($num1 > $num2)
    {
        $min = $num2;
        $max = $num1;
    }
    else
    {
        $min = $num1;
        $max = $num2;
    }

    $random_number = mt_rand($min,$max);
    $num_of_guess = 0;
    
    do
    {
        fwrite(STDOUT, "\nWhat is your guess? ");
        $guess = trim(fgets(STDIN));    
        $num_of_guess++;

        if(is_numeric($guess))
        {
            if ($guess > $max || $guess < $min) 
            {
                echo "You didnt guess between $min and $max.";
            }
            elseif ($guess > $random_number) 
            {
                echo "\nLower\n";
            }
            elseif ($guess < $random_number) 
            {
                echo "\nHigher\n";
            }
            else
            {
                echo "\nYay, it only took you $num_of_guess times to guess correctly! :)\n";    
            }
        }

        else
        {
            echo "\nError! Please only numbers.\n";
        }

    } while ($guess != $random_number);
}
else
{
    echo "\nYou put in too many paramaters\n";
}
