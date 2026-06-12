<?php

namespace Customize\Util;

class RecaptchaUtil {
    private static $secret = '6LdFhhssAAAAAMTIx-XmEOFsgjgyeYBjcOawuszQ';
    private static $contentStr = 'https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s';
    public const SITE_KEY = '6LdFhhssAAAAAE60W5hPQmcWoX5MaCL-kk66XC-I';
    public const INPUT_NAME = 'recaptchaResponse';
    private const MIN_SCORE = 0.5;

    private function __construct() { }

    public static function check($token){
        log_info('[reCAPTCHA] チェック開始', ['token' => $token ? substr($token, 0, 20) . '...' : 'null']);
        
        if (empty($token)) {
            log_error('[reCAPTCHA] トークンが空です');
            return false;
        }

        $url = sprintf(self::$contentStr, self::$secret, $token);
        
        try {
            $response = file_get_contents($url);
            log_info('[reCAPTCHA] API応答受信', ['response_length' => strlen($response)]);
            
            $recaptcha = json_decode($response);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                log_error('[reCAPTCHA] JSON デコードエラー', ['error' => json_last_error_msg()]);
                return false;
            }
            
            log_info('[reCAPTCHA] 検証結果', [
                'success' => $recaptcha->success ?? false,
                'score' => $recaptcha->score ?? null,
                'action' => $recaptcha->action ?? null,
                'hostname' => $recaptcha->hostname ?? null
            ]);
            
            $result = $recaptcha->success && ( property_exists($recaptcha, 'score') && $recaptcha->score >= self::MIN_SCORE );
            
            if (!$result && isset($recaptcha->{'error-codes'})) {
                log_error('[reCAPTCHA] エラーコード', ['error_codes' => $recaptcha->{'error-codes'}]);
            }
            
            return (bool)$result;
        } catch (\Exception $e) {
            log_error('[reCAPTCHA] 例外発生', ['message' => $e->getMessage()]);
            return false;
        }
    }
}
