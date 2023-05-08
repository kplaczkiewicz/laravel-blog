@props(['name'])

<input type="checkbox" id="{{ $name }}" class="modal-toggle" />
<label for="{{ $name }}" class="modal cursor-pointer">
    <label class="modal-box relative rounded-none" for="">
        <label for="{{ $name }}" class="btn btn-sm btn-square absolute right-4 top-4">
            <i class="fa-solid fa-xmark"></i>
        </label>
        
        {{ $slot }}
    </label>
</label>
