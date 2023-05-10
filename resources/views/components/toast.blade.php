@if (session()->has('message'))
    <div class="toast z-50 bottom-8 right-8 transition-all" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="alert alert-success">
            <div>
                <span>{{ session('message') }}</span>
            </div>
        </div>
    </div>
@endif
