<?php

namespace App\DesignPatterns\Creational\FactoryMethod;

class FactoryMethod{

	static public function getDescription()
	{
        $description = [
                            'name' => 'Фабричный метод ( Factory Method )',
                            'url' => 'App\Http\Controllers\CreationalPatternsController@FactoryMethod',

                            'text_habr' => 'Это способ делегирования логики создания объектов (instantiation logic) дочерним классам.',
                            'url_habr' => 'https://habr.com/ru/company/vk/blog/325492/',

                            'text_guru' => 'Фабричный метод — это порождающий паттерн проектирования, который определяет общий интерфейс для создания объектов в суперклассе, позволяя подклассам изменять тип создаваемых объектов.',
                            'url_guru' => 'https://refactoring.guru/ru/design-patterns/factory-method',
                            //----
                            'text_guru1' => 'Паттерн Фабричный метод  — это устройство классов, при котором подклассы могут переопределять тип создаваемого в суперклассе продукта.',
                            'url_guru1' => 'https://refactoring.guru/ru/design-patterns/factory-comparison',

                            'text_designpatternsphp' => 'Преимущество SimpleFactory в том, что вы можете создавать подклассы для реализации различных способов создания объектов.
                                В простых случаях этот абстрактный класс может быть просто интерфейсом.
                                Этот шаблон является «настоящим» шаблоном проектирования, поскольку он реализует принцип инверсии зависимостей, также известный как «D» в принципах SOLID.
                                Это означает, что класс FactoryMethod зависит от абстракций, а не от конкретных классов. Это настоящий трюк по сравнению с SimpleFactory или StaticFactory.',
                            'url_designpatternsphp' => 'https://designpatternsphp.readthedocs.io/en/latest/Creational/FactoryMethod/README.html',
                        ];

        return $description;
	}

}
