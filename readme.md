Design Pattern ►[ Factory Method ] ► Lesson #6
==============================================

* ***Actions on the deployment of the project:***

- Making a new project dpcreate-factorym_dafanasyev.loc:
																	
	sudo chmod -R 777 /var/www/DESIGN_PATTERNS/Creational/dpcreate-factorym_dafanasyev.loc

	//!!!! .conf
	sudo cp /etc/apache2/sites-available/test.loc.conf /etc/apache2/sites-available/dpcreate-factorym_dafanasyev.loc.conf
		
	sudo nano /etc/apache2/sites-available/dpcreate-factorym_dafanasyev.loc.conf

	sudo a2ensite dpcreate-factorym_dafanasyev.loc.conf

	sudo systemctl restart apache2

	sudo nano /etc/hosts

	cd /var/www/DESIGN_PATTERNS/Creational/dpcreate-factorym_dafanasyev.loc

- Deploy project:

	`git clone << >>`
	
	`or Download`
	
	_+ Сut the contents of the folder up one level and delete the empty one._

	`composer install`
	
---

Dmitry Afanasyev

[Design Pattern ►[ Factory Method ] ► Lesson #6 (22:11)]( https://www.youtube.com/watch?v=8SPTu2uhF9s&list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&index=2&ab_channel=DmitryAfanasyev )

The Factory Method (Virtual Constructor) Design Pattern is a way of delegating the instantiation logic to child classes.

<https://ru.wikipedia.org/wiki/Фабричный_метод_(шаблон_проектирования)>

	composer create-project --prefer-dist laravel/laravel
	
_+ Сut the contents of the folder up one level and delete the empty one._

	php artisan make:controller CreationalPatternsController

Error: 
_"... Permission denied"_

	sudo chmod -R 777 /var/www/DESIGN_PATTERNS/Creational/dpcreate-factorym_dafanasyev.loc

Error: 
_"Target class [CreationalPatternsController] does not exist."_
		
<https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8>		
		
Add route in `routes/web.php`:

```php
use App\Http\Controllers\CreationalPatternsController;

Route::get('/', [CreationalPatternsController::class, 'FactoryMethod'])->name('dump');
```

	php artisan config:cache	
	php artisan config:clear

Error:
_"Class 'Debugbar' not found"_

<https://bestofphp.com/repo/barryvdh-laravel-debugbar-php-debugging-and-profiling>

	composer require barryvdh/laravel-debugbar --dev

![screenshot of sample]( https://github.com/mslobodyanyuk/dpcreate-factorym_dafanasyev/blob/main/public/images/firefox1.png )	
		
[(0:05)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=5 ) In this video, we will study the `Factory Method` Design Pattern. As always, let's start with definitions. Definitions from various resources.
The first one suits us more than.

_"It's a way of delegating instantiation logic to child classes."_

Already from the definition it is clear that we have a certain Base Class, let's say it is Abstract. It contains some kind of Logic, some kind of Mechanics of Working with a certain object. And it has an Abstract Class which Create this object.
It is NOT Implemented in it, it is Abstract And when you Create a child method, branching off from the Base method, you Create this object in the Child method.

[(1:05)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=65 ) It turns out that we can Create two different Child methods, these Child methods will Create two different objects And we will have some common Work going on. - Depending
this will result in different results. BUT the Mechanics will remain NO changes.

[(1:30)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=90 ) 
_"Let's look at the code..."_

So here we have an Abstract Class called `AbstractForm.php`. This form Draws to us, let's say it is a Dialog form. To Draw a Dialog Box, you need to Call the `render()` method.

- `public function render()` - Gets the rendering toolkit, `guiKit`. 

This Toolkit as we see below:

- `abstract function createGuiKit(): GuiFactoryInterface;` - as a result should Call the object of the Class that Implements Interface `GuiFactoryInterface`.

[(2:45)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=165 ) `GuiFactoryInterface.php`

This Interface "tells" us that the object must Implement.

- `public function buildButton(): ButtonInterface;`

- `public function buildCheckBox(): CheckBoxInterface;`

We Created it, ( `$guiKit` ). We learn that it has certain methods and we work with them. - This is the Mechanics of Working with the object. The object of what Class will come here, `AbstractForm` does NOT know this, it does NOT matter to her.
The main thing that came here Implemented `GuiFactoryInterface.php`

[(3:40)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=220 ) 
_"Let's look at Child objects"_

`BootstrapDialogForm.php` - Derivates from `AbstractForm` AND Implements the Abstract Method `createGuiKit()`. It is NOT implemented. We will declare it as `Abstract` And thus force the Child objects to Implement these methods.
This method Creates a `BootstrapFactory` - a Toolkit for Rendering `bootstrap` elements.

[(4:20)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=260 ) `BootstrapFactory.php` 

Implements `GuiFactoryInterface.php`

- `public function buildButton(): ButtonInterface` - Draws a `bootstrap`-button.

- `public function buildCheckBox(): CheckBoxInterface` - Draws `bootstrap`-checkBox.

[(4:40)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=280 ) `SemanticUiDialogForm.php`

Also Branches From `AbstractForm` And Implements Abstract Method `createGuiKit()` By Creating Abstract Factory `SemanticUiFactory()`.

[(5:00)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=300 ) `SemanticUiFactory.php`

Exactly the same as `bootstrap`, Implements the Interface `GuiFactoryInterface.php`, Draws a button, Draws a CheckBox, BUT visually they are `SemanticUi`.

- `public function buildButton(): ButtonInterface` - Draws a `bootstrap`-button.

- `public function buildCheckBox(): CheckBoxInterface` - Draws `bootstrap`-checkBox.

In fact, this is ALL the Logic of the Design Pattern Abstract method.

[(5:40)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=340 ) `CreationalPatternsController.php`

Here we Call `BootstrapDialogForm()` AND Call the `render()` method AND THAT'S THAT - Got the form.

```php 
$dialogForm = new BootstrapDialogForm();
$result[] = $dialogForm->render();
```

[(5:55)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=355 ) `"Messages"`

![screenshot of sample]( https://github.com/mslobodyanyuk/dpcreate-factorym_dafanasyev/blob/main/public/images/firefox2.png )

_"- We will see, when we Draw objects we have reported `CheckBoxBootstrap` and `ButtonBootstrap` also reported - "I am drawn"."_

[(6:15)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=375 ) IF we replace:

```php
$dialogForm = new SemanticUiDialogForm();
```

[(6:20)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=380 ) `Refresh Browser(F5)`

![screenshot of sample]( https://github.com/mslobodyanyuk/dpcreate-factorym_dafanasyev/blob/main/public/images/firefox3.png )

_"- Also in `"Messages"` we will see that `SemanticUi` has become. That is, we would already have a different form displayed on the screen."_

[(6:30)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=390 ) 

_""Running" through EVERYTHING again..."_

We have an Abstract Class, it may or may not be Abstract. This is NOT necessarily written anywhere in the definitions. - We have a certain main Class, it Implements the Mechanics of Working with some Class... with the help of some object.
BUT it does NOT Create the object itself, it forces its Child Classes to Create this object. And the Mechanics of ALL Child Classes will be the same, the objects will be different which Implement this Mechanics.
And in order for there to be NO Errors, we must rely on Interfaces, we must prescribe Interfaces for ALL. IF Interfaces are written, IF they are Implemented correctly, then there will be NO Errors. - We can Switch from one Toolkit to another and EVERYTHING will be fine.

[(8:00)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=480 ) 
_"In Examples..."_

_"We already covered this approach in the `LARAVEL` course when Creating Repositories..."_

Abstract Class `CoreRepository.php`. We have a certain Repository constructor that Creates a Class, and the Repository itself endows with Mechanics, its methods are the Mechanics of Working with a specific Class. And we have an Abstract method.
That is, when we branch off from `CoreRepository`...

---

[(11:30)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=690 ) Wikipedia.

_"Factory Method, or Virtual Constructor - a Creational Design Pattern that provides subclasses (child classes) with an interface for creating instances of a certain class. At the time of creation, heirs can determine which class to create. Others In other words, this template delegates the creation of objects to the heirs of the parent class, which makes it possible to use not concrete classes in the program code, but to manipulate abstract objects at a higher level."_

[(12:20)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=740 ) Code example.

[(12:45)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=765 ) As you can see, they wrote one thing - They implemented another. The example does NOT match the description. Because here the Mechanics is moved to the Child Class, and NOT the Creation of an object that has already worked
in SuperClass Mechanics...

[(13:25)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=805 ) PHP5 Example.

Implemented via an Interface, NOT an Abstract Class. Mechanically, an Abstract Class causes a Child to Implement a method... The General Design Pattern Mechanics seems to be followed. BUT inside it does NOT contain the Mechanics of Work, the Mechanics of Work will have to
`Creator` write here. - Also a bad example.

---

[(15:25)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=925 )

_"Factory Method is a Creational Design Pattern that defines a common interface for creating objects in a superclass, allowing subclasses to change the type of objects created."_

<https://refactoring.guru/ru/design-patterns/factory-method>

_"The Factory Method Pattern is a class arrangement in which subclasses can override the type of product created in the superclass."_

<https://refactoring.guru/ru/design-patterns/factory-comparison>
 
[(16:15)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=975 ) We have a Logistician `Logistics`, a Logistician has a method `planDelivery()`, `createTransport()` - is a Mechanic, and he DOES NOT Create Transport, this is his Abstract method.
And Child methods are Created that Implement this Transport( - `RoadLogistics`, `SeaLogistics` ). - Ideally.

---

[(18:15)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1095 ) 

<https://designpatternsphp.readthedocs.io/en/latest/Creational/FactoryMethod/README.html> - I don’t even want to go in, as for the Factories - the garbage dump is just ...

---

[(18:25)]( https://youtu.be/8SPTu2uhF9s?list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&t=1105 ) "Copy-pasted" from Wikipedia. There are questions to the code too.

There is an Abstract sandwich( `Burger` ). On the basis of it we Form other sandwiches.
`Cheeseburger` - "hard" initialize, why methods were made then... `Hamburger`... The Parent( - `Burger` ) should contain Logic, getters and setters instead.
There is a chef `Chef`, he has a method `makeBurger($typeBurger)` - the type is passed to it and we Create EITHER `Cheeseburger()` OR `Hamburger()`. - This is NOT a `Factory Method`.

#### Useful links:

Dmitry Afanasyev

[Design Pattern ►[ Factory Method ] ► Lesson #6]( https://www.youtube.com/watch?v=8SPTu2uhF9s&list=PLoonZ8wII66inyWXuikmI0ANxC9tKgZPY&index=2&ab_channel=DmitryAfanasyev )

<https://stackoverflow.com/questions/63807930/target-class-controller-does-not-exist-laravel-8>

<https://bestofphp.com/repo/barryvdh-laravel-debugbar-php-debugging-and-profiling>

<https://ru.wikipedia.org/wiki/Фабричный_метод_(шаблон_проектирования)>

Examples

<https://refactoring.guru/ru/design-patterns/factory-method>

<https://refactoring.guru/ru/design-patterns/factory-comparison>
