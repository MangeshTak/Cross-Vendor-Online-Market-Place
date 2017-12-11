<?php
/**
 * Created by PhpStorm.
 * User: huyvo
 * Date: 12/3/17
 * Time: 9:57 PM
 */

// Huy Products Here
$huy_items_id = array(
    11 => "Art",
    12 => "Cooking",
    13 => "Computer Science",
    14 =>  "Engineering",
    15 => "English" ,
    16 => "Foreign Language",
    17 => "Mathematics",
    18 => "Music",
    19 => "Science",
    110 => "Sports"
);
// Mangesh Products Here
$mangesh_items_id = array(
    51 => "Complex",

    52 => "Omega",
    53 => "Lakeview",

    54 =>
        "Sea",

    55 =>
        "Panoroma",

    56 =>
        "Fountain",

    57 =>
        "Villa",

    58 =>
        "Palace",

    59 =>
        "King",

    510 =>
        "Queen",
);
// Xuan Products Here
$xuan_items_id = array(
    41 =>
        "BBQ",

    42 =>
        "Beef",

    43 =>
        "Curry",

    44 =>
        "Hotpot",

    45 =>
        "Huangmenji",

    46 =>
        "Lobster",

    47 =>
        "Noodles",

    48 =>
        "Porridge",

    49 =>
        "Sprrowfish",

    410 =>
        "Sushi"
);
// Andrew Products Here
$andrew_items_id = array(
    21 =>
        "Amethyst",

    22 =>
        "Diamond",

    23 =>
        "Goldstone",

    24 =>
        "Perl",

    25 =>
        "Platinum",

    26 =>
        "Ruby",

    27 =>
        "Saphir",

    28 =>
        "Tanzanite",

    29 =>
        "Ungthu",

    210 =>
        "Topaz"
);
// Kevin Products Here
$kevin_items_id = array(

    31 =>
        "Bath",

    32 =>
        "Bed",

    33 =>
        "Carpet",

    34 =>
        "Cushion",

    35 =>
        "Flooring",

    36 =>
        "Lighting",

    37 =>
        "Propert Evaluation",

    38 =>
        "Tables",

    39 =>
        "Wallpaper",

    310 =>
        "Windows"
);

function getProductNameFromId($id){
    if(is_numeric($id)){
        settype($id, "string");


        $company_id = (integer) $id[0];

        $product_id = (integer) $id;

        switch ($company_id){
            case 1:
                global $huy_items_id;
                return $huy_items_id[$product_id];
                break;
            case 2:
                global $andrew_items_id;
                return $andrew_items_id[$product_id];
                break;
            case 4:
                global $xuan_items_id;
                return $xuan_items_id[$product_id];
                break;
            case 3:
                global $kevin_items_id;
                return $kevin_items_id[$product_id];
                break;
            default:
                global $mangesh_items_id;
                return $mangesh_items_id[$product_id];
                break;
        }

    }

    return "Cannot get product name";


}