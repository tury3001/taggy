@if(session()->has('success'))
    <div class="bg-green-500 border rounded text-white text-sm py-2 justify-center flex items-center mt-10">
        <i class="fas fa-check-circle"></i> <span class="inline-block ml-2">{{ session()->get('success') }}</span>
    </div>
@endif
