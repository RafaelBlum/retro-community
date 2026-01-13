@props(['action'=>false])

<li>
    <a {{$attributes->class([
        'block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0',
        'bg-green-900'=> $action,
        'text-purple-100'=> !$action
        ])}} class="" aria-current="page">
        {{$slot}}
    </a>
</li>
