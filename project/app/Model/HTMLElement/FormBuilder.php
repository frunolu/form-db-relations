<?php

namespace App\Model;


use App\Model\DivElement;
use App\Model\FormElement;
use App\Model\InputElement;
use App\Model\SelectElement;



class FormBuilder
{
    public function buildForm(): FormElement
    {
        $form = new FormElement();
        $form->setAttribute('action', '/homepage')
            ->setAttribute('method', 'post');

        $inputUsername = (new InputElement)->buildInputElement('text', 'username', 'Enter your username');

        $selectGender =  (new SelectElement)->buildSelectElement('gender',[
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Other'
        ]);

        $inputSubmit = (new InputElement)->buildInputElement('submit', 'submit', 'Submit');

        $inputAlbum = (new InputElement)->buildInputElement('text', 'album', 'Enter album name');

        $inputAlbumInterpret = (new InputElement)->buildInputElement('text', 'album_interpret', 'Enter album interpreter');

        $divElement = new DivElement();

        $inputAlbumSkladba = (new InputElement)->buildInputElement('text', 'album_skladba', 'Enter album skladba');

        $form->addFormItem($inputUsername)
            ->addFormItem($divElement)
            ->addFormItem($selectGender)
            ->addFormItem($divElement)
            ->addFormItem($inputAlbum)
            ->addFormItem($divElement)
            ->addFormItem($inputAlbumInterpret)
            ->addFormItem($divElement)
            ->addFormItem($inputAlbumSkladba)
            ->addFormItem($divElement)
            ->addFormItem($inputSubmit);

        echo $form->render();

        return $form;
    }

}
