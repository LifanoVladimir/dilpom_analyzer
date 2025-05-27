<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Дата</th>
            <th>Длительность</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row['date_time'] }}</td>
            <td>{{ $row['duration'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
