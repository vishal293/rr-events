<?php
class EmailConfig {
    public $mandrill = array(
        'transport' => 'Mandrill',
        'from' => 'info@citybuzz.com',
        'uri' => 'https://mandrillapp.com/api/1.0/',
        'fromName' => 'CityBuzz',
        'timeout' => 30,
        'key' => 'WRrtKFlxRPRJW7M8SylgHw',
        'emailFormat' => 'html',
    );
}