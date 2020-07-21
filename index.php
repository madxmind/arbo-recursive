<?php

$data = [
    'root' => [
        'name' => 'Racine',
        'childs' => [
            'canin' => [
                'name' => 'Canins',
                'childs' => [
                    'chien' => 'Chiens',
                    'loup' => 'Loups',
                ],
            ],
            'felin' => [
                'name' => 'Félins',
                'childs' => [
                    'grand_felin' => [
                        'name' => 'Grans Félins',
                        'childs' => [
                            'lion' => 'Lions',
                            'panthere' => 'Panthères',
                            'tigre' => 'Tigres',
                        ]
                    ],
                    // 'petit_felin' => 'Petits Félins',
                    'mini_felin' => [
                        'name' => 'Minis Félins',
                        'childs' => []
                    ],
                ]
            ],
            'poisson' => [
                'name' => 'Poissons',
                'childs' => [
                    'requin' => 'Requins',
                    'saumon' => 'Saumons',
                ]
            ]
        ]
    ]
];

function hasSubCategory($array)
{
    return (is_array($array[array_key_first($array)]));
}

function showMenu($array, bool $start = true, int $level = 0): string
{
    $html = '';
    if ($start) $html .= (hasSubCategory($array)) ? '<ul class="sub_category">' : '<ul>';

    foreach ($array as $k => $v) {
        if (is_array($v)) {
            $html .= '<li class="container_category level_' . $level . '"><span class="category">' . $v['name'] . '</span>';

            if (!empty($v['childs'])) {
                $html .= (hasSubCategory($v['childs'])) ? '<ul class="sub_category">' : '<ul>';
                $html .= showMenu($v['childs'], false, ($level + 1));
                $html .= '</ul>';
            }

            $html .= '</li>';
        } else {
            $html .= '<li class="item">' . $v . '</li>';
        }
    }

    if ($start) $html .= '</ul>';

    return $html;
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>

    <link rel="stylesheet" type="text/css" href="app.css?v=1" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>

<body>

    <div class="arbo">
        <?php echo showMenu($data); ?>
    </div>

    <script src="app.js"></script>

</body>

</html>