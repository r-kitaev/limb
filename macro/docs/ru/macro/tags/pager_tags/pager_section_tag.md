# Тег {{pager:section}}
## Описание
**{{pager:section}}** позволяет вывести ссылку на секцию (блок) страниц в pager-е.

Вставляет в шаблон некоторые переменные:

* **$href** — ссылка на секцию
* *** **$section_begin_page** — номер начальной страницы секции
* **$section_end_page** — номер последней страницы секции

Например:

    {{pager:section}}<a href='{$href}'>[{$section_begin_page}-{$section_end_page}]</a>{{/pager:section}}

Количество страниц внутри секции задается при помощи атрибута **pages_per_section** [тега {{pager:navigator}}](./pager_tag.md).

Внимание! Содержимое этого тега полностью игнорируется, если в pager-е используется тег [{{pager:elipses}}](./pager_elipses_tag.md).
