<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $settings = [
        [
            'key' => 'logo',
            'value' => 'logo.png',
        ],
        [
            'key' => 'site_email',
            'value' => 'aait@info.com',
        ],
        [
            'key' => 'site_phone',
            'value' => '012227965236'
        ],
        [
            'key' => 'site_name',
            'value' => 'Marsol new',
        ],
        [
            'key' => 'site_description',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص',
        ],
        [
            'key' => 'site_tagged',
            'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ],
        [
            'key' => 'site_copyrigth',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص',
        ],
        [
            'key' => 'distance',
            'value' => '20',
        ],
        [
            'key' => 'km_price',
            'value' => '0.75',
        ],
        [
            'key' => 'starting_fee',
            'value' => '14',
        ],
        [
            'key' => 'app_percentage',
            'value' => '10',
        ],
        [
            'key' => 'added_value',
            'value' => '10',
        ],
        [
            'key' => 'min_expected_price',
            'value' => '40',
        ],
        [
            'key' => 'max_expected_price',
            'value' => '100',
        ],
        [
            'key' => 'policy_ar',
            'value' => 'سياسة الخصوصية',
        ],
        [
            'key' => 'policy_en',
            'value' => 'Policy',
        ],
        [
            'key' => 'terms_ar',
            'value' => 'الشروط والأحكام',
        ],
        [
            'key' => 'terms_en',
            'value' => 'Terms',
        ],
        [
            'key' => 'about_ar',
            'value' => 'عن التطبيق',
        ],
        [
            'key' => 'about_en',
            'value' => 'about app',
        ],
        [
            'key' => 'site_about_ar',
            'value' => 'مرسول هو خدمه توصيل الخدمات في أي مكان وفي أي وقت',
        ],
        [
            'key' => 'site_about_en',
            'value' => 'Mrsol is a delivery service for orders anywhere and anytime',
        ],
        [
            'key' => 'hyperpay_status',
            'value' => 'active', // active | disabled
        ],
        [
            'key' => 'hyperpay_mode',
            'value' => 'test', // test | live
        ],
        [
            'key' => 'hyperpay_Authorization',
            'value' => "OGFjN2E0Yzc3MTc3NDY3ODAxNzE3N2QzODhlODAxMjh8SDRGV2dtZjJoag==", 
        ],
        [
            'key' => 'online_payment_commission',
            'value' => '1.5', 
        ], 
        [
            'key' => 'hyperpay_site_title',
            'value' => 'Marsol_new', 
        ],
        [
            'key' => 'site_title_ar',
            'value' => "احجز وانجز خدمتك معنا بكل سهولة", 
        ],
        [
            'key' => 'site_title_en',
            'value' => 'Join us and save your time', 
        ], 
        [
            'key' => 'site_desc_ar',
            'value' => 'تطبيق مرسول طلباتك أوامر لتوصيل الطلبات والبضائع يمكنك طلب مرسول ومندوب لايصال الطلبات من مندوب التوزيع مثل طلبات البقالة والتموينات والصيدليات والمطاعم وسيتم توصيلها للمنزل', 
        ],  
        [
            'key' => 'site_desc_en',
            'value' => 'write what you want here!', 
        ],  
        [
            'key' => 'ios_link',
            'value' => 'https://www.your-ios-link.com', 
        ],  
        [
            'key' => 'android_link',
            'value' => 'https://www.your-android-link.com', 
        ], 
        [
            'key' => 'site_header_image',
            'value' => 'default.png', 
        ],
        [
            'key' => 'telegram',
            'value' => 'https://web.telegram.org', 
        ], 
        [
            'key' => 'welcome_title_ar',
            'value' => 'أهلا بعودتك في مرسول أوامر', 
        ], 
        [
            'key' => 'welcome_content_ar',
            'value' => 'من فضلك قم بإدخال بياناتك المسجله مسبقا في حاله انك قمت بإنشاء حساب سابقا , وفى حاله لم تمتلك حساب برجاء إنشاء حساب جديد', 
        ], 
        [
            'key' => 'welcome_title_en',
            'value' => 'Welcome back to marsool', 
        ], 
        [
            'key' => 'welcome_content_en',
            'value' => 'not have an account, please create a new accoun', 
        ], 
        [
            'key' => 'delegate_withdraw_time',
            'value' => '10', 
        ], 
        [
            'key' => 'delegate_max_debt',
            'value' => '100', 
        ], 
        [ 'key' => 'fav_icon'                       , 'value' => 'no_data.png'             ],
        [ 'key' => 'login_background'               , 'value' => 'login_background.png'             ],
        [ 'key' => 'no_data_icon'                   , 'value' => 'fav.png'             ],
        [ 'key' => 'default_user'                   , 'value' => 'default.png'          ],
        [ 'key' => 'smtp_user_name'                 , 'value' => 'smtp_user_name'    ],
        [ 'key' => 'smtp_password'                  , 'value' => 'smtp_password'    ],
        [ 'key' => 'smtp_mail_from'                 , 'value' => 'smtp_mail_from'    ],
        [ 'key' => 'smtp_sender_name'               , 'value' => 'smtp_sender_name'    ],
        [ 'key' => 'smtp_port'                      , 'value' => '80'    ],
        [ 'key' => 'smtp_host'                      , 'value' => 'send.smtp.com'    ],
        [ 'key' => 'smtp_encryption'                , 'value' => 'LTS'    ],

        [ 'key' => 'firebase_key'                   , 'value' => 'AAAAVYoWgDU:APA91bEU9m3M7z5TeNAlKqwl2sI5XU78yNRDCNPt95M2RDjfZG9O5ZGxrH_wcqIClEDY3TWgyMOp9vH56O5ilbm2vYp-8tIN_8dGvnbtea4s5hMlXYyCQZR2h0kM07l3pXB9iiZbgz_q'    ],
        [ 'key' => 'firebase_sender_id'             , 'value' => '662557294717'    ],

        [ 'key' => 'google_places'                  , 'value' => 'AIzaSyAXV7nrpIKpuqyaNWNQYr3IP86_rJgcHWc'    ],
        [ 'key' => 'google_analytics'               , 'value' => 'google_analytics'    ],
        [ 'key' => 'live_chat'                      , 'value' => '<iframe src="https://chat.socialintents.com/c/yoururl" width="480" height="540" frameborder="0"></iframe>'    ],
        
        ['key' => 'hyper_split_status'              , 'value' => 'active'    ],
        ['key' => 'hyper_split_mode'                , 'value' => 'test'    ],
        ['key' => 'hyper_split_email'               , 'value' => 'moh121ksa@gmail.com'    ],    
        ['key' => 'hyper_split_password'            , 'value' => '123456'    ],
        ['key' => 'hyper_split_config_id'           , 'value' => '93c45824e87883cc7f1a03d6dd605342'    ],    
        ['key' => 'hyper_split_configuration_key'   , 'value' => 'C85DD57150160C16E6B398B4481D5837A0972091C0B4E272FE6E775BF180C3DC'    ],    
        ['key' => 'bank_id'                         , 'value' => '1'    ],    
    ];

    public function run()
    {
        foreach ($this->settings as $setting) {
            Setting::create($setting);
        }
    }
}
