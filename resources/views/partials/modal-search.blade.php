<div class="modal-wrapper-search h-screen w-full fixed left-0 top-0 hidden flex justify-center items-center bg-black bg-opacity-50 z-10 transition-all">
    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
        <div class="p-gutter flex justify-between items-start">
            <h3 class="my-0">{{ App\pl__('Suche') }}</h3>
            <i class="close-modal-search fa-solid fa-circle-xmark hover:cursor-pointer text-primary hover:text-font transition-colors"></i>
        </div>
        <div class="px-gutter pt-0 pb-gutter">
            @include('partials.search')
        </div>
    </div>
</div>