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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'name' => [
          'required' => 'حقل الاسم مطلوب',
          'max' => 'يجب ألا يزيد الاسم عن :max حرف',
          'min' => 'يجب ألا يقل الاسم عن :min حرف',
          'regex' => 'الاسم غير صالح',
          'unique' => 'تم أخذ الاسم بالفعل'
        ],
        'care_number' => [
          'required' => 'حقل رقم الرعاية مطلوب',
          'unique' => 'تم أخذ رقم الرعاية بالفعل',
          'integer' => 'يجب أن يكون رقم الرعاية عددًا صحيحًا',
          'regex' => 'رقم رعاية غير صالح',
          'min' => 'يجب ألا يقل رقم الرعاية عن :min أرقام',
        ],
        'host_name' => [
          'required' => 'حقل اسم العائل مطلوب',
          'regex' => 'اسم العائل غير صالح',
          'min' => 'يجب ألا يقل اسم العائل عن :min  حرف',
          'max' => 'يجب ألا يزيد اسم العائل عن :max حرف'
        ],
        'father_national_id' => [
          'min' => 'يجب ألا يقل الرقم القومي للأب عن :min رقم',
          'max' => 'يجب ألا يزيد الرقم القومي للأب عن :max رقم',
          'unique' => 'تم أخذ الرقم القومي ',
        ],
        'phone' => [
          'required' => 'حقل رقم التليفون مطلوب',
          'size' => 'يجب أن يتكون الهاتف من 11 رقم',
          'unique' => 'تم أخذ رقم التليفون بالفعل ',
          'regex' => 'رقم تليفون غير صالح',
        ],
        'birth_date' => [
          'before' => 'يجب أن يكون تاريخ الميلاد قبل :date',
          'required' => 'حقل تاريخ الميلاد مطلوب',
        ],
        'exchange_date' => [
          'after' => 'يجب أن يكون تاريخ الصرف بعد :date',
          // 'required' => 'حقل تاريخ الميلاد مطلوب',
        ],
        'marriage_date' => [
          'after' => 'يجب أن يكون تاريخ الزواج بعد :date',
          'required' => 'حقل تاريخ الزواج مطلوب',
        ],
        'national_id' => [
          'required' => 'حقل الرقم القومي مطلوب',
          'size' => 'يجب أن يكون الرقم القومي :size رقم',
          'integer' => 'يجب أن يكون الرقم القومي عددًا صحيحًا',
          'unique' => 'تم أخذ الرقم القومي بالفعل',
          'different' => 'يجب أن يكون :attribute  مختلف عن :other'
        ],
        'academic_year' => [
          'required' => 'حقل السنة الدراسية مطلوب',
          'max' => 'يجب ألا تزيد السنة الدراسية عن :max حرف',
          'integer' => 'يجب أن يكون الرقم القومي عددًا صحيحًا',
        ],
        'social_status' => [
          'required' => 'حقل الحالة الاجتماعية مطلوب',
        ],
        'type' => [
          'required' => 'حقل النوع مطلوب',
          'max' => 'يجب ألا يزيد النوع عن :max حرف',
          'min' => 'يجب ألا يقل النوع عن :min أحرف',
          'regex' => 'النوع غير صالح'
        ],
        'orphan_sponser_id' => [
          'required' => 'حقل كافل اليتيم مطلوب',
        ],
        'unit' => [
          'required' => 'حقل الوحدة مطلوب',
        ],
        'distribution_type' => [
          'required' => 'حقل نوع التوزيع مطلوب',
        ],
        'category_id' => [
          'required' => 'حقل الفئة مطلوب',
        ],
        'barcode' => [
          'required' => 'حقل الباركود مطلوب',
        ],
        'address' => [
          'required' => 'حقل العنوان مطلوب',
          'max' => 'يجب ألا يزيد العنوان عن :max حرف',
          'min' => 'يجب ألا يقل العنوان عن :min حرف'
        ],
        'code' => [
          'required' => 'حقل الكود مطلوب',
          'regex' => 'كود غير صالح',
          'max' => 'يجب ألا يزيد الكود عن :max رقم',
          'unique' => 'تم أخذ الكود بالفعل'
        ],
        'quantity' => [
          'required' => 'حقل الكمية مطلوب',
          'min' => 'يجب ألا تقل الكمية عن :min أرقام',
          'max' => 'يجب ألا تزيد الكمية عن :max أرقام',
          'gte' => 'يجب أن تكون الكمية أكبر من أو تساوي 1',
          'regex' => 'كمية غير صالحة'
        ],
        'details' => [
          'min' => 'يجب ألا تقل التفاصيل عن :min حرف',
          'max' => 'يجب ألا تزيد التفاصيل عن :max حرف',
          'regex' => 'التفاصيل غير صالحة'
        ],
        'month' => [
          'required' => 'حقل الشهر مطلوب',
          'unique' => 'تم أخذ الشهر بالفعل',
        ],
        'addetion' => [
          'required' => 'حقل الاضافة مطلوب',
          'max' => 'يجب ألا تزيد الاضافة عن :max أرقام',
          'regex' => 'مبلغ الاضافة غير صالح',
        ],
        'guarantee' => [
          'required' => 'حقل الكفالة مطلوب',
          'max' => 'يجب ألا تزيد الكفالة عن :max أرقام',
          'regex' => 'مبلغ الكفالة غير صالح',
        ],
        'mosque_id' => [
          'required' => 'حقل المسجد مطلوب',
        ],
        'price' => [
          'required' => 'حقل المبلغ مطلوب',
          'regex' => 'مبلغ غير صالح',
          'max' => 'يجب ألا يزيد المبلغ عن :max أرقام'
        ],
        'amount' => [
          'required' => 'حقل المبلغ مطلوب',
          'regex' => 'مبلغ غير صالح',
          'max' => 'يجب ألا يزيد المبلغ عن :max أرقام'
        ],
        'job' => [
          'required' => 'حقل اسم الوظيفة مطلوب',
          'max' => 'يجب ألا تزيد الوظيفة عن :max حرف',
          'regex' => 'اسم وظيفة غير صالح',
          'min' => 'يجب ألا تقل الوظيفة عن :min حرف'
        ],
        'salary' => [
          'max' => 'يجب ألا يزيد الراتب عن :max أرقام',
          'regex' => 'يجب ان يتكون الراتب من أرقام فقط'
        ],
        'serial_number' => [
          'required' => 'حقل رقم المسلسل مطلوب',
          'max' => 'يجب ألا يزيد رقم المسلسل عن :max رقم',
          'regex' => 'يجب ان يتكون رقم المسلسل من أرقام فقط',
          'unique' => 'تم أخذ رقم المسلسل بالفعل'
        ],
        'prescription_number' => [
          'required' => 'حقل رقم الروشتة مطلوب',
          'max' => 'يجب ألا يزيد رقم الروشتة عن :max رقم',
          'regex' => 'يجب ان يتكون رقم الروشتة من أرقام فقط',
          'unique' => 'تم أخذ رقم الروشتة بالفعل'
        ],
        'teller_name' => [
          'max' => 'يجب ألا يزيد اسم الصارف عن :max حرف',
          'min' => 'يجب ألا يقل اسم الصارف عن :min حرف',
          'regex' => 'اسم الصارف غير صالح',
          'required' => 'حقل اسم الصارف مطلوب',
        ],
        'student_id' => [
          'required' => 'حقل اسم الطالب مطلوب',
        ],
        'amount' => [
          'required' => 'حقل المبلغ مطلوب',
          'max' => 'يجب ألا يزيد المبلغ عن :max  أرقام',
          'regex' => 'مبلغ غير صالح',
        ],
        'reason' => [
          'required' => 'حقل السبب مطلوب',
          'max' => 'يجب ألا يزيد السبب عن :max  حرف',
        ],
        'father_name' => [
          'required' => 'حقل اسم الاب مطلوب',
          'max' => 'يجب ألا يزيد اسم الاب عن :max حرف',
          'min' => 'يجب ألا يقل اسم الاب عن :min حرف',
          'regex' => 'اسم الاب غير صالح'
        ],
        'mother_name' => [
          'required' => 'حقل اسم الام مطلوب',
          'max' => 'يجب ألا يزيد اسم الام عن :max حرف',
          'min' => 'يجب ألا يقل اسم الام عن :min حرف',
          'regex' => 'اسم الام غير صالح'
        ],
        'band' => [
          'max' => 'يجب ألا تزيد الفرقة عن :max حرف',
          'min' => 'يجب ألا تقل الفرقة عن :min حرف',
          'regex' => 'اسم الفرقة غير صالح'
        ],
        'school' => [
          'max' => 'يجب ألا تزيد المدرسة عن :max حرف',
          'min' => 'يجب ألا تقل المدرسة عن :min حرف',
          'regex' => 'اسم المدرسة غير صالح'
        ],
        'father_national_id' => [
          'size' => 'يجب أن يكون الرقم القومي للاب :size رقم',
          'unique' => 'تم أخذ الرقم القومي بالفعل',
          'different' => 'يجب أن يكون :attribute  مختلف عن :other'
        ],
        'mother_national_id' => [
          'size' => 'يجب أن يكون الرقم القومي للام :size رقم',
          'unique' => 'تم أخذ الرقم القومي بالفعل',
          'different' => 'يجب أن يكون :attribute  مختلف عن :other'
        ],
        'host_national_id' => [
          'size' => 'يجب أن يكون الرقم القومي للعائل :size رقم',
          'unique' => 'تم أخذ الرقم القومي بالفعل',
        ],
        'host_relationship' => [
          'min' => 'يجب ألا تقل صلة القرابة عن :min حرف',
          'max' => 'يجب ألا تزيد صلة القرابة عن :max حرف',
          'regex' => 'صلة القرابة غير صالحة',
        ],
        'host_image' => [
          'image' => 'يجب أن تكون صورة العائل صورة',
          'mimes' => 'يجب أن تكون الصورة من نوع ملف jpg,png,jpeg,svg,gif',
          'regex' => 'صلة القرابة غير صالحة',
        ],
        'mosque' => [
          'min' => 'يجب ألا يقل اسم المسجد عن :min حرف',
          'max' => 'يجب ألا يزيد اسم المسجد عن :max حرف',
          'regex' => 'اسم المسجد غير صالح',
        ],
        'rewards' => [
          'gte' => 'يجب ان تكون المكافات اكبر من او يساوي 0',
          'max' => 'يجب ألا تزيد المكافات عن :max حرف',
          'regex' => 'يجب أن تكون المكافات ارقام فقط',
        ],
        'expenses' => [
          'required' => 'حقل المصروفات مطلوب',
          'max' => 'يجب ألا تزيد المصروفات عن :max أرقام',
          'regex' => 'يجب أن تكون المصروفات ارقام فقط',
        ],
        'salaries' => [
          'required' => 'حقل المرتبات مطلوب',
          'max' => 'يجب ألا تزيد المرتبات عن :max أرقام',
          'regex' => 'يجب أن تكون المرتبات ارقام فقط',
        ],
        'accounts' => [
          'required' => 'حقل الكشوفات مطلوب',
          'max' => 'يجب ألا تزيد الكشوفات عن :max أرقام',
          'regex' => 'يجب أن تكون الكشوفات ارقام فقط',
        ],
        'donations' => [
          'required' => 'حقل التبرعات مطلوب',
          'max' => 'يجب ألا تزيد التبرعات عن :max أرقام',
          'regex' => 'يجب أن تكون التبرعات ارقام فقط',
        ],
        'time' => [
          'required' => 'حقل الوقت مطلوب',
          'unique' => 'لقد تم بالفعل أخذ الوقت',
        ],
        'days' => [
          'required' => 'حقل اﻷيام مطلوب',
        ],
        'tools' => [
          'required' => 'حقل المستلزمات مطلوب',
          'min' => 'يجب ألا تقل المستلزمات عن :min حرف',
          'max' => 'يجب ألا تزيد المستلزمات عن :max حرف',
          'regex' => 'المستلزمات غير صالحة',
        ],
        'doctors_salary' => [
          'required' => 'حقل رواتب اﻷطباء مطلوب',
          'max' => 'يجب ألا تزيد رواتب اﻷطباء عن :max أرقام',
          'regex' => 'يجب أن تكون رواتب اﻷطباء أرقام فقط',
        ],
        'specialization' => [
          'required' => 'حقل التخصص مطلوب',
          'max' => 'يجب ألا يزيد التخصص عن :max حرف',
          'regex' => 'التخصص غير صالح',
          'min' => 'يجب ألا يقل التخصص عن :min حرف',
        ],
        'place' => [
          'required' => 'حقل المكان مطلوب',
          'max' => 'يجب ألا يزيد المكان عن :max حرف',
          'regex' => 'المكان غير صالح',
          'min' => 'يجب ألا يقل المكان عن :min حرف',
        ],
        'person' => [
          'required' => 'حقل الشخص مطلوب',
          'max' => 'يجب ألا يزيد الشخص عن :max حرف',
          'regex' => 'الشخص غير صالح',
          'min' => 'يجب ألا يقل الشخص عن :min حرف',
        ],
        'entry_date' => [
          'required' => 'حقل تاريخ الدخول مطلوب',
        ],
        'exit_date' => [
          'required' => 'حقل تاريخ الخروج مطلوب',
          'after' => 'يجب أن يكون تاريخ الخروج تاريخًا بعد :date'
        ],
        'date' => [
          'after' => 'يجب أن يكون التاريخ بعد :date'
        ],
        'patient_name' => [
          'required' => 'حقل اسم المريض مطلوب',
          'max' => 'يجب ألا يزيد اسم المريض عن :max حرف',
          'regex' => 'اسم المريض غير صالح',
          'min' => 'يجب ألا يقل اسم المريض عن :min حرف',
        ],
        'doctor_name' => [
          'required' => 'حقل اسم الطبيب مطلوب',
          'max' => 'يجب ألا يزيد اسم الطبيب عن :max حرف',
          'regex' => 'اسم الطبيب غير صالح',
          'min' => 'يجب ألا يقل اسم الطبيب عن :min حرف',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
      'national_id' => 'الرقم القومي',
      'father_national_id' => 'الرقم القومي للأب',
      'mother_national_id' => 'الرقم القومي للأم',
    ],

];
