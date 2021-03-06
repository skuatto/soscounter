<?php

//---------------------------------------------
// ru_RU inflection rules
//---------------------------------------------

return 
[
	// Inflection rules

	'rules' => 
	[
		// Plural noun forms

		'plural' => 
		[

		],

		// Irregular words

		'irregular' => 
		[
			// '1' => '...', '1' => ['0', '2'] or '1' => ['0', '2', '...']

			'минута'  => ['минут', 'минуты', 'минуты'],
			'час'     => ['часов', 'часа', 'часы'],
			'день'    => ['дней', 'дня', 'дни'],
			'неделя'  => ['недель', 'недели', 'недели'],
			'символ'  => ['символов', 'символа', 'символы'],
			'символа' => ['символов', 'символов'], // genitive
		],
	],

	// Pluralization function

	'pluralize' => function($word, $count, $rules)
	{
		if($count !== 1)
		{
			if(isset($rules['irregular'][$word]))
			{
				if(is_array($pluralized = $rules['irregular'][$word]))
				{
					if($count === null || $count === false)
					{
						return isset($pluralized[2]) ? $pluralized[2]  : $word;
					}

					if(!isset($pluralized[0], $pluralized[1]))
					{
						return $word;
					}

					if(is_float($count))
					{
						return $pluralized[0];
					}

					$count = abs($count);

					return $count % 10 == 1 && $count % 100 != 11 ? $word :
						($count % 10 >= 2 && $count % 10 <= 4 && ($count % 100 < 10 || $count % 100 >= 20) ? $pluralized[1] : $pluralized[0]);
				}

				return $pluralized;
			}
			else
			{
				foreach($rules['plural'] as $search => $replace)
				{
					if(preg_match($search, $word))
					{
						$word = preg_replace($search, $replace, $word);

						break;
					}
				}
			}
		}

		return $word;
	},
];

