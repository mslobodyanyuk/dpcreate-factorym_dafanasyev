<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DesignPatterns\Creational\FactoryMethod\FactoryMethod;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\BootstrapDialogForm;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\SemanticUiDialogForm;

class CreationalPatternsController extends Controller
{
    public function FactoryMethod()
	{
		$description = FactoryMethod::getDescription();

		$dialogForm = new BootstrapDialogForm();
		//$dialogForm = new SemanticUiDialogForm();

		$result = $dialogForm->render();

		\Debugbar::info($result);

		return view('dump', compact('description'));
	}

}
