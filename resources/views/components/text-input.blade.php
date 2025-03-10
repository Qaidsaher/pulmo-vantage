@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-neutral focus:border-primary focus:ring-primary rounded-md shadow-sm']) }}>
