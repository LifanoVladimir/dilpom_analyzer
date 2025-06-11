<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">
        <div class="flex justify-center mb-6">
         <img src="{{ Vite::asset('resources/img/logo.png') }}" style="width: 150px; height: 150px" alt="Логотип">
        </div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Загрузка изображения для создания тепловой карты  </h2>

        <form action="{{ route('heatmap.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Название изображения</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="Введите название" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Выберите изображение</label>
                <input 
                    type="file" 
                    name="image" 
                    id="image" 
                    multiple accept=".jpg .png .jpeg" 
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                >
            </div>

            <div class="text-center">
                <button 
                    type="submit" 
                   class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-xl"           >
                    Загрузить
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
