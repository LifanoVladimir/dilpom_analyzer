<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Дата</th>
            <th>Длительность</th>
            <th>Серийный номер</th>
            <th>Версия UI</th>
            <th>Путь профиля</th>
            <th>MAC AP</th>
            <th>Локация AP</th>
            <th>Мин. сигнал</th>
            <th>Tx Rate (Green)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row['date_time'] }}</td>
            <td>{{ $row['duration'] }}</td>
            <td>{{ $row['serial_number'] }}</td>
            <td>{{ $row['ui_version'] }}</td>
            <td>{{ $row['profile_path'] }}</td>
            <td>{{ $row['ap_mac'] }}</td>
            <td>{{ $row['ap_location'] }}</td>
            <td>{{ $row['min_signal'] }}</td>
            <td>{{ $row['tx_rate_green'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
