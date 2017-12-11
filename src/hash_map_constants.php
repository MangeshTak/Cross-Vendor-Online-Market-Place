<?php
include 'models/Item.php';

function getHuyItemName($index){
    global $huy_items;
    return $huy_items[$index]->getTitle();
}

function getKevinItemName($index){
    global $kevin_items;
    return $kevin_items[$index]->getTitle();
}

// Huy Products Here
$huy_items = array(
    1 => new Item(
        11,
        "Art",
        file_get_contents("../public/company_product_description/company_1/art.txt"),
        "../company_imgs/company_1/art.jpg",
        "$21 per hour"),

    2 => new Item(
        12,
        "Cooking",
        file_get_contents("../public/company_product_description/company_1/cooking.txt"),
        "../company_imgs/company_1/cooking.jpg",
        "$21 per hour"),
    3 => new Item(
        13,
        "Computer Science",
        file_get_contents("../public/company_product_description/company_1/cs.txt"),
        "../company_imgs/company_1/cs.jpg",
        "$21 per hour"),
    4 => new Item(
        14,
        "Engineering",
        file_get_contents("../public/company_product_description/company_1/engineering.txt"),
        "../company_imgs/company_1/engineering.jpg",
        "$21 per hour"),
    5 => new Item(
        15,
        "English",
        file_get_contents("../public/company_product_description/company_1/english.txt"),
        "../company_imgs/company_1/english.jpeg",
        "$21 per hour"),
    6 => new Item(
        16,
        "Foreign Language",
        file_get_contents("../public/company_product_description/company_1/fl.txt"),
        "../company_imgs/company_1/fl.jpeg",
        "$21 per hour"),
    7 => new Item(
        17,
        "Mathematics",
        file_get_contents("../public/company_product_description/company_1/math.txt"),
        "../company_imgs/company_1/math.jpeg",
        "$21 per hour"),
    8 => new Item(
        18,
        "Music",
        file_get_contents( "../public/company_product_description/company_1/music.txt"),
        "../company_imgs/company_1/music.jpeg",
        "$21 per hour"),
    9 => new Item(
        19,
        "Science",
        file_get_contents("../public/company_product_description/company_1/science.txt"),
        "../company_imgs/company_1/science.jpg",
        "$21 per hour"),
    10 => new Item(
        110,
        "Sports",
        file_get_contents("../public/company_product_description/company_1/sports.txt"),
        "../company_imgs/company_1/sports.jpg",
        "$21 per hour")
);

