<h4 {{$cabecera->attributes->merge(["class" => "text-4xl font-bold"])}}>{{ $cabecera }}</h4>
<div {{ $attributes->merge(["class" => "text-3xl font-bold"]) }}>
    {{ $slot }}
</div>

<span {{ $pie->attributes->class(["text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"]) }}>
    {{ $pie }}
</span>