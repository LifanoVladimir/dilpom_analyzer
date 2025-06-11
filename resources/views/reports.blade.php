<x-app-layout>
    <div class="py-8 px-6 max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Отчёты</h2>

        @forelse($sessions as $session)
            <div class="bg-white shadow rounded-xl mb-6 p-6" x-data="{ open: false }">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-1">Сессия: {{ $session->date_time  }}</h3>
                        <p><span class="font-semibold">Длительность:</span> {{ $session->duration }} сек</p>
                        <p><span class="font-semibold">Количество точек доступа:</span> {{ $session->accessPoints->count() }}</p>
                    </div>
                    <button @click="open = !open" class="bg-purple-600 text-white px-4 py-2 rounded-xl hover:bg-purple-700">
                        <span x-show="!open">Показать</span>
                        <span x-show="open">Скрыть</span>
                    </button>
                </div>

                <div x-show="open" x-collapse class="mt-4 overflow-x-auto transition-all duration-300 ease-in-out">
                    @if($session->accessPoints->count())
                        <table class="min-w-full text-sm text-gray-700 border rounded-lg">
                            <thead class="bg-gray-100 text-gray-600 font-semibold">
                                <tr>
                                    <th class="px-4 py-2 text-left">Имя</th>
                                    <th class="px-4 py-2 text-left">Канал</th>
                                    <th class="px-4 py-2 text-left">Дата/Время</th>
                                    <th class="px-4 py-2 text-left">Сигнал</th>
                                    <th class="px-4 py-2 text-left">Скорость</th>
                                    <th class="px-4 py-2 text-left">Шифрование</th>
                                    <th class="px-4 py-2 text-left">Макс. скорость</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($session->accessPoints as $ap)
                                    <tr>
                                        <td class="px-4 py-2">{{ $ap->AP_name }}</td>
                                        <td class="px-4 py-2">{{ $ap->channel }}</td>
                                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($ap->datetime_ap_scan)->format('d.m.Y H:i') }}</td>
                                        <td class="px-4 py-2">{{ $ap->signal_level }}</td>
                                        <td class="px-4 py-2">{{ $ap->speed_diapozon }}</td>
                                        <td class="px-4 py-2">{{ $ap->shifr_type ?? $ap->{'802_11_support'} }}</td>
                                        <td class="px-4 py-2">{{ $ap->max_speed }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-sm text-gray-500">Нет данных о точках доступа.</p>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-600 text-lg">Нет доступных отчётов.</p>
        @endforelse
    </div>
</x-app-layout>
