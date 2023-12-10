<?php

namespace App\Model;

class FormBuilder
{
    public function buildForm(): FormElement
    {
        $form = new FormElement();
        $form->setAttribute('action', '/homepage')
            ->setAttribute('method', 'post');

        $inputUsername = $this->buildInputElement('text', 'username', 'Enter your username');

        $selectGender = (new SelectElement())
            ->setAttribute('name', 'gender');
        $selectGender->addOption('male', 'Male')
            ->addOption('female', 'Female')
            ->addOption('other', 'Other');

        $inputSubmit = $this->buildInputElement('submit', 'submit', 'Submit');

        $inputAlbum = $this->buildInputElement('text', 'album', 'Enter album name');

        $inputAlbumInterpret = $this->buildInputElement('text', 'album_interpret', 'Enter album interpreter');

        $divElement = new DivElement();

        $inputAlbumSkladba = $this->buildInputElement('text', 'album_skladba', 'Enter album skladba');

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

    private function buildInputElement(string $type, string $name, string $placeholder): InputElement
    {
        return (new InputElement())
            ->setAttribute('type', $type)
            ->setAttribute('name', $name)
            ->setAttribute('placeholder', $placeholder);
    }
}
