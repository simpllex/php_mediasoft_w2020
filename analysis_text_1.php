<?php
        //Enter your code here, enjoy!
$silentdon  = "Глава 1 В предпоследнюю турецкую компанию в Татарский хутор вернулся казак Мелехов Прокофий с женой-турчанкой, которая родила мальчика Пантелея. От них и пошел род Мелеховых, прозванных «турками». Когда Пантелей Мелехов вырос, то женился на дочери соседа, казачке Василисе. У Пантелея и Василисы было два сына – Петро и Григорий и дочь Дуняшка. Глава 2 После рыбалки, на обратной дороге Пантелей заговорил с сыном Григорием об Аксинье Астаховой, жене их соседа Степана Астахова. В хуторе ходили слухи, что Григорий ухаживает за женщиной. Отец пригрозил сыну, чтобы тот «с нонешнего дня прикрыл все игрища». Григорий с приятелем Митькой Коршуновым идет к купцу Мохову продать пойманного сазана. У купца Митька знакомится с дочерью Мохова – Елизаветой. Главы 3-4 Несмотря на слова отца, Григорий продолжает ухаживать за Аксиньей. Степан и Петр уехали в майские казачьи лагеря, на регулярные сборы, для тех, кто находился на льготном резерве. Главы 5-6 Петр и Степан едут к месту лагерного сбора – хутору Сетракова с другими хуторянами. По дороге мужчины остановились заночевать у кургана. У костра казак Христоня рассказывал историю о том, как с отцом как-то раскопали курган в поисках клада. Глава 7 Аксинью выдали за Степана в 17 лет. За год до свадьбы девушку изнасиловал отец. Узнав о случившемся, братья и мать Аксиньи избили отца Аксиньи до смерти. После свадьбы со Степаном все хозяйство Астаховых легло на плечи невестки. Степан не мог простить «обиды» (девушка не уберегла чести до замужества) и жестоко избивал жену, ходил к другим женщинам. Через полтора года, умерла свекровь, а после, не дожив до года, умер и первенец Аксиньи. Вскоре с Аксиньей начал заигрывать Григорий и «с ужасом увидела она, что ее тянет к черному ласковому парню» Женщину «пугало это новое, заполнявшее всю ее чувство». Глава 8 Сотник Листницкий хвастался своей лошадью, и они с Митькой поспорили, кто кого обгонит. При всех Митька обогнал Листницкого. Главы 9-10 Мелеховы с Аксиньей выехали на луговой покос. Вечером, когда все отдыхали, Астахова сама подошла к Григорию, и они пробыли всю ночь вместе. Вскоре о случившемся узнал весь хутор. Пантелей Прокофьич лично пошел к Аксинье и запретил ей появляться у них в доме, на что Аксинья сказала, что ей все равно: «Гришка мой! Мой! Мой! Владаю им и буду владать!..». Разозлившись, Пантелей пошел домой и, избив сына, сказал, что завтра же его женит.";

$silentdon = mb_strtolower($silentdon);
//заменить знаки препинания на пустые строки
$silentdon = str_replace([',', '.', ';', '!', '?', ' - '], '', $silentdon);
$pieces = explode(" ", $silentdon);
$array = [];

foreach ($pieces as $key)
if (array_key_exists ($key, $array)){
    $array[$key]++;
} else {
    $array[$key] = 1;
}

print_r($array);

