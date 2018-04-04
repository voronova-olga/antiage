<?php

namespace App\Service;

class PhoneService
{
    /**
     * Форматирование телефонного номера
     * по шаблону и маске для замены
     *
     * $phones = array('926 111-2233','9261112233','8 (926) 111 22 33','8 926 111-22-33',
        '7 926 111-22-33','8926111-22-33','559-8833','5598833');
     *   $service = new PhoneService();
     *   foreach ($phones as $p){
     *       $p = $service->phone_format($p);
     *       print_r($p); echo'<hr>';
     *   }
     *
     * @param string $phone
     * @param string|array $format
     * @param string $mask
     * @return bool|string
     */
    public function phone_format($phone, $format=array(), $mask = '#')
    {
        if($format==array()){
            $format = array(
                '7' => '###-##-##',
                '10' => '+7 (###) ### ####',
                '11' => '# (###) ### ####'
            );
        }
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (is_array($format)) {
            if (array_key_exists(strlen($phone), $format)) {
                $format = $format[strlen($phone)];
            } else {
                return false;
            }
        }

        $pattern = '/' . str_repeat('([0-9])?', substr_count($format, $mask)) . '(.*)/';

        $format = preg_replace_callback(
            str_replace('#', $mask, '/([#])/'),
            function () use (&$counter) {
                return '${' . (++$counter) . '}';
            },
            $format
        );
        if($phone){
            $phone = trim(preg_replace($pattern, $format, $phone, 1));
        }else{
            return FALSE;
        }
        $p1 = substr($phone, 0, 1);
        if($p1==8){
            $phone = '+7'.substr($phone, 1);
        }
        if($p1==7){
            $phone = '+7'.substr($phone, 1);
        }
        return $phone;
    }
}