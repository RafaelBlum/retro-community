@props(['active' => false])

<a {{$attributes}} class=""
        @class([
            'block py-2 px-2 rounded md:p-0',
            'text-white bg-blue-700 md:bg-transparent text-blue-700 md:text-blue-700 dark:text-white md:dark:text-blue-500' => $active,
            'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white
              md:dark:hover:text-blue-500 dark:hover:bg-gray-700 md:dark:hover:bg-transparent dark:hover:text-white' => !$active
        ])>
    {{$slot}}
</a>
