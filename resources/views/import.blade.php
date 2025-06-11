<x-app-layout>
  <!-- <form action="{{ route('import.upload') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="files[]" multiple accept=".xml">
      <button type="submit">Загрузить</button>
  </form> -->

  
  <main class="flex justify-center items-center h-[calc(100vh-80px)] px-4">
    <div class="bg-white rounded-2xl shadow-md p-10 max-w-md w-full text-center">
      <div class="flex justify-center mb-6">
        <img src="https://img.icons8.com/fluency/96/folder-invoices.png" alt="Upload Icon" class="w-16 h-16" />
      </div>
      <h1 class="text-2xl font-bold text-gray-800 mb-2">Загрузить файлы сессий</h1>
      <p class="text-gray-600 mb-4">Файлы будут добавлены в ваши отчёты<br>Доступный формат файлов: XML, ACS</p>
      <form action="{{ route('import.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div class="flex items-center justify-center border border-dashed border-purple-300 rounded-lg p-4">
            @csrf
          <input type="file" name="files[]" multiple accept=".xml" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
        </div>
        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-xl">
          Загрузить
        </button>
      </form>
    </div>
  </main>
</x-app-layout>
