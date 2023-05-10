<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Head  --}}
    <title>Coalition Technologies</title>

    {{-- Links --}}

    {{-- Alphine JS --}}

    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
        rel="stylesheet"
        />

        {{-- CSS --}}

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />



</head>
<body>

    @yield('content')

</body>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
></script>


{{-- DropAble  --}}


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(function() {
        $('.card_row').sortable({
            update: function(event, ui) {
                var taskIds = [];
                $('.card').each(function() {
                    taskIds.push($(this).data('task-id'));
                });
                $.ajax({
                    type: 'PUT',
                    url: '/tasks',
                    data: { taskIds: taskIds },
                    success: function() {
                        console.log('Tasks updated successfully.');
                    }
                });
            }
        });
    });
</script>
</html>
