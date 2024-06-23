<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $settings = [
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
            'value' => 'You can request a messenger and a representative to deliver orders from the distribution representative, such as orders for groceries, catering, pharmacies and restaurants, and they will be delivered to the home', 
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
            'key' => 'join_delegate_ar',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص', 
        ],  
        [
            'key' => 'join_delegate_en',
            'value' => 'write what you want here!', 
        ], 
        [
            'key' => 'app_pages_desc_ar',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص', 
        ],  
        [
            'key' => 'app_pages_desc_en',
            'value' => 'write what you want here!', 
        ], 
        [
            'key' => 'app_statistics_desc_en',
            'value' => 'write what you want here!', 
        ],  
        [
            'key' => 'app_statistics_desc_ar',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص', 
        ], 
        [
            'key' => 'waiting_approval_en',
            'value' => 'write what you want here!', 
        ],  
        [
            'key' => 'waiting_approval_ar',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص', 
        ],   
         
        [
            'key' => 'downloads',
            'value' => '0', 
        ],  
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
        
    ];
    public function run()
    {
        foreach ($this->settings as $setting) {
            Setting::create($setting);
        }
    }
}
