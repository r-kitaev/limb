# Создание декораторов налету. Класс lmbDecorator
В тестах, а иногда и в рабочем коде иногда есть необходимость создать декоратор на какой-нибудь класс. В Limb3 есть средства для быстрой генерации базовых классов декотораторов на лету.

Для этих целей используется класс **lmbDecorator**.

Для генерации декоторов на базе какого-либо класса lmbDecorator содержит статический метод **generate($class, $decorator_class = null)**.

Пример использования:

    lmbDecorator :: generate('MyClass', 'MyClassDecorator');
 
    class MySuperDecorator extends MyClassDecorator
    {
      [...]
    }
