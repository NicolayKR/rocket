# front-webpack

Готовая сборка для верстки и прочего.

## В сборку включено

- [Laravel Mix](https://laravel-mix.com/)
- [Bootstrap](https://getbootstrap.com/)
- [JQuery](http://jquery.com/)
- [@popperjs/core](https://popper.js.org/)
- [VueJS](https://vuejs.org)
- [Axios](https://github.com/axios/axios)
- [Lodash](https://lodash.com/)

## Системные требования

- nodejs

## Установка

- npm install

## Запуск

##### В режиме разработки

- npm run watch

##### Компиляция для боевого режима работы

- npm run prod

## Настройка

Настроить сборку можно для отдельных шаблонов. Настройки по умолчанию расположены в файле `webpack.default.mix.js`

Для другого шаблона можно делать дубликат файла заменив default на своё значение. Например: `webpack.my_template.mix.js`

После этого команды необходимо выполнять с указанием шаблона конфига: `npm --section=my_template run watch`

Для удобства в package.json можно добавить команду. Например: `"my-watch": "npm --section=my_template run watch"`

После этого запускать её так `npm run my-watch`
