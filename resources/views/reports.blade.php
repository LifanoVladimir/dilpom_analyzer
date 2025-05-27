<h2>Мои отчёты</h2>

@forelse($sessions as $session)
    <div>
        <strong>Дата:</strong> {{ $session->date_time }}<br>
        <strong>Длительность:</strong> {{ $session->duration }} сек<br>
        <strong>Точек доступа:</strong> {{ $session->accessPoints->count() }}
    </div>
    <hr>
@empty
    <p>Нет доступных отчётов.</p>
@endforelse