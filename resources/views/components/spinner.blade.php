<!-- resources/views/components/utils/spinner.blade.php -->
<span wire:loading {{ $target ? 'wire:target='.$target : '' }}>
    <img src="{{ asset('images/loaders/Loading_1.gif') }}" alt="Loading..." width="25px">
</span>