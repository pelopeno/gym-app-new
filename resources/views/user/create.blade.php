<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Share Your thoughts') }}
        </h2>
    </x-slot>
    <div class="max-w-3xl mt-10 mx-auto bg-white p-8 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-benguiat mb-6 text-gray-800">Submit Your Review</h1>
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Something went wrong:</span>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('user.store') }}" class="confirm-add">
            @csrf

            <div class="mb-6">
                <label class="block mb-2 text-lg font-semibold text-gray-700">Title</label>
                <input type="text"
                    name="title"
                    placeholder="e.g. My Gym Experience"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:outline-none">
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-lg font-semibold text-gray-700">Content</label>
                <textarea rows="5"
                    name="content"
                    placeholder="Write your thoughts here..."
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:outline-none"></textarea>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-secondary text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-black transition ease-in-out duration-200">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const saveForm = document.querySelector(".confirm-add");

        if (saveForm) {
            saveForm.addEventListener("submit", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Add this review?",
                    text: "Make sure everything looks good before submitting.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#16a34a",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, submit it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        saveForm.submit();
                    }
                });
            });
        }
    });
</script>
</x-app-layout>