// Mangesh Products Here
$mangesh_items = array(
    1 => new Item(
        51,
        "Complex",
        file_get_contents("../public/company_product_description/company_5/complex.txt"),
        "../company_imgs/company_5/complex.jpg",
        "$63300 each flat"),

    2 => new Item(
        52,
        "Omega",
        file_get_contents("../public/company_product_description/company_5/omega.txt"),
        "../company_imgs/company_5/omega.jpg",
        "$42300 each flat"),

    3 => new Item(
        53,
        "Lakeview",
        file_get_contents("../public/company_product_description/company_5/lakeview.txt"),
        "../company_imgs/company_5/lakeview.jpg",
        "$12500 each flat"),

    4 => new Item(
        54,
        "Sea",
        file_get_contents("../public/company_product_description/company_5/sea.txt"),
        "../company_imgs/company_5/sea.jpg",
        "$35000 each flat"),

    5 => new Item(
        55,
        "Panoroma",
        file_get_contents("../public/company_product_description/company_5/panoroma.txt"),
        "../company_imgs/company_5/panoroma.jpg",
        "$65000 each flat"),

    6 => new Item(
        56,
        "Fountain",
        file_get_contents("../public/company_product_description/company_5/fountain.txt"),
        "../company_imgs/company_5/fountain.jpg",
        "$45000 each flat"),

    7 => new Item(
        57,
        "Villa",
        file_get_contents("../public/company_product_description/company_5/villa.txt"),
        "../company_imgs/company_5/villa.jpg",
        "$5000 each flat"),

    8 => new Item(
        58,
        "Palace",
        file_get_contents("../public/company_product_description/company_5/palace.txt"),
        "../company_imgs/company_5/palace.jpg",
        "$35000 each flat"),

    9 => new Item(
        59,
        "King",
        file_get_contents("../public/company_product_description/company_5/king.txt"),
        "../company_imgs/company_5/king.jpg",
        "$28000 each flat"),

    10 => new Item(
        510,
        "Queen",
        file_get_contents("../public/company_product_description/company_5/queen.txt"),
        "../company_imgs/company_5/queen.jpg",
        "$15000 each flat"),
);
// Xuan Products Here
$xuan_items = array(
    1 => new Item(
        41,
        "BBQ",
        file_get_contents("../public/company_product_description/company_4/BBQ.txt"),
        "../company_imgs/company_4/BBQ.jpg",
        "$35"),

    2 => new Item(
        42,
        "Beef",
        file_get_contents("../public/company_product_description/company_4/beef.txt"),
        "../company_imgs/company_4/beef.jpg",
        "$42"),

    3 => new Item(
        43,
        "Curry",
        file_get_contents("../public/company_product_description/company_4/curry.txt"),
        "../company_imgs/company_4/curry.jpg",
        "$12"),

    4 => new Item(
        44,
        "Hotpot",
        file_get_contents("../public/company_product_description/company_4/hotpot.txt"),
        "../company_imgs/company_4/hotpot.jpg",
        "$35"),

    5 => new Item(
        45,
        "Huangmenji",
        file_get_contents("../public/company_product_description/company_4/huangmenji.txt"),
        "../company_imgs/company_4/huangmenji.jpg",
        "$65"),

    6 => new Item(
        46,
        "Lobster",
        file_get_contents("../public/company_product_description/company_4/lobster.txt"),
        "../company_imgs/company_4/lobster.jpg",
        "$45"),

    7 => new Item(
        47,
        "Noodles",
        file_get_contents("../public/company_product_description/company_4/noodles.txt"),
        "../company_imgs/company_4/noodles.jpg",
        "$50"),

    8 => new Item(
        48,
        "Porridge",
        file_get_contents("../public/company_product_description/company_4/porridge.txt"),
        "../company_imgs/company_4/porridge.jpg",
        "$35"),

    9 => new Item(
        49,
        "Sprrowfish",
        file_get_contents("../public/company_product_description/company_4/sprrowfish.txt"),
        "../company_imgs/company_4/sprrowfish.jpg",
        "$28"),

    10 => new Item(
        410,
        "Sushi",
        file_get_contents("../public/company_product_description/company_4/sushi.txt"),
        "../company_imgs/company_4/sushi.jpg",
        "$15"),
);
// Andrew Products Here
$andrew_items = array(
    1 => new Item(
        21,
        "Amethyst",
        file_get_contents("../public/company_product_description/company_2/amethyst.txt"),
        "../company_imgs/company_2/amethyst.jpg",
        "$10000"),

    2 => new Item(
        22,
        "Diamond",
        file_get_contents("../public/company_product_description/company_2/diamond.txt"),
        "../company_imgs/company_2/diamond.jpg",
        "$4200"),

    3 => new Item(
        23,
        "Goldstone",
        file_get_contents("../public/company_product_description/company_2/goldstone.txt"),
        "../company_imgs/company_2/goldstone.jpg",
        "$12562"),

    4 => new Item(
        24,
        "Perl",
        file_get_contents("../public/company_product_description/company_2/perl.txt"),
        "../company_imgs/company_2/perl.jpg",
        "$3596"),

    5 => new Item(
        25,
        "Platinum",
        file_get_contents("../public/company_product_description/company_2/platinum.txt"),
        "../company_imgs/company_2/Platinum.png",
        "$65556"),

    6 => new Item(
        26,
        "Ruby",
        file_get_contents("../public/company_product_description/company_2/ruby.txt"),
        "../company_imgs/company_2/ruby.jpg",
        "$4596"),

    7 => new Item(
        27,
        "Saphir",
        file_get_contents("../public/company_product_description/company_2/saphir.txt"),
        "../company_imgs/company_2/saphir.jpg",
        "$5085"),

    8 => new Item(
        28,
        "Tanzanite",
        file_get_contents("../public/company_product_description/company_2/tanzanite.txt"),
        "../company_imgs/company_2/tanzanite.jpg",
        "$3555"),

    9 => new Item(
        29,
        "Ungthu",
        file_get_contents("../public/company_product_description/company_2/ungthu.txt"),
        "../company_imgs/company_2/ungthu.jpg",
        "$2866"),

    10 => new Item(
        210,
        "Topaz",
        file_get_contents("../public/company_product_description/company_2/topaz.txt"),
        "../company_imgs/company_2/topaz.jpg",
        "$1509"),
);
// Kevin Products Here
$kevin_items = array(

    1 => new Item(
        31,
        "Bath",
        file_get_contents("../public/company_product_description/company_3/bath.txt"),
        "../company_imgs/company_3/bath.jpg",
        "$1000"),

    2 => new Item(
        32,
        "Bed",
        file_get_contents("../public/company_product_description/company_3/bed.txt"),
        "../company_imgs/company_3/bed.png",
        "$500"),

    3 => new Item(
        33,
        "Carpet",
        file_get_contents("../public/company_product_description/company_3/carpet.txt"),
        "../company_imgs/company_3/carpet.jpg",
        "$250"),

    4 => new Item(
        34,
        "Cushion",
        file_get_contents("../public/company_product_description/company_3/cushion.txt"),
        "../company_imgs/company_3/cushion.jpg",
        "$10"),

    5 => new Item(
        35,
        "Flooring",
        file_get_contents("../public/company_product_description/company_3/flooring.txt"),
        "../company_imgs/company_3/flooring.jpg",
        "$1250"),

    6 => new Item(
        36,
        "Lighting",
        file_get_contents("../public/company_product_description/company_3/lighting.txt"),
        "../company_imgs/company_3/lighting.jpg",
        "$100"),

    7 => new Item(
        37,
        "Propert Evaluation",
        file_get_contents("../public/company_product_description/company_3/property_eval.txt"),
        "../company_imgs/company_3/property_eval.jpg",
        "$360"),

    8 => new Item(
        38,
        "Tables",
        file_get_contents("../public/company_product_description/company_3/tables.txt"),
        "../company_imgs/company_3/tables.jpg",
        "$300"),

    9 => new Item(
        39,
        "Wallpaper",
        file_get_contents("../public/company_product_description/company_3/wallpaper.txt"),
        "../company_imgs/company_3/wallpaper.jpg",
        "$600"),

    10 => new Item(
        310,
        "Windows",
        file_get_contents("../public/company_product_description/company_3/windows.txt"),
        "../company_imgs/company_3/windows.jpg",
        "$1700"),
);



?>