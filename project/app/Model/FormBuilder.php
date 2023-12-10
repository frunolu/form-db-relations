<?php

namespace App\Model;

use Nette\Application\UI\Form as NetteForm;

class FormBuilder
{
    public function buildForm(): FormElement
    {
        $form = new FormElement();
        $form->setAttribute('action', '/homepage')
            ->setAttribute('method', 'post');

        $inputUsername = (new InputElement())
            ->setAttribute('type', 'text')
            ->setAttribute('name', 'username')
            ->setAttribute('placeholder', 'Enter your username');

        $selectGender = (new SelectElement())
            ->setAttribute('name', 'gender');

        $selectGender->addChildOption('male', 'Male')
            ->addChildOption('female', 'Female')
            ->addChildOption('other', 'Other');

        $inputSubmit = (new InputElement())
            ->setAttribute('type', 'submit')
            ->setAttribute('value', 'Submit');


        // New Added Code
        $inputAlbum = (new InputElement())
            ->setAttribute('type', 'text')
            ->setAttribute('name', 'album')
            ->setAttribute('placeholder', 'Enter album name');

        $inputAlbumInterpret = (new InputElement())
            ->setAttribute('type', 'text')
            ->setAttribute('name', 'album_interpret')
            ->setAttribute('placeholder', 'Enter album interpreter');

        $inputAlbumSkladba = (new InputElement())
            ->setAttribute('type', 'text')
            ->setAttribute('name', 'album_skladba')
            ->setAttribute('placeholder', 'Enter album skladba');

        $form->addFormItem($inputUsername)
            ->addFormItem($selectGender)
            ->addFormItem($inputAlbum)
            ->addFormItem($inputAlbumInterpret)
            ->addFormItem($inputAlbumSkladba)
            ->addFormItem($inputSubmit);

        echo $form->render();

        return $form;
    }
}
