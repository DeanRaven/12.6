<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getPartsFromFullname($fullName){
    $exploted = explode(" ",$fullName);
    $seporated = [
        'surname' => $exploted[0],
        'name' => $exploted[1],
        'patronomyc' => $exploted[2],
    ];
    return $seporated;
};
    print_r(getPartsFromFullname("Иванов Иван Иванович"));

function getFullnameFromParts($surname, $name, $patronomyc){
    $fullName = [$surname, $name, $patronomyc];
    return implode(' ', $fullName);
};
    echo "<br>";
    print_r(getFullnameFromParts("Иванов", "Иван", "Иванович") . "<br>");

function getShortName($fullName){
    $short = explode(' ', $fullName);
    echo $short[0] . ' ' . substr($short[1],0,2) . '.' ;
};
    print_r(getShortName("Иванов Иван Иванович"));   

function getGenderFromName($fullName){
    $seporated = getPartsFromFullname($fullName);
    $gender = 0;
    
	$genderName = mb_substr(($seporated["name"]), -1);
    if ($genderName == "a"){
        $gender = -1;
    } else if ($genderName == "й" || $genderName == "н"){
        $gender = 1;
    } else {
        $gender = 0;
    }

    if (mb_substr(($seporated["surname"]),-1, 1) == "ва"){
        $gender = -1;
    } else if (mb_substr($seporated["surname"],-1, 1) == "в"){
        $gender = 1;
    } else {
        $gender = 0;
    }

    if (mb_substr(($seporated["patronomyc"]),-3, 3) == "вна"){
        $gender = -1;
    } else if (mb_substr($seporated["patronomyc"], -2, 2) == "ич"){
        $gender = 1;
    } else {
        $gender = 0;
    }

    if (($gender <=> 0) === 1){
        return "Male";
    } else if (($gender <=> 0) === -1){
        return "Female";
    } else {
        return "Undefined";
    }
};
    echo "<br>";
    print_r(getGenderFromName("Иванов Иван Иванович") . "<br>");
?>