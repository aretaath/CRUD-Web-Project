@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'text-gray-200 bg-gray-700 border-gray-800 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
