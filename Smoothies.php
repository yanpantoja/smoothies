<?php


class Test
{

    public function ingredientsTest(string $ingredients)
    {

        $smooths = array(
            "Classic" => ["strawberry", "banana", "pineapple", "mango", "peach", "honey", "ice", "yogurt"],
            "Forest Berry" => ["strawberry", "raspberry", "blueberry", "honey", "ice", "yogurt"],
            "Freezie" => ["blackberry", "blueberry", "black currant", "grape juice", "frozen yogurt"],
            "Greenie" => ["green apple", "kiwi", "lime", "avocado", "spinach", "ice", "apple juice"],
            "Vegan Delite" => ["strawberry", "passion fruit", "pineapple", "mango", "peach", "ice", "soy milk"],
            "Just Desserts" => ["banana", "ice cream", "chocolate", "peanut", "cherry"]
        );

        $ingredientsArray = explode(",", $ingredients);

        if(sizeof($ingredientsArray) == 1) {
            return $smooths[$ingredientsArray[0]];
        }

        $smooth = $smooths[$ingredientsArray[0]];

        for($i = 1; $i < sizeof($ingredientsArray); $i++) {

            if($ingredientsArray[$i][0] == "+") {
                array_push($smooth,
                    substr($ingredientsArray[$i], 1));
            }

            if($ingredientsArray[$i][0] == "-") {

                $index = array_search(
                    substr($ingredientsArray[$i], 1),
                    $smooth
                );

                unset($smooth[$index]);
            }
        }

        return $smooth;


    }


}

$test = new Test();
print_r($test->ingredientsTest('Classic,+chocolate,-yogurt'));
print_r($test->ingredientsTest(
    'Just Desserts,-banana,-cherry,-chocolate,-ice cream,-peanut'
));
print_r($test->ingredientsTest('Classic'));
