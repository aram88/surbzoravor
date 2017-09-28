<?php
class MessageModel extends CFormModel{
    
    public $mail;
    public $subject;
    public $text;
    public $verifyCode;
    
    public function rules()
    {
        return array(
            array('mail, subject, text', 'required', 'message'=>' {attribute} դաշտը պարտադիր է'),
            array('mail','email','message'=>'Մուտքագրվածը Էլեկտրոնային հասցե չէ'),
        );
    }
    public function attributeLabels()
    {
        return array(
            'mail'=>'Էլեկտրոնային հասցե',
            'subject'=>'Թեման',
            'text'=>'Բովանդակությունը'
        );
    }
}