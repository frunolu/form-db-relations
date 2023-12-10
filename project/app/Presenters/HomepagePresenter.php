<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\FormElement;
use Nette;
use Nette\Application\UI\Form as NetteForm;
use Nette\Application\UI\Presenter;
use App\Model\FormBuilder;

class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /**
     * @var FormBuilder
     */
    private $formBuilder;

    /**
     * HomepagePresenter constructor.
     *
     * @param FormBuilder $formBuilder
     */
    public function __construct(FormBuilder $formBuilder)
    {
        parent::__construct();
        $this->formBuilder = $formBuilder;
    }

    private function buildForm(): FormElement
    {
        return $this->formBuilder->buildForm();
    }

    protected function createComponentMyForm(): NetteForm
    {
        $formElement = $this->buildForm();
        $form = new NetteForm;
        // Set up the form here based on $formElement properties
        // Example: $form->addText($formElement->getText());
        $form->setAction($this->link('submit'));

        return $form;
    }

    public function renderDefault()
    {
        $this->template->myForm = $this['myForm'];
    }
}
