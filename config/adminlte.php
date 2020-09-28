<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-logo
    |
    */

    'logo' => '<b>Gam3ya</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image-xl',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => 'container-fluid',
    'classes_content' => 'container-fluid',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => '/',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-menu
    |
    */

    'menu' => [
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'    => 'قسم اﻷطفال اﻷيتام',
            'icon'    => 'fas fa-child',
            'submenu' => [
                [
                    'text' => 'بيانات اﻷسر',
                    'route'  => 'family-details.index',
                ],
                [
                    'text' => 'اﻷطفال',
                    'route'  => 'children.index',
                ],
                [
                    'text' => 'الفئات',
                    'route'  => 'category.index',
                ],
                [
                    'text' => 'كافل اليتيم',
                    'route'  => 'orphan-sponser.index',
                ],
                [
                    'text' => 'اﻷساسيات',
                    'route'  => 'basic.index',
                ],
                [
                    'text' => 'الصرف الشهري',
                    'route'  => 'monthly-exchange.index',
                ],
                [
                    'text' => 'الصرف العينى',
                    'route'  => 'relative-exchange.index',
                ],
                [
                    'text' => 'أرقام الرعاية',
                    'route'  => 'care-numbers.index',
                ],

            ],
        ],
        [
            'text'    => 'قسم الفقراء',
            'icon'    => 'fas fa-hand-holding-usd',
            'submenu' => [
                [
                    'text' => 'بيانات اﻷسر',
                    'route'  => 'poor.family-details.index',
                ],
                [
                    'text' => 'اﻷطفال',
                    'route'  => 'poor.children.index',
                ],
                [
                    'text' => 'الفئات',
                    'route'  => 'poor.category.index',
                ],
                [
                    'text' => 'اﻷساسيات',
                    'route'  => 'poor.basic.index',
                ],
                [
                    'text' => 'الصرف الشهري',
                    'route'  => 'poor.monthly-exchange.index',
                ],
                [
                    'text' => 'الصرف العينى',
                    'route'  => 'poor.relative-exchange.index',
                ],
                [
                    'text' => 'أرقام الرعاية',
                    'route'  => 'poor.care-numbers.index',
                ],

            ],
        ],
        [
          'text'    => 'قسم المساجد',
          'icon'    => 'fas fa-mosque',
          'submenu' => [
              [
                  'text' => 'المساجد',
                  'route'  => 'mosque.index',
              ],
              [
                  'text' => 'العمال',
                  'route'  => 'worker.index',
              ],
              [
                  'text' => 'حساب وارد',
                  'route'  => 'incoming.index',
              ],
              [
                  'text' => 'حساب منصرف',
                  'route'  => 'cost.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم زواج البنات',
          'icon'    => 'fas fa-female',
          'submenu' => [
              [
                  'text' => 'البنات',
                  'route'  => 'girls.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم العلاج',
          'icon'    => 'fas fa-medkit',
          'submenu' => [
              [
                  'text' => 'العلاج',
                  'route'  => 'treatment.index',
              ],
              [
                  'text' => 'التبرعات',
                  'route'  => 'donation.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم المعاق',
          'icon'    => 'fas fa-wheelchair',
          'submenu' => [
              [
                  'text' => 'بيانات اﻷسر',
                  'route'  => 'disabled.family-details.index',
              ],
              [
                  'text' => 'اﻷطفال',
                  'route'  => 'disabled.children.index',
              ],
              [
                  'text' => 'الفئات',
                  'route'  => 'disabled.category.index',
              ],
              [
                  'text' => 'الكافل',
                  'route'  => 'disabled.orphan-sponser.index',
              ],
              [
                  'text' => 'الاعاقة',
                  'route'  => 'disabled.index',
              ],
              [
                  'text' => 'اﻷساسيات',
                  'route'  => 'disabled.basic.index',
              ],
              [
                  'text' => 'الصرف الشهري',
                  'route'  => 'disabled.monthly-exchange.index',
              ],
              [
                  'text' => 'الصرف العينى',
                  'route'  => 'disabled.relative-exchange.index',
              ],
              [
                  'text' => 'أرقام الرعاية',
                  'route'  => 'disabled.care-numbers.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم طالب العلم',
          'icon'    => 'fas fa-user-graduate',
          'submenu' => [
              [
                  'text' => 'طالب العلم',
                  'route'  => 'student.index',
              ],
              [
                  'text' => 'الصرف العيني',
                  'route'  => 'student.relative-exchange.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم المائدة',
          'icon'    => 'fas fa-table',
          'submenu' => [
              [
                  'text' => 'الوارد',
                  'route'  => 'income.index',
              ],
              [
                  'text' => 'المنصرف',
                  'route'  => 'outcome.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم تحفيظ القرآن',
          'icon'    => 'fas fa-quran',
          'submenu' => [
              [
                  'text' => 'المحفظ',
                  'route'  => 'teacher.index',
              ],
              [
                  'text' => 'اﻷولاد',
                  'route'  => 'boy.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم المركز الطبي',
          'icon'    => 'fas fa-clinic-medical',
          'submenu' => [
              [
                  'text' => 'تبرعات',
                  'submenu' => [
                    [
                      'text' => 'أجهزه طبية',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'devices-donations.index',
                    ],
                    [
                      'text' => 'الصرف المادي',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'money-donations.index',
                    ],
                  ],
              ],
              [
                  'text' => 'مصروفات',
                  'submenu' => [
                    [
                      'text' => 'المستلزمات',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'tools.index',
                    ],
                    [
                      'text' => 'رواتب اﻷطباء',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'doctor-salary.index',
                    ],
                  ],
              ],
              [
                  'text' => 'الموظف',
                  'route'  => 'employee.index',
              ],
              [
                  'text' => 'اﻷطباء',
                  'route'  => 'doctor.index',
              ],
              [
                  'text' => 'صرف أجهزه عينية',
                  'route'  => 'device.index',
              ],
            ],
        ],
        [
          'text'    => 'قسم الحضانة',
          'icon'    => 'fas fa-baby',
          'submenu' => [
              [
                  'text' => 'وارد',
                  'submenu' => [
                    [
                      'text' => 'كشوفات',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'nursery-accounts.index',
                    ],
                    [
                      'text' => 'تبرعات',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'nursery-donnations.index',
                    ],
                  ],
              ],
              [
                  'text' => 'منصرف',
                  'submenu' => [
                    [
                      'text' => 'المرتبات',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'nursery-salaries.index',
                    ],
                    [
                      'text' => 'المصروفات',
                      'icon' => 'far fa-fw fa-file',
                      'route' => 'nursery-expenses.index',
                    ],
                  ],
              ],
              [
                  'text' => 'الموظفين',
                  'route'  => 'nursery.employee.index',
              ],
              [
                  'text' => 'بيانات اﻷطفال',
                  'route'  => 'nursery.children.index',
              ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        // JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
