@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $floorPlan->name }}</h1>
    <style>
        .point {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: red;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <div id="floor-container" style="position: relative; display: inline-block;">
        <img src="{{ asset('storage/' . $floorPlan->image_path) }}" id="floor-image" style="max-width: 100%;">

        <!-- Уже сохранённые точки -->
        @foreach($points as $point)
            <div class="point"
                style="<?php echo 'left:' . $point->x . '%; top:' . $point->y . '%;' ?>">
            </div>
        @endforeach
    </div>
</div>


<script>
    const storePointUrl = "{{ route('measurement-points.store') }}";
    const floorPlanId = "{{ $floorPlan->id }}";

    document.addEventListener('DOMContentLoaded', () => {
        const img = document.getElementById('floor-image');
        const container = document.getElementById('floor-container');

        img.addEventListener('click', function(e) {
            const rect = img.getBoundingClientRect();
            const xPercent = ((e.clientX - rect.left) / img.width) * 100;
            const yPercent = ((e.clientY - rect.top) / img.height) * 100;

            fetch(storePointUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    floor_plan_id: floorPlanId,
                    x: xPercent,
                    y: yPercent,
                })
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      const dot = document.createElement('div');
                      dot.classList.add('point');
                      dot.style = `
                          position: absolute;
                          left: ${xPercent}%;
                          top: ${yPercent}%;
                          width: 10px;
                          height: 10px;
                          background-color: blue;
                          border-radius: 50%;
                          transform: translate(-50%, -50%);
                      `;
                      container.appendChild(dot);
                  }
              });
        });
    });
</script>

@endsection
