<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    "accepted"             => ":attribute​ត្រូវបានទទួលយក។",
    "active_url"           => ":attribute​មិនមែនជា​URL​ត្រឹមត្រូវឡើយ។",
    "after"                => ":attribute​ត្រូវតែមានកាលបរិច្ឆេទបន្ទាប់ពី​:date។",
    "alpha"                => ":attribute​អាចមានអក្សរតែប៉ុណ្ណោះ។",
    "alpha_dash"           => ":attribute​អាចមានតែអក្សរ លេខ និងសហសញ្ញា(-]។",
    "alpha_num"            => ":attribute​អាចមានតែអក្សរ និងលេខ។",
    "array"                => ":attribute​ត្រូវតែជា អារេ។",
    "before"               => ":attribute​ត្រូវតែមានកាលបរិច្ឆេទមុន​:date។",
    "between"              => [
        "numeric" => ":attribute​ត្រូវតែមានរវាង​:min និង :max។",
        "file"    => ":attribute​ត្រូវតែមានរវាង​:min និង :max​គីឡូបៃ។",
        "string"  => ":attribute​ត្រូវតែមានរវាង​:min និង :max​តួអក្សរ។",
        "array"   => ":attribute​ត្រូវតែមានធាតុរវាង​:min និង :max។",
    ],
    "confirmed"            => ":attribute​ការបញ្ជាក់មិនផ្គូផ្គង។",
    "date"                 => ":attribute​គឺមិនមែនជាកាលបរិច្ឆេទត្រឹមត្រូវ។",
    "date_format"          => ":attribute​មិនត្រឹមត្រូវនិងទំរង​:format​នេះ។",
    "different"            => ":attribute​និង :other​ត្រូវតែបញ្ជាក់។",
    "digits"               => ":attribute​ត្រូវជាខ្ទុង​:digits។",
    "digits_between"       => ":attribute​ត្រូវចាប់ពីខ្ទុង​:min​ទៅ​:max។",
    "email"                => ":attribute​ទំរង់នេះមិនត្រឹមត្រូវ។",
    "exists"               => "ការជ្រើសរើស​:attribute​ត្រឹមត្រូវ។",
    "image"                => ":attribute​ត្រូវតៃជារូបភាព។",
    "in"                   => "ការជ្រើសរើស​:attribute​មិនត្រឹមត្រូវ។",
    "integer"              => ":attribute​ត្រូវតែជាចំនួនគត់។",
    "ip"                   => ":attribute​ត្រូវតែជា​IP address​ត្រឹមត្រូវ។",
    "max"                  => [
        "numeric" => ":attribute​មិនត្រូវធំជាង​:max​។",
        "file"    => ":attribute​មិនត្រូវធំជាង​:max​គីឡូបៃ។",
        "string"  => ":attribute​មិនត្រូវធំជាង​:max​តួអក្សរ។",
        "array"   => ":attribute​មិនត្រូវច្រើនជាងធាតុនេះ​:max។",
    ],
    "mimes"                => ":attribute​ត្រូវតែជាប្រភេទឯកសារ​type:​:values​នេះ។",
    "min"                  => [
        "numeric" => ":attribute​ត្រូវតែតូចជាង​:min។",
        "file"    => ":attribute​ត្រូវតៃតួចជាង​:min​គីឡូបៃ។",
        "string"  => ":attribute​ត្រូវតែតូចជាង​:min​តួអក្សរ។",
        "array"   => ":attribute​ត្រូវតែតិចជាងធាតុនេះ​:min។",
    ],
    "not_in"               => "ការជ្រើសរើស​:attribute​គឺត្រឹមត្រូវ។",
    "numeric"              => ":attribute​ត្រូវតែជាលេខ។",
    "regex"                => ":attribute​ទំរងមិនត្រឹមត្រូវ។",
    "required"             => ":attribute​នេះគឺទាមទារឲ្យមាន។",
    "required_if"          => ":attribute​នេះគឺទាមទារនៅពេល​:other​គឺ​:value​។",
    "required_with"        => ":attribute​នេះគឺទាមទារនៅពេល​:values​ត្រូវបង្ហាញ។",
    "required_without"     => ":attribute​នេះគឺទាមទារនៅពេល​:values​មិនត្រូវបង្ហាញ។",
    "required_without_all" => ":attribute​នេះគឺត្រូវបានទាមទារពេលគ្មាន​:values​បានបង្ហាញ។",
    "same"                 => ":attribute​និង​:other​ត្រូវតែដូចគ្នា។",
    "size"                 => [
        "numeric" => ":attribute​ត្រូវតែ​:size។",
        "file"    => ":attribute​ត្រូវតែ​:size​គីឡូបៃ។",
        "string"  => ":attribute​ត្រូវតែ​:size​តួអក្សរ។",
        "array"   => ":attribute​ត្រូវតែមានទំហំ​:size។",
    ],
    "unique"               => ":attribute​ត្រូវបានប្រើរួចហើយ។",
    "url"                  => ":attribute​ទំរង់ត្រឹមត្រូវ។",
    'phone'                => 'លេខទូរស័ព្ទមានទំរង់មិនត្រឹមត្រូវ។',
    'already_registered'   => ':attribute​បានចុះឈ្មោះរួចហើយ។',
    /*
         |--------------------------------------------------------------------------
         | Custom Validation Language Lines
         |--------------------------------------------------------------------------
         |
         | Here you may specify custom validation messages for attributes using the
         | convention "attribute.rule" to name the lines. This makes it quick to
         | specify a specific custom language line for a given attribute rule.
         |
         */
    'custom' => [],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => []
];
