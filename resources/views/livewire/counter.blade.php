<div class="container">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="text-center">
        <button wire:click="increment" class="btn btn-primary">+</button>
        <button wire:click="decrement" class="btn btn-danger">-</button>

        <p class="mt-3">Count: {{ $count }}</p>
    </div>
</div>
