<?php

return [
    'main' => 'Главная',
    'edited_user_id' => 'Last action',
	'select'=>'Выбрать из списка',
	'disabled'=>'Значение не выбрано',
    'created_at' => 'Generated',
    'updated_at' => 'Changed',
    'lib_continent' => [
        'name' => 'Наименование'
    ],
    'lib_country' => [
        'name' => 'Наименование',
		'code' => 'Код страны',
        'continent_id' => 'Континент'
    ],
    'lib_city' => [
        'name' => 'Наименование',
        'country_id' => 'Страна'
    ],
    'lib_univer_cat' => [
        'name' => 'Наименование'
    ],
    'lib_degree' => [
        'name' => 'Наименование'
    ],
    'lib_lang_study' => [
        'name' => 'Наименование'
    ],
    'lib_discipline' => [
        'name' => 'Наименование',
        'note' => 'Описание'
    ],
    'content_text_block' => [
        'name' => 'Наименование',
        'note' => 'Текст',
        'sys_key' => 'Ключ'
    ],
    'content_review' => [
        'name' => 'Наименование',
        'fio' => 'ФИО',
        'address' => 'Адрес',
        'photo' => 'Фото',
        'note' => 'Текст'
    ],
    'content_page' => [
        'name' => 'Наименование',
        'note' => 'Описание',
        'sys_key' => 'Ключ'
    ],
    'content_faq' => [
        'name' => 'Вопрос',
        'note' => 'Ответ'
    ],
    'university' => [
        'city_id' => 'Город',
		'cat_id' => 'Category',
        'name' => 'Name',
        'origin_name' => 'Оригинальное имя',
        'logotip' => 'Логотип',
        'rank_word' => 'Мировой рейтинг',
        'rank_local' => 'Локальный рейтинг',
		'rank_unikum' => 'Уникальный рейтинг',
        'application_start' => 'Дата начала приема заявлений',
        'application_end' => 'Дата окончаний приема заявлений',
        'cat_id[]' => 'Категории',
        'discipline_id[]' => 'Дисциплины',
        'lang_id[]' => 'Языки обучения',
        'detail_data' => 'Детализация',
        'dormitory' => 'Общежитие',
        'has_dormitory' => 'Есть общежитие',
        'stat_block' => 'Статистика',
        'fees_block' => 'Цены',
        'coor_block' => 'Координаты',
        'country_id' => 'Страна',
        'requirement_id'=>'Requirement',
        'social' => 'Social networks'
    ],
   'university_cat'=>[
	  'cat_id'=>'Category'
	],
    'university_data' => [
        'web_sait' => 'Site',
        'address_off' => 'Address',
        'address_legal' => 'Address(official)',
        'phones' => 'Phone',
        'email' => 'email',
        'add_info' => 'Decription',
        'history' => 'История',
        'achievement' => 'Достижения',
        'is_campus' => 'Есть кампус',
        'is_library' => 'Есть билиотека',
        'is_career' => 'Есть трудоустройства',
        'is_clubs' => 'Есть студ. клуюы',
        'is_med_insurance' => 'Есть мед. страхование',
        'is_inter_programm' => 'Есть международ. программы',
		'about_text'=>'Description',
		'student_life_text'=>'Student life',
        '' => '',
    ],
    'university_dormitory' => [
        'cost_min' => 'Мин цена',
        'cost_max' => 'Макс цена',
        'note' => 'Описание',
        '' => '',
    ], 
    'university_social'=>[
        'twitter'=>'Twitter',
        'facebook'=>'Facebook',
        'youtube'=>'Youtube',
        'instagram'=>'Instagram'
      ],
    'university_stat' => [
        'num_student_total' => 'Кол-во студентов',
        'num_student_citizen' => 'Кол-во местных студентов',
        'num_student_inter' => 'Кол-во международных студентов',
        'num_teacher_total' => 'Кол-во учителей',
        'num_teacher_citizen' => 'Кол-во местных учителей',
        'num_teacher_inter' => 'Кол-во международных учителей',
    ],
    'university_fees' => [
        'for_citizen_min' => 'Мин цена для местных',
        'for_citizen_max' => 'Макс цена для местных',
        'for_inter_min' => 'Мин цена для международных',
        'for_inter_max' => 'Макс цена для международных',
    ],
    'programs' => [
        'name' => 'Department',
        'univer_id' => 'Университет',
		'degree_id' =>'Degree',
        'price_for_inter' => 'Цена для местных',
        'price_for_citizen' => 'Цена для международных',
        'study_start' => 'Дата начала обучения',
        'study_end' => 'Дата окончания обучения',
        'duration_year' => 'Продолжительность',
        'note' => 'Majors',
        'discipline_note' => 'Description',
        'proceed_note' => 'Текст поступления',
        'discipline_id[]' => 'By subject'
    ],
    'users' => [
        'email' => 'Email',
        'password' => 'Пароль',
        'name' => 'ФИО',
        'position' => 'Позиция',
        'photo' => 'Фото',
        'email_exist' => 'Email уже есть в базе',
        'need_password' => 'Нужен пароль',
        'univer_id[]' => 'Универсистеты'
    ],
    'content_contacts' => [
        'edit_1_contect' => 'Форма редакции контакта №1',
        'edit_2_contect' => 'Форма редакции контакта №2',
        'name' => 'ФИО',
        'photo' => 'Фото',
        'position' => 'Позиция',
        'mobile' => 'Мобильный',
        'email' => 'Email',
    ],
    'content_blog' => [
        'news_date' => 'Дата',
        'name' => 'Заголовок',
        'short_note' => 'Краткое описание',
        'note' => 'Текст'
    ],
    'content_question' => [
        'name' => 'ФИО',
        'email' => 'Email',
        'title' => 'Заголовок',
        'propose' => 'Цель',
        'note' => 'Текст'
    ],
    'content_messages' => [
        'name' => 'ФИО',
        'email' => 'Email',
        'note' => 'Текст'
    ],
    'student_data' => [
        'f_name' => 'Имя',
        's_name' => 'Фамилия',
        'date_b' => 'Дата рождения',
        'country_id' => 'Страна',
        'email' => 'Email',
        'phone' => 'Телефон',
        'enter_date' => 'Планируемый год поступления',
        'note' => 'Дополнительное сообщение',
        'need_degree_id' => 'Интересующий уровень образования',
        'connect_email' => 'Предпочитаемый канал связи. Email',
        'connect_phone' => 'Предпочитаемый канал связи. Телефон',
        'connect_sms' => 'Предпочитаемый канал связи. Смс',
    ],
    'application' => [
        'univer_id' => 'Организация',
        'manager_id' => 'Менеджер',
        'f_name' => 'Имя',
        's_name' => 'Фамилия',
        'date_b' => 'Дата рождения',
        'country_id' => 'Страна',
        'email' => 'Email',
        'phone' => 'Телефон',
        'enter_date' => 'Планируемый год поступления',
        'note' => 'Дополнительное сообщение',
        'need_degree_id' => 'Интересующий уровень образования',
        'connect_email' => 'Предпочитаемый канал связи. Email',
        'connect_phone' => 'Предпочитаемый канал связи. Телефон',
        'connect_sms' => 'Предпочитаемый канал связи. Смс',
    ],
    'comuna' => [
        'user_id' => 'Пользователь',
        'univer_id' => 'Организация',
        'program_id' => 'Программа',
        'name' => 'Заголовок',
        'note' => 'Текст',
        'tags' => 'Тэги',
        'status_id' => 'Статус',

        'created_status' => 'Создан',
        'accepted_status' => 'Одобрен',
        'canceled_status' => 'Отказа',
        'about_tag' => 'Об универсистете',
        'student_life_tag' => 'Студенческая жизнь',
        'program_tag' => 'О программах',
        'discipline_tag' => 'Дисциплины',
        'how_entered_tag' => 'Как поступить',
    ],
    'comuna_messages' => [
        'user_id' => 'Пользователь',
        'univer_id' => 'Организация',
        'program_id' => 'Программа',
        'name' => 'Заголовок',
        'note' => 'Текст',
        'tags' => 'Тэги',
        'status_id' => 'Статус',

        'created_status' => 'Создан',
        'accepted_status' => 'Одобрен',
        'canceled_status' => 'Отказа',
        'about_tag' => 'Об универсистете',
        'student_life_tag' => 'Студенческая жизнь',
        'program_tag' => 'О программах',
        'discipline_tag' => 'Дисциплины',
        'how_entered_tag' => 'Как поступить',


    ],
'galleries' => [
'photo' => 'Photo',
'signature'=>'Signature',
'univer_id'=>'Университеты',
'description'=>'Description',
'requirement_id'=>'Requirements',
'date'=>'Date',
],
    'applications'=>[
'date'=>'Date',
'description'=>'Описание'
 ],
 'lib_requirements' => [
   'name'=>'Name',
   'note'=>'Description'
 ]
];
