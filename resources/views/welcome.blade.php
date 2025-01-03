<x-guest-layout>
    <main class="h-screen text-black flex flex-col">
        <x-navbar title="LibrarIC"/>
        <div class="bg-cover bg-no-repeat h-screen flex items-center justify-center" style="background-image: url({{ asset('images/backgrounds/ic2.jpeg') }})">
            <div class="container mx-auto px-4 md:px-0">
                <div class="flex flex-col-reverse sm:flex-row items-center justify-center">
                    <div class="md:w-1/2 p-4 md:p-8 bg-white rounded-md shadow-md flex flex-col items-center">
                        <h1 class="text-4xl md:text-5xl font-bold text-center">LibrarIC</h1>
                        <p class="text-center text-xl md:text-2xl">"Something very magical happens when you READ A GOOD BOOK" <br>-J.K. Rowling</p>
                        <a href="/books" class="block w-1/2 bg-gray-800 text-center hover:bg-gray-900 text-white font-bold py-2 px-4 rounded-md mt-4">Explore Now</a>
                    </div>
                    <img src="{{ asset('images/book.jpg') }}" alt="Book" class=" w-96 border rounded-md md:ml-4 md:mt-0 mt-4">
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
