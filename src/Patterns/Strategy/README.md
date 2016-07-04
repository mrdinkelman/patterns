# Strategy
![alt tag](https://img.shields.io/badge/build-passing-green.svg) 
![alt tag](https://img.shields.io/badge/coverage-100-green.svg)

RUS: https://ru.wikipedia.org/wiki/%D0%A1%D1%82%D1%80%D0%B0%D1%82%D0%B5%D0%B3%D0%B8%D1%8F_(%D1%88%D0%B0%D0%B1%D0%BB%D0%BE%D0%BD_%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F)

ENG: https://en.wikipedia.org/wiki/Strategy_pattern

Intent

* Define a family of algorithms, encapsulate each one, and make them interchangeable. Strategy lets the algorithm vary independently from the clients that use it.
* Capture the abstraction in an interface, bury implementation details in derived classes.

### UML (without associations)

![alt tag](strategy-without-associations.png?raw=true "Without associations")

### UML (with associations)

![alt tag](strategy-with-associations.png?raw=true "With associations")

# Another good Strategy examples:

ENG:

A Strategy defines a set of algorithms that can be used interchangeably. Modes of transportation to an airport is an example of a Strategy. Several options exist such as driving one's own car, taking a taxi, an airport shuttle, a city bus, or a limousine service. For some airports, subways and helicopters are also available as a mode of transportation to the airport. Any of these modes of transportation will get a traveler to the airport, and they can be used interchangeably. The traveler must chose the Strategy based on trade offs between cost, convenience, and time

https://sourcemaking.com/design_patterns/strategy

RUS:

Используется для выбора различных путей получения результата. Вспомним пример с получением прав. Человек, который будет реализовывать паттерн «стратегия» будет действовать следующим образом: вы говорите ему «Хочу права, денег мало» в ответ вы получите права через длительное время и с большой тратой ресурсов. Если вы скажите ему «Хочу права, денег много», то вы получите права очень быстро. Что именно делал этот человек вы понятия не имеете, но вы задаете начальные условия, а как себя вести уже решает он сам (сам выбирает стратегию).
Соответственно внутри «стратегии» хранятся различные способы поведения, и чтобы выбрать, ему нужны определенные параметры, в данном случае это объем денежных средств. Как устроена сама «стратегия» и какие алгоритмы внутри нее вам собственно знать и требуется.

https://habrahabr.ru/post/136766